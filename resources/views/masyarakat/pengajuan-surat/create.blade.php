@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Pengajuan
            @if (request('jenis_surat') == 'sktm')
                Surat Keterangan Tidak Mampu
            @endif
            @if (request('jenis_surat') == 'spp')
                Surat Keterangan Kematian
            @endif
        </h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="/masyarakat/pengajuan-surat" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">
                                        KTP <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" required class="form-control" name="foto_ktp">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">
                                        KK <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" required class="form-control" name="foto_kk">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">
                                        Akte <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" required class="form-control" name="foto_akte">
                                </div>
                                @if (request('jenis_surat') == 'sktm')
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label">
                                            Pekerjaan
                                        </label>
                                        <input type="text" class="form-control" name="pekerjaan"
                                            placeholder="Masukkan Pekerjaan Jika Ada">
                                    </div>
                                @endif

                            </div>
                            <input type="hidden" name="jenis_surat" value="{{ request('jenis_surat') }}">
                            @if (request('jenis_surat') == 'spp')
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Hari <span class="text-danger">*</span>
                                        </label>
                                        <select name="hari" id="hari" class="form-control" required>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Tanggal <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control" name="tanggal" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Di <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="di" required
                                            placeholder="Di...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Disebabkan karena <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="penyebab" required
                                            placeholder="penyebab">
                                    </div>
                                </div>
                            @endif

                            <button class="btn btn-primary mt-2" type="submit">Submit</button>
                        </div>
                    </form>
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
