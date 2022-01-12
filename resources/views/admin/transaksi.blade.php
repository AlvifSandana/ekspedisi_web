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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- acc transaksi modal --}}
    <div class="modal fade" id="accTransaksiModal" tabindex="-1" role="dialog" aria-labelledby="accTramsaksiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.transaksi.acc') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_pengirim" class="col-form-label">Nama Pengirim:</label>
                            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" disabled>
                            <input type="text" name="idTransaksi" id="idTransaksi" hidden>
                            <input type="text" name="Barang_Pengirim_idPengirim" id="Barang_Pengirim_idPengirim" hidden>
                            <input type="text" name="Barang_idBarang" id="Barang_idBarang" hidden>
                            <input type="text" name="Admin_idAdmin" id="Admin_idAdmin" hidden>
                        </div>
                        <div class="form-group">
                            <label for="alamat_pengirim" class="col-form-label">Alamat Pengirim:</label>
                            <input type="text" class="form-control" name="alamat_pengirim"
                                id="alamat_pengirim" disabled>
                        </div>
                        <div class="form-group">
                            <label for="alamat_pengirim" class="col-form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang"
                                id="nama_barang" disabled>
                        </div>
                        <div class="form-group">
                            <label for="alamat_pengirim" class="col-form-label">Jenis Barang:</label>
                            <input type="text" class="form-control" name="jenis_barang"
                                id="jenis_barang" disabled>
                        </div>
                        <div class="form-group">
                            <label for="alamat_pengirim" class="col-form-label">Berat Barang:</label>
                            <input type="text" class="form-control" name="berat_barang"
                                id="berat_barang" disabled>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status:</label>
                            <select class="form-control" name="status"
                                id="status">
                                <option value="tertunda">Tertunda</option>
                                <option value="diproses">Diproses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-form-label">Tanggal Pemberangkatan:</label>
                            <input type="date" class="form-control" name="tanggal_pemberangkatan"
                                id="tanggal_pemberangkatan">
                        </div>
                        <div class="form-group">
                            <label for="Pilih Supir" class="col-form-label">Pilih Supir:</label>
                            <select class="form-control" name="idSupir" id="idSupir">
                                @foreach ($data_supir_kosong as $s)
                                    <option value="{{ $s->idSupir }}">{{ $s->nama_supir }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Proses Transaksi</button>
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

        // get data transaksi by id
        function byId(id) {
            $.ajax({
                url: "{{ route('admin.transaksi.byId') }}?id=" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#idTransaksi').val(data[0].idTransaksi)
                    $('#Admin_idAdmin').val(data[0].Admin_idAdmin)
                    $('#Barang_Pengirim_idPengirim').val(data[0].idPengirim)
                    $('#Barang_idBarang').val(data[0].idBarang)
                    $('#nama_pengirim').val(data[0].nama_pengirim)
                    $('#alamat_pengirim').val(data[0].alamat_pengirim)
                    $('#status').val(data[0].status)
                    $('#nama_barang').val(data[0].nama_barang)
                    $('#jenis_barang').val(data[0].jenis_barang)
                    $('#berat_barang').val(data[0].berat_barang)
                    $('#tanggal_pemberangkatan').val(data[0].tanggal_muat)
                }
            })
        }
    </script>
@endsection
