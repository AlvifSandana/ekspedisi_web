@extends('layouts.master')

@section('title')
    <title>Jadwal Pemberangkatan Sopir</title>
@endsection

@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection

@section('content_heading')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pemberangkatan Sopir</h1>
    </div>
@endsection

@section('content')
@include('layouts.flashmsg')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" id="tbl_jadwal">
                    <thead class="text-center">
                        <th>Nama Sopir Kanan</th>
                        <th>Nama Sopir Kiri</th>
                        <th>Tanggal</th>
                        <th>Anggota</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data_jadwal as $j)
                            <tr class="text-center mt-3 mb-3" style="background-color: #f7fafc">
                                <td><strong>{{ $j->nama_supir }}</strong></td>
                                <td><strong>{{ $j->nama_supircadang }}</strong></td>
                                <td><strong>{{ \Carbon\Carbon::parse($j->tanggal_pemberangkatan)->format('D, d M Y') }}</strong>
                                </td>
                                <td>
                                    <span class="badge badge-pill badge-{{ $j->status == 'baru' ? 'success' : 'danger' }}">{{ $j->status }}</span>
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <i class="fas fa-fw fa-ellipsis-h" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"></i>
                                        <div class="dropdown-menu">
                                            <a href="#edit" class="dropdown-item text-warning edit" data-toggle="modal" data-target="#updateSupirModal" data-id="{{ $j->idJadwal }}">
                                                <i class="fas fa-fw fa-edit "></i>
                                                Edit
                                            </a>
                                            <a href="#hapus" class="dropdown-item text-danger" onclick="deleteConfirm('delete-data')">
                                                <i class="fas fa-fw fa-trash "></i>
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                    <form id="delete-data" action="{{ route('admin.jadwal.delete', $j->idJadwal) }}"
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
@endsection

@section('script')
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // datatables
            $('#tbl_jadwal').DataTable();

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
