<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $permohonanSurat->nomor_surat }}</title>

</head>

<body>
    <table width="100%">
        <tr>
            <td width="25" align="center">

            </td>
            <td width="50" align="center">
                <img src="https://saluallo.desa.id/wp-content/uploads/2019/01/LOGO-KABUPATEN-TANA-TORAJA.png"
                    alt="" width="50px">
                <h4>PEMERINTAH KABUPATEN TANA TORAJA <br> KECAMATAN MAKALE SELATAN <br> KELURAHAN PASANG</h4>
                <small>Alamat: Jln. Poros Parang - Pango-Pango</small>
            </td>
            <td width="25" align="center"></td>
        </tr>
    </table>

    <hr>
    <div style="align-items: center; text-align:center;"> <b>SURAT KETERANGAN TIDAK MAMPU</b> <br> <small>NOMOR:
            {{ $permohonanSurat->nomor_surat }}</small> </div>

    <table>
        <tr>
            <td>Yang bertanda tangan dibawah ini, Pemerintah Kelurahan Pasang, Kecamatan Makale Selatan Menerangkan
                bahwa :</td>
        </tr>
    </table>
    <table style="margin-top: 10px">
        <tr>
            <td>Nama</td>
            <td>: {{ $permohonanSurat->nama }}</td>
        </tr>
        <tr>
            <td>Tempat / Tgl.Lahir</td>
            <td>: Kota Baru, 12 Januari 2003</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $permohonanSurat->user->masyarakat->nik }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $permohonanSurat->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>: {{ $permohonanSurat->user->masyarakat->agama ?? null }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $permohonanSurat->user->masyarakat->alamat ?? null }}</td>
        </tr>
    </table>

    <table style="margin-top: 10px">
        <tr>
            <td>
                <div style="text-align: justify;">Warga tersebut diatas adalah benar-benar Penduduk Kelurahan
                    Pasang yang
                    bertempat tinggal di Alamat
                    diatas, berdasarkan pengantar dari Ketua RT/Kepala Lingkungan setempat yang menurut pengamatan kami,
                    bahwa benar yang bersangkutan tergolong orang yang berpendapatan rendah <b>(Tidak Mampu/
                        miskin).</b>
                    <br> Demikian Surat ketrangan ini kami buat dengan sesungguhnya untuk dapat dipergunakan seperlunya.
                </div>
            </td>
        </tr>
    </table>
    <div style="float: right; margin-top:40px">
        <div>Pasang, {{ now()->format('d M Y') }}</div>
        <b>an.Lurah Pasang</b><br>
        <div>Kasi Trantib,</div>
        <br>
        <br>
        @if ($permohonanSurat->approve === 'terima')
            {!! QrCode::size(40)->generate(url('/permohonan-surat/skk/' . $permohonanSurat->id)) !!}
        @endif

        <br>

        <u><b>Oktavianus Ganna' , SE.</b></u>
        <br>
        <span>NIP: 19801017201001 1 011.</span>
    </div>
    <script>
        window.print()
    </script>
</body>

</html>
