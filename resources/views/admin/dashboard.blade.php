@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <b>Selamat Datang Di Aplikasi Sistem Informasi Layanan Administrasi Toraja 👋</b> <br>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <b>Jumlah Pendaftar</b><br>
                        {{ 0 }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <b>Jumlah Masyarakat</b><br>
                        {{ 0 }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <b>Jumlah Permohonan</b><br>
                        {{ 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
