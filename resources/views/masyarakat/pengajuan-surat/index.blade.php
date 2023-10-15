@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Pengajuan Surat</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Pengajuan Surat
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Jenis Surat</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <a href="/masyarakat/pengajuan-surat/create?jenis_surat=sktm"
                                            class="btn btn-primary">
                                            Keterangan Tidak Mampu</a>
                                        <a href="/masyarakat/pengajuan-surat/create?jenis_surat=spp"
                                            class="btn btn-primary"> Keterangan Kematian</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jenis Surat</th>
                                        <th>Nomor Surat</th>
                                        <th>Approve Kepala Desa</th>
                                        <th>Lihat</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($pengajuan as $data)
                                        <tr>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>{{ $data->jenis_surat }}</td>
                                            <td>{{ $data->nomor_surat ?? 'Proses Admin' }}</td>
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
                                                @if ($data->nomor_surat)
                                                    <a href="/surat/{{ $data->uuid }}" target="_blank"
                                                        class="btn btn-primary btn-sm">Lihat Surat</a>
                                                @else
                                                    -
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
