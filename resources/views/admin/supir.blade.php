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
                                            <a href="#edit" class="dropdown-item text-warning edit" data-toggle="modal" data-target="#updateSupirModal" data-id="{{ $s->idSupir }}">
                                                <i class="fas fa-fw fa-edit "></i>
                                                Edit
                                            </a>
                                            <a href="#hapus" class="dropdown-item text-danger" onclick="deleteConfirm('delete-data')">
                                                <i class="fas fa-fw fa-trash "></i>
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                    <form id="delete-data" action="{{ route('admin.supir.delete', $s->idSupir) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal update supir --}}
    <div class="modal fade" id="updateSupirModal" tabindex="-1" role="dialog" aria-labelledby="updateSupirModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Supir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.supir.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="idSupir" id="update_id" hidden>
                        <div class="form-group">
                            <label for="nama_supir" class="col-form-label">Nama Supir:</label>
                            <input type="text" class="form-control" name="nama_supir" id="nama_supir">
                        </div>
                        <div class="form-group">
                            <label for="nama_supir_cadang" class="col-form-label">Nama Supir Cadangan:</label>
                            <input type="text" class="form-control" name="nama_supir_cadang" id="nama_supir_cadang">
                        </div>
                        <div class="form-group">
                            <label for="alamat_supir" class="col-form-label">Tujuan Pengiriman:</label>
                            <input type="text" class="form-control" name="alamat_supir" id="alamat_supir">
                        </div>
                        <div class="form-group">
                            <label for="nomor_telpon" class="col-form-label">nomor_telpon:</label>
                            <input type="number" class="form-control" name="nomor_telpon" id="nomor_telpon">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" id="status">
                                <option value="baru">Baru</option>
                                <option value="utama">Utama</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
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

            // alert hapus tarif
            window.deleteConfirm = function(idForm) {
                Swal.fire({
                    title: 'Hapus data supir?',
                    text: "Proses ini tidak bisa dibatalkan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(idForm).submit();
                    }
                });
            }

            // update modal
            $('.edit').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.supir.show') }}?id=" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('#update_id').val(data.idSupir);
                        $('#nama_supir').val(data.nama_supir);
                        $('#nama_supir_cadang').val(data.nama_supircadang);
                        $('#nomor_telpon').val(data.nomor_telpon);
                        $('#alamat_supir').val(data.alamat_supir);
                        $('#status').val(data.status);
                    }
                })
            })
        })
    </script>
@endsection
