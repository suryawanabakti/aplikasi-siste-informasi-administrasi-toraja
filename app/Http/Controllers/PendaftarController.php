<?php

namespace App\Http\Controllers;

use App\Models\DataMasyarakat;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        $users = User::role('masyarakat')->with('masyarakat')->whereHas('masyarakat', function ($query) {
        })->get();
        return view('admin.pendaftar.index', compact('users'));
    }

    public function terima(User $user)
    {
        DataMasyarakat::where('user_id', $user->id)->update([
            'status' => 'diterima'
        ]);
        return back();
    }

    public function tolak(User $user)
    {
        DataMasyarakat::where('user_id', $user->id)->update([
            'status' => 'ditolak'
        ]);

        return back();
    }
}
