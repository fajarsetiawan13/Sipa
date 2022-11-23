<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Image;
use App\Models\Information;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dashboard.edit', [
        //     'title' => 'Edit Informasi Pengguna',
        //     'account' => User::where('id', auth()->user()->id)->get(),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(User $information)
    {
        return view('dashboard.user-detail', [
            'title' => 'Informasi Pengguna',
            'account' => User::where('id', auth()->user()->id)->get(),
            'userData' => $information->load(['contact', 'information', 'images']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(User $information)
    {
        return view('dashboard.user-edit', [
            'title' => 'Edit Informasi Pengguna',
            'account' => User::where('id', auth()->user()->id)->get(),
            'userData' => $information,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $information)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'odd_name' => 'required|min:3|max:255',
            'odd_gender' => 'required',
            'odd_age' => 'required',
            'odd_stage' => 'required',
            'odd_description' => 'required|min:3|max:512',
        ]);

        $validatedData['phone'] = '62' . $request->phone;

        User::whereId($information->id)->update($validatedData);
        return redirect('/information' . '/' . $information->id)->with('success', 'Informasi pengguna telah berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id);
        $information = Information::where('user_id', $id)->get();

        if ($information[0]->image) {
            Storage::delete($information[0]->image);
        }
        if ($information[0]->qr_image) {
            Storage::delete($information[0]->qr_image);
        }

        User::destroy($id);
        Information::where('user_id', $id)->delete();
        return redirect('/users')->with('success', 'Data pengguna telah dihapus');
    }
}
