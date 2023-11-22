@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Pengajuan Surat Keterangan Kematian</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tanggals</th>
                                        <th>Nama</th>
                                        <th>Jenis Surat</th>
                                        <th>KTP</th>
                                        <th>KK</th>
                                        <th>Nomor Surat</th>
                                        <th>Approve Kepala Desa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($pengajuan as $data)
                                        <tr>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->jenis_surat }}</td>
                                            <td>
                                                <a href="/storage/foto-ktp/{{ $data->foto_ktp }}" target="_blank">Lihat</a>
                                            </td>
                                            <td>
                                                <a href="/storage/foto-kk/{{ $data->foto_kk }}" target="_blank">Lihat</a>
                                            </td>
                                            <td>
                                                @if (!$data->nomor_surat)
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $data->id }}">
                                                        Buat Surat
                                                    </button>
                                                @endif
                                                {{ $data->nomor_surat }}

                                            </td>
                                            <td>
                                                @if ($data->approve == 'proses')
                                                    <span class="badge  bg-warning">{{ $data->approve }}</span>
                                                @endif
                                                @if ($data->approve == 'terima')
                                                    <span class="badge  bg-success">{{ $data->approve }}</span>
                                                @endif
                                                @if ($data->approve == 'tolak')
                                                    <span class="badge  bg-danger">{{ $data->approve }}</span>
                                                @endif
                                            </td>
                                            <td>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $data->id }}">
                                                    Buat Surat
                                                </button>
                                                @if ($data->nomor_surat)
                                                    <a href="/surat/{{ $data->uuid }}" target="_blank"
                                                        class="btn btn-primary btn-sm">Lihat Surat</a>
                                                @endif

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Buat Surat</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="/admin/pengajuan-surat/{{ $data->id }}"
                                                                method="POST">
                                                                @method('PATCH')
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for=""
                                                                            class="form-label">Nama</label>
                                                                        <input type="text" class="form-control"
                                                                            name="nama" required
                                                                            value="{{ $data->nama ?? $data->user->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="" class="form-label">Nomor
                                                                            Surat</label>
                                                                        <input type="text" class="form-control"
                                                                            name="nomor_surat" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Buat
                                                                        Permohonan Surat</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>
@endsection

@push('js')
    <script>
        $('#myTable').DataTable()
    </script>
@endpush
