<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return view('dashboard.tracking', [
            'title' => 'Riwayat Pelacakan',
            'account' => User::where('id', auth()->user()->id)->get(),
            'tracks' => Location::where('user_id', auth()->user()->id)->latest()->paginate(10),
        ]);
    }
}
