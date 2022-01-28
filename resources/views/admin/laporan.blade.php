@extends('layouts.master')

@section('title')
    <title>Pesanan</title>
@endsection

@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection

@section('content_heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengiriman Barang</h1>
    </div>
@endsection

@section('content')
    @include('layouts.flashmsg')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive table-hover">
                <table class="table" id="tbl_transaksi">
                    <thead class="text-center">
                        <th>Nama Pengirim</th>
                        <th>Nama Barang</th>
                        <th>Tujuan Lokasi</th>
                        <th>Supir</th>
                        <th>Status Transaksi</th>
                        <th>Tanggal</th>
                        <!-- <th>Action</th> -->
                    </thead>
                    <tbody>
                        @foreach ($data_transaksi as $item)
                            <tr>
                                <td data-toggle="popover" title="Detail Pengirim"
                                    data-content="{{ $item->alamat_pengirim }}. Telepon : {{ $item->nomor_telpon_pengirim }}">
                                    {{ $item->nama_pengirim }}
                                </td>
                                <td class="text-center" data-toggle="popover" title="Detail Barang"
                                    data-content="{{ $item->buah }} seberat {{ $item->berat_muatan }}">
                                    {{ $item->nama_muatan }}
                                </td>
                                <td data-toggle="popover" title="Detail Pengirim"
                                    data-content="{{ $item->tarif }}. Keterangan : {{ $item->keterangan}}">
                                    {{ $item->tujuan_pengiriman }}
                                </td>
                                <td data-toggle="popover" title="Detail Pengirim"
                                    data-content="{{ $item->alamat_supir }}. Telepon : {{ $item->nomor_telpon }}">
                                    {{ $item->nama_supir}}
                                </td>
                                <td class="text-center">{{ $item->status_transaksi}}</td>
                                <td class="text-center">{{ $item->tanggal_pemberangkatan}}</td>
                                <!-- <td class="text-center">
                                    <div class="dropdown no-arrow">
                                        <i class="fas fa-fw fa-ellipsis-h" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"></i>
                                        <div class="dropdown-menu">
                                            <a href="#edit" class="dropdown-item text-success"
                                                onclick="byId('{{ $item->idTransaksi }}')"
                                                data-toggle="modal"
                                                data-target="#accTransaksiModal">
                                                <i class="fas fa-fw fa-check "></i>
                                                Proses Transaksi
                                            </a>
                                            <a href="{{ route('admin.transaksi.delete', $item->idTransaksi) }}" class="dropdown-item text-danger">
                                                <i class="fas fa-fw fa-trash "></i>
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </td> -->
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
            $('#tbl_transaksi').DataTable();
        })

       
    </script>
@endsection
