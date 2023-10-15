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
            <td width="25" align="center"></td>
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
    <div style="align-items: center; text-align:center; text-transform:uppercase">
        <b>{{ $permohonanSurat->jenis_surat }}</b> <br> <small>NOMOR:
            {{ $permohonanSurat->nomor_surat }}</small>
    </div>
    <table>
        <tr>
            <td>Yang bertanda tangan dibawah ini Kepala Kelurahan Pasang, Kecamatan Makale Selatan Kabupaten Tana Toraja
                menerangkan bahwa:</td>
        </tr>
    </table>

    <table style="margin-top: 10px; margin-left:40px;">
        <tr>
            <td>Nama</td>
            <td>: {{ $permohonanSurat->user->name }}</td>
        </tr>
        <tr>
            <td>Tempat / Tgl.Lahir</td>
            <td>:{{ $permohonanSurat->user->masyarakat->tempat_lahir }},
                {{ \Carbon\Carbon::createFromDate($permohonanSurat->user->masyarakat->tanggal_lahir)->format('d M Y') }}
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $permohonanSurat->user->masyarakat->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $permohonanSurat->user->masyarakat->nik }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>: {{ $permohonanSurat->user->masyarakat->agama }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $permohonanSurat->user->masyarakat->alamat }}</td>
        </tr>
    </table>

    <table style="margin-top: 10px">
        <tr>
            <td>Benar-benar yang bersangkutan telah meninggal dunia Pada:</td>
        </tr>
    </table>
    <table style="margin-top: 10px; margin-left:40px;">
        <tr>
            <td>Hari</td>
            <td>: {{ $permohonanSurat->hari }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ $permohonanSurat->tanggal }}</td>
        </tr>
        <tr>
            <td>Di</td>
            <td>: {{ $permohonanSurat->di }}</td>
        </tr>
        <tr>
            <td>Di Sebabkan Karena</td>
            <td>: {{ $permohonanSurat->penyebab }}</td>
        </tr>
    </table>
    <table style="margin-top: 10px;">
        <tr>
            <td>Demikian surat Keterangan ini kami berikan dengan sesungguhnya untuk dapat di pergunakan sebagaimana
                mestinya.</td>
        </tr>
    </table>
    <div style="float: right; margin-top:40px">
        <div>Pasang, {{ now()->format('d M Y') }}</div>
        <b>an.Lurah Pasang</b><br>
        <div>Kasi Trantib,</div>
        <br>
        <br>
        @if ($permohonanSurat->approve === 'terima')
            {!! QrCode::size(40)->generate(url('/permohonan-surat/spp/' . $permohonanSurat->id)) !!}
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
