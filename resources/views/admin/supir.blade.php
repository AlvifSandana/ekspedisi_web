@extends('layouts.master')

@section('title')
    <title>Supir</title>
@endsection

@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection

@section('content_heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Supir</h1>
    </div>
@endsection

@section('content')
    @include('layouts.flashmsg')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" id="tbl_supir">
                    <thead class="text-center">
                        <th>Nama Supir</th>
                        <th>Nama Supir Cadangan</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($supir as $s)
                            <tr>
                                <td>{{ $s->nama_supir }}</td>
                                <td>{{ $s->nama_supircadang }}</td>
                                <td>{{ $s->alamat_supir }}</td>
                                <td>{{ $s->nomor_telpon }}</td>
                                <td>{{ $s->email }}</td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <i class="fas fa-fw fa-ellipsis-h" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"></i>
                                        <div class="dropdown-menu">
                                            <a href="#edit" class="dropdown-item text-warning">
                                                <i class="fas fa-fw fa-edit "></i>
                                                Edit
                                            </a>
                                            <a href="#hapus" class="dropdown-item text-danger">
                                                <i class="fas fa-fw fa-trash "></i>
                                                Hapus
                                            </a>
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
@endsection

@section('script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // datatables
            $('#tbl_supir').DataTable();
        })
    </script>
@endsection
