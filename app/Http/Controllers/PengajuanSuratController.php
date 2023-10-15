<?php

namespace App\Http\Controllers;

use App\Models\PermohonanSurat;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $pengajuan = PermohonanSurat::where('user_id', auth()->id())->get();
        return view('masyarakat.pengajuan-surat.index', compact('pengajuan'));
    }

    public function create()
    {
        return view('masyarakat.pengajuan-surat.create');
    }

    public function store(Request $request)
    {
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

        if ($request->foto_akte) {
            $file = $request->file('foto_akte');
            $fotoAkte = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'storage/foto-akte';
            $file->move($tujuan_upload, $fotoAkte);
        }
        if ($request->jenis_surat == 'sktm') {
            $jenisSurat = 'Surat Keterangan Tidak Mampu';
        } elseif ($request->jenis_surat == 'spp') {
            $jenisSurat = 'Surat Keterangan Kematian';
        }
        PermohonanSurat::create([
            'jenis_surat' => $jenisSurat ?? null,
            'user_id' => auth()->id(),
            'foto_ktp' => $fotoKtp,
            'foto_kk' => $fotoKK,
            'foto_akte' => $fotoAkte,
            'kk_tujuan' => $request->kk_tujuan ?? null,
            'pekerjaan' => $request->pekerajaan ?? 'Belum Bekerja',
            'hari' => $request->hari ?? null,
            'penyebab' => $request->penyebab ?? null,
            'tanggal' => $request->tanggal ?? null,
            'di' => $request->di ?? null,
        ]);

        return redirect('/masyarakat/pengajuan-surat');
    }
}
