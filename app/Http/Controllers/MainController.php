<?php

namespace App\Http\Controllers;

use App\Models\CoverPage;
use App\Models\Information;
use App\Models\Messages;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index', [
            'title' => 'Beranda',
            'cover' => CoverPage::all(),
            'posts' => Post::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function article()
    {
        return view('main.articles', [
            'title' => 'Artikel',
            'posts' => Post::orderBy('created_at', 'desc')->paginate(9)
        ]);
    }

    public function showArticle(Post $slug)
    {
        return view('main.showArticle', ['title' => 'Artikel - ' . $slug->title, 'post' => $slug->load(['user'])]);
    }

    public function about()
    {
        return view('main.about', ['title' => 'Sistem Informasi Alzheimer']);
    }

    public function register()
    {
        return view('main.register', ['title' => 'Pendaftaran Akun Baru']);
    }

    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'gender' => 'required',
            'address' => 'required|min:3|max:512',
            'phone' => 'required|numeric',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:6|max:255',
            'odd_name' => 'required|min:3|max:255',
            'odd_gender' => 'required',
            'odd_age' => 'required|numeric',
            'odd_stage' => 'required',
            'odd_description' => 'required|min:3|max:512',
        ]);

        $validatedData['phone'] = '62' . $request->phone;

        if ($request->password == $request->password2) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            return back()->with('message', 'Password tidak sama!');
        }
        User::create($validatedData);
        return redirect('/')->with('success', 'Pendaftaran berhasil!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->is_active == 0) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/')->with('error', 'Akun Anda belum diaktifkan, mohon tunggu admin memverifikasi akun Anda terlebih dulu.');
            }
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Email atau password Anda tidak sesuai dengan yang terdaftar dalam sistem.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function sendmessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:rfc,dns',
            'message' => 'required|min:3|max:512'
        ]);

        Messages::create($validatedData);
        return back()->with('success', 'Terima kasih, Anda telah mengirimkan pesan kepada kami!');
    }

    public function forget_password()
    {
        return view('main.forget-password', ['title' => 'Lupa Password']);
    }

    public function forgeting(Request $request)
    {
        $validatedData['name'] = $request->name;
        $validatedData['email'] = $request->email;
        $validatedData['message'] = 'Lupa Password';

        Messages::create($validatedData);
        return back()->with('success', 'Terima kasih, Laporan Anda akan segera kami proses!');
    }
}
