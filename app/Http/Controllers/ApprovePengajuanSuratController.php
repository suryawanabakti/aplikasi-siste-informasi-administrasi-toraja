<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class ApprovePengajuanSuratController extends Controller
{
    public function index()
    {
        $pengajuan = PermohonanSurat::orderBy('jenis_surat', 'asc')->get();
        return view('kepaladesa.pengajuan-surat.index', compact('pengajuan'));
    }

    public function terima(PermohonanSurat $pengajuan)
    {
        $pengajuan->update([
            'approve' => 'terima'
        ]);

        return bacK();
    }

    public function tolak(PermohonanSurat $pengajuan)
    {
        $pengajuan->update([
            'approve' => 'tolak'
        ]);
        return bacK();
    }
}
