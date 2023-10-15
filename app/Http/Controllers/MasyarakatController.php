<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $users = User::role('masyarakat')->with('masyarakat')->whereHas('masyarakat', function ($query) {
            $query->where('status', 'diterima');
        })->get();
        return view('admin.masyarakat.index', compact('users'));
    }
}
