<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DataMasyarakat;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('masyarakat');

        if ($request->foto_ktp) {
            $file = $request->file('foto_ktp');
            $fotoKtp = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'storage/foto-ktp';
            $file->move($tujuan_upload, $fotoKtp);
        }

        if ($request->foto_kk) {
            $file = $request->file('foto_kk');
            $fotoKK = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'storage/foto-kk';
            $file->move($tujuan_upload, $fotoKK);
        }

        if ($request->pas_foto) {
            $file = $request->file('pas_foto');
            $pasFoto = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'storage/pas-foto';
            $file->move($tujuan_upload, $pasFoto);
        }
        DataMasyarakat::create([
            'user_id' => $user->id,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'golongan_darah' => $request->golongan_darah,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pas_foto' => $pasFoto,
            'foto_ktp' => $fotoKK,
            'foto_kk' => $fotoKK,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME2);
    }
}
