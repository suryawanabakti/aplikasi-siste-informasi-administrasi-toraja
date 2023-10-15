@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <b>Selamat Datang Di Aplikasi Sistem Informasi Layanan Administrasi Toraja 👋</b> <br>
        @if (auth()->user()->masyarakat->status !== 'diterima')
            <span class="text-danger">Harap Tunggu Konfirmasi Penerimaan Pendaftaran Dari Admin</span>
        @endif
    </div>
@endsection
