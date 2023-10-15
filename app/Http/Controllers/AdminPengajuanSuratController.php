<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class AdminPengajuanSuratController extends Controller
{
    public function indexSkk()
    {
        $pengajuan = PermohonanSurat::where('jenis_surat', 'Surat Keterangan Tidak Mampu')->get();
        return view('admin.pengajuan-surat-skk.index', compact('pengajuan'));
    }

    public function indexSpp()
    {
        $pengajuan = PermohonanSurat::where('jenis_surat', 'Surat Keterangan Kematian')->get();
        return view('admin.pengajuan-surat-spp.index', compact('pengajuan'));
    }

    public function update(Request $request, PermohonanSurat $permohonanSurat)
    {

        $request->validate([
            'nama' => 'required',
            'nomor_surat' => 'required'
        ]);

        $permohonanSurat->update([
            'nama' => $request->nama,
            'nomor_surat' => $request->nomor_surat
        ]);

        return back();
    }
}
