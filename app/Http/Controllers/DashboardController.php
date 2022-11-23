<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\CoverPage;
use App\Models\Image;
use App\Models\Information;
use App\Models\Location;
use App\Models\Messages;
use App\Models\User;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class DashboardController extends Controller
{
    // All User Function
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dasbor',
            'account' => User::where('id', auth()->user()->id)->get(),
            'contact' => Contact::where('user_id', auth()->user()->id)->get(),
            'photos' => Image::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function edit_password()
    {
        return view('dashboard.edit_password', [
            'title' => 'Ubah Password',
            'account' => User::where('id', auth()->user()->id)->get(),
        ]);
    }

    public function ubah_password(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|min:3|max:255'
        ]);

        if (strlen($request->password_baru) < 6) {
            return back()->with('error', 'Password baru terlalu pendek, Minimal 6 Karakter!');
        }

        if ($request->password == $request->password_baru) {
            return back()->with('error', 'Password baru sama dengan sandi lama!');
        }

        if (Hash::check($request->password, auth()->user()->password)) {
            $validatedData['password'] = Hash::make($request->password_baru);
        } else {
            return back()->with('error', 'Password lama tidak cocok!');
        }

        User::whereId(auth()->user()->id)->update($validatedData);
        return redirect('/dashboard')->with('success', 'Password telah berhasil diubah!');
    }

    public function change_image(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('profile');
        }

        User::where('id', auth()->user()->id)->update($validatedData);
        return redirect('/dashboard')->with('success', 'Anda telah mengubah foto penanggung jawab!');
    }

    public function add_photos(Request $request)
    {
        $validatedData = $request->validate([
            'photos' => 'image|file|max:2048',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if ($request->file('photos')) {
            $validatedData['image'] = $request->file('photos')->store('odd_photos');
        }

        Image::create($validatedData);
        return back()->with('success', 'Foto berhasil ditambahkan!');
    }

    public function delete_photos(Image $image)
    {
        if ($image->image) {
            Storage::delete($image->image);
        }

        Image::where('id', $image->id)->delete();
        return back()->with('success', 'Foto telah dihapus!');
    }

    // Admin Function //
    public function manage()
    {
        return view('dashboard.manage', [
            'title' => 'Manajemen Admin',
            'account' => User::where('id', auth()->user()->id)->get(),
        ]);
    }

    public function users()
    {
        return view('dashboard.users', [
            'title' => 'Manajemen Pengguna',
            'users' => User::with(['information'])->get(),
            'account' => User::where('id', auth()->user()->id)->get(),
        ]);
    }

    public function activate(User $user)
    {
        $check = Information::where('user_id', $user->id)->get();

        if (!$check->count()) {
            Information::create(['user_id' => $user->id]);
        }

        User::whereId($user->id)->update(['is_active' => 1]);
        return back()->with('success', 'Akun pengguna telah diaktifkan!');
    }

    public function deactivate(User $user)
    {
        User::whereId($user->id)->update(['is_active' => 0]);
        return back()->with('success', 'Akun pengguna telah dinonaktifkan!');
    }

    public function user_detail(User $user)
    {
        return view('dashboard.user_detail', [
            'title' => 'Informasi Pengguna - ' . $user->name,
            'account' => User::where('id', auth()->user()->id)->get(),
            'user' => $user->load('information', 'contact')
        ]);
    }

    public function user_role(Request $request, User $user)
    {
        User::whereId($user->id)->update(['role' => $request->role]);
        return back()->with('success', 'Role ' . $user->name . ' telah diubah');
    }

    public function messages()
    {
        return view('dashboard.messages', [
            'title' => 'Pesan',
            'account' => User::where('id', auth()->user()->id)->get(),
            'messages' => Messages::latest()->get()
        ]);
    }

    public function edit_cover()
    {
        return view('dashboard.edit_cover', [
            'title' => 'Halaman Sampul',
            'account' => User::where('id', auth()->user()->id)->get(),
            'cover' => CoverPage::all()
        ]);
    }

    public function change_cover(Request $request)
    {
        $validatedData['title'] = $request->title;
        $validatedData['description'] = $request->description;

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $request->file('image')->storeAs('/', 'cover.jpg');
        }

        CoverPage::whereId(1)->update($validatedData);
        return redirect('/dashboard')->with('success', 'Berhasil Mengubah Sampul Halaman Beranda!');
    }

    public function reset_password(User $user)
    {
        $password = Hash::make('password');
        User::whereId($user->id)->update(['password' => $password]);
        return back()->with('success', 'Password berhasil direset menjadi "password"');
    }
}
