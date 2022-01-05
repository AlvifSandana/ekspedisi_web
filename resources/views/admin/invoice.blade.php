@extends('layouts.master')

@section('title')
    <title>Invoice</title>
@endsection

@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection

@section('content_heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Invoice</h1>
    </div>
@endsection

@section('content')
    @include('layouts.flashmsg')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" id="tbl_invoice">
                    <thead class="text-center">
                        <th>No.</th>
                        <th>Pengirim</th>
                        <th>Barang</th>
                        <th>Supir</th>
                        <th>Pemberangkatan</th>
                        <th>Kendaraan</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        @foreach ($invoice as $i => $value)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $value->nama_pengirim }}</td>
                                <td>{{ $value->nama_barang . ' - ' . $value->jenis_barang . ' - ' . $value->berat_barang }}</td>
                                <td>{{ $value->nama_supir }}</td>
                                <td>{{ $value->tanggal_pemberangkatan }}</td>
                                <td>{{ $value->jenis_kendaraan . ' - ' . $value->plat_kendaraan }}</td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <i class="fas fa-fw fa-ellipsis-h" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"></i>
                                        <div class="dropdown-menu">
                                            <a href="#edit" class="dropdown-item text-success"
                                                onclick="byId()" data-toggle="modal"
                                                data-target="#accTransaksiModal">
                                                <i class="fas fa-fw fa-check "></i>
                                                Simpan
                                            </a>
                                            <a href=""
                                                class="dropdown-item text-danger">
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
            $('#tbl_invoice').DataTable();
        })
    </script>
@endsection
