@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Users</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive text-nowrap" id="">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Last Seen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td width="250px">
                                                {{ $user->name }}
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                {{ $user->roles[0]->name }}
                                            </td>
                                            <td>
                                                @if (Cache::has('user-is-online-' . $user->id))
                                                    <span class="badge bg-label-success me-1">Online</span>
                                                @else
                                                    <span class="badge bg-label-danger me-1">Offline</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::createFromDate($user->created_at)->diffForHumans() }}
                                            </td>
                                            <td>
                                                @if ($user->roles[0]->name == 'masyarakat')
                                                    <a class="btn btn-danger btn-icon"
                                                        href="/admin/master-data/users/{{ $user->id }}/delete"
                                                        onclick="confirm('Apakah anda yaking menghapus user ini ?')">
                                                        <i class="bx bx-trash"></i>
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
