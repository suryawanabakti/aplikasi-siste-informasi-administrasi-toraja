@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Pendaftar</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Golongan</th>
                                        <th>Pas Foto</th>
                                        <th>Foto KK</th>
                                        <th>Foto KTP</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>{{ $user->email }}</td>

                                            <td>{{ $user->masyarakat->tempat_lahir }}</td>
                                            <td>{{ $user->masyarakat->tanggal_lahir }}</td>
                                            <td>{{ $user->masyarakat->golongan_darah }}</td>
                                            <td>
                                                <a href="" target="_blank">
                                                    <img src="/storage/pas-foto/{{ $user->masyarakat->pas_foto }}"
                                                        width="100" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" target="_blank">
                                                    <img src="/storage/foto-kk/{{ $user->masyarakat->foto_kk }}"
                                                        width="100" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" target="_blank">
                                                    <img src="/storage/foto-ktp/{{ $user->masyarakat->foto_ktp }}"
                                                        width="100" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                @if ($user->masyarakat->status == 'diterima')
                                                    <span class="badge bg-success">diterima</span>
                                                @endif
                                                @if ($user->masyarakat->status == 'ditolak')
                                                    <span class="badge bg-danger">ditolak</span>
                                                @endif
                                                @if ($user->masyarakat->status == 'diproses')
                                                    <span class="badge bg-warning">diproses</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.pendaftar.terima', $user->id) }}"
                                                    class="btn btn-success btn-sm">Terima</a>
                                                <a href="/admin/pendaftar/{{ $user->id }}/tolak"
                                                    class="btn btn-danger btn-sm">Tolak</a>
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
