@extends('layouts.master')

@section('title')
  <title>Daftar Tarif</title>
@endsection

@section('css')
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content_heading')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Tarif</h1>
  </div>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table">
          <thead class="text-center">
            <th>Nama Tujuan</th>
            <th>Status</th>
            <th>Tarif</th>
            <th><button class="btn btn-primary"><i class="fas fa-fw fa-pen-nib"></i> Add new</button></th>
          </thead>
          <tbody>
            <tr class="text-center mt-3 mb-3" style="background-color: #f7fafc">
              <td><strong>RGP-BWI</strong> <br> <i>rogojampi - banyuwangi</i></td>
              <td>
                <span class="badges badge-pill badges-outline-success">Tersimpan</span>
              </td>
              <td><strong>Rp. 3.000.000</strong></td>
              <td><i class="fas fa-fw fa-ellipsis-h"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('script')
@endsection
