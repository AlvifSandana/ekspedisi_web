@extends('layouts.master')

@section('title')
<title>Jadwal Pemberangkatan Sopir</title>
@endsection

@section('css')
@endsection

@section('content_heading')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pemberangkatan Sopir</h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table">
          <thead class="text-center">
            <th>Nama Sopir Kanan</th>
            <th>Nama Sopir Kiri</th>
            <th>Tanggal</th>
            <th>Anggota</th>
            <th></th>
            <th></th>
          </thead>
          <tbody>
            <tr class="text-center mt-3 mb-3" style="background-color: #f7fafc">
              <td><strong>Boby</strong></td>
              <td><strong>Tono</strong></td>
              <td><strong>Jul 6, 2021</strong> <br> 6.31 PM</td>
              <td>
                <span class="badge badge-pill badge-danger">Baru</span>
              </td>
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
