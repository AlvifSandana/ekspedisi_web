@extends('layouts.master')

@section('title')
    <title>Transaksi</title>
@endsection

@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection

@section('content_heading')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
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
                        <th>Status Transaksi</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data_transaksi as $item)
                            <tr>
                                <td data-toggle="popover" title="Detail Pengirim"
                                    data-content="{{ $item->alamat_pengirim }}. Telepon : {{ $item->nomor_telpon }}">
                                    {{ $item->nama_pengirim }}
                                </td>
                                <td class="text-center" data-toggle="popover" title="Detail Barang"
                                    data-content="{{ $item->jenis_barang }} seberat {{ $item->berat_barang }}">
                                    {{ $item->nama_barang }}
                                </td>
                                <td class="text-center">{{ $item->status }}</td>
                                <td class="text-center">
                                    <div class="dropdown no-arrow">
                                        <i class="fas fa-fw fa-ellipsis-h" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"></i>
                                        <div class="dropdown-menu">
                                            <a href="#edit" class="dropdown-item text-success">
                                                <i class="fas fa-fw fa-check "></i>
                                                Proses Transaksi
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
    {{-- edit Tarif modal --}}
    <div class="modal fade" id="editTarifModal" tabindex="-1" role="dialog" aria-labelledby="editTarifModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tarif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.tansaksi.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="titik_pengiriman" class="col-form-label">Titik Pengiriman:</label>
                            <input type="text" class="form-control" name="update_titik_pengiriman" id="titik_pengiriman">
                            <input type="text" name="id" id="update_id" hidden>
                        </div>
                        <div class="form-group">
                            <label for="tujuan_pengiriman" class="col-form-label">Tujuan Pengiriman:</label>
                            <input type="text" class="form-control" name="update_tujuan_pengiriman"
                                id="tujuan_pengiriman">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <textarea name="update_keterangan" id="keterangan" cols="30" rows="3"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tarif" class="col-form-label">Tarif:</label>
                            <input type="number" class="form-control" name="update_tarif" id="tarif">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="update_status" class="form-control" id="status">
                                <option value="Ditinjau">Ditinjau</option>
                                <option value="Tersimpan">Simpan</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Update Tarif</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end of modal --}}
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
