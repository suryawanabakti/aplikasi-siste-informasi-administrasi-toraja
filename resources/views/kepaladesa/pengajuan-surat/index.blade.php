@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Pengajuan Surat</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Jenis Surat</th>
                                        <th>Approve Kepala Desa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($pengajuan as $data)
                                        <tr>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->jenis_surat }}</td>
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
                                                <a class="btn btn-success btn-sm"
                                                    href="/kepaladesa/pengajuan-surat/{{ $data->id }}/terima">Terima</a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="/kepaladesa/pengajuan-surat/{{ $data->id }}/tolak">Tolak</a>

                                                @if ($data->approve !== 'tolak')
                                                    <a target="_blank" href="/surat/{{ $data->uuid }}"
                                                        class="btn btn-info btn-sm">
                                                        Lihat Surat
                                                    </a>
                                                @endif


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
