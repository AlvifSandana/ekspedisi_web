@extends('layouts.master')

@section('title')
  <title>Daftar Tarif</title>
@endsection

@section('css')
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection

@section('content_heading')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Tarif</h1>
  </div>
@endsection

@section('content')
  @include('layouts.flashmsg')
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table" id="tbl_tarif">
          <thead class="">
            <th>Nama Tujuan</th>
            <th>Status</th>
            <th>Tarif</th>
            <th><button class="btn btn-primary" data-toggle="modal" data-target="#addTarifModal"><i
                  class="fas fa-fw fa-pen-nib"></i> Add new</button></th>
          </thead>
          <tbody>
            @foreach ($tarif as $item)
              <tr class="mt-3 mb-3" style="background-color: #f7fafc">
                <td><strong>{{ $item->titik_pengiriman }} - {{ $item->tujuan_pengiriman }}</strong> <br>
                  <i>{{ $item->keterangan }}</i></td>
                <td>
                  <span
                    class="badges badge-pill badges-outline-{{ $item->status == 'Tersimpan' ? 'success' : 'warning' }}">{{ $item->status }}</span>
                </td>
                <td><strong>Rp. {{ $item->tarif }}</strong></td>
                <td>
                  <div class="dropdown no-arrow">
                    <i class="fas fa-fw fa-ellipsis-h" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a href="#edit" class="dropdown-item text-warning edit" data-toggle="modal" data-target="#editTarifModal" data-id="{{ $item->idTarif }}">
                        <i class="fas fa-fw fa-edit "></i>
                        Edit</a>
                      <a href="#hapus" class="dropdown-item text-danger" onclick="deleteConfirm('delete-data')">
                        <i class="fas fa-fw fa-trash"></i>
                        Hapus</a>
                    </div>
                  </div>
                  <form id="delete-data" action="{{ route('admin.tarif.delete', $item->idTarif) }}" method="post">
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
  {{-- add new Tarif modal --}}
  <div class="modal fade" id="addTarifModal" tabindex="-1" role="dialog" aria-labelledby="addTarifModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Tarif</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.tarif.create') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="titik_pengiriman" class="col-form-label">Titik Pengiriman:</label>
              <input type="text" class="form-control" name="titik_pengiriman" >
            </div>
            <div class="form-group">
              <label for="tujuan_pengiriman" class="col-form-label">Tujuan Pengiriman:</label>
              <input type="text" class="form-control" name="tujuan_pengiriman" >
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan:</label>
              <textarea name="keterangan" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="tarif" class="col-form-label">Tarif:</label>
              <input type="number" class="form-control" name="tarif" >
            </div>
            <div class="form-group">
              <label for="status">Status:</label>
              <select name="status" class="form-control" >
                <option value="Ditinjau">Ditinjau</option>
                <option value="Tersimpan">Simpan</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Tarif</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end of modal --}}
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
          <form action="{{ route('admin.tarif.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="titik_pengiriman" class="col-form-label">Titik Pengiriman:</label>
              <input type="text" class="form-control" name="update_titik_pengiriman" id="titik_pengiriman">
              <input type="text" name="id" id="update_id" hidden>
            </div>
            <div class="form-group">
              <label for="tujuan_pengiriman" class="col-form-label">Tujuan Pengiriman:</label>
              <input type="text" class="form-control" name="update_tujuan_pengiriman" id="tujuan_pengiriman">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan:</label>
              <textarea name="update_keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
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
      $('#tbl_tarif').DataTable();

      // alert hapus tarif
      window.deleteConfirm = function(idForm) {
        Swal.fire({
          title: 'Hapus data tarif?',
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
      $('.edit').on('click', function(){
          var id = $(this).data('id');
          $.ajax({
              url: "{{ route('admin.tarif.show') }}?id=" + id,
              type: "GET",
              dataType: "JSON",
              success: function(data) {
                $('#update_id').val(data.idTarif);
                $('#titik_pengiriman').val(data.titik_pengiriman);
                $('#tujuan_pengiriman').val(data.tujuan_pengiriman);
                $('#tarif').val(data.tarif);
                $('#keterangan').val(data.keterangan);
                $('#status').val(data.status);
              }
          })
      })
    });
  </script>
@endsection
