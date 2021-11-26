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
            @foreach ($data_jadwal as $j)
            <tr class="text-center mt-3 mb-3" style="background-color: #f7fafc">
              <td><strong>{{ $j->nama_supir }}</strong></td>
              <td><strong>{{ $j->nama_supircadang }}</strong></td>
              <td><strong>{{ \Carbon\Carbon::parse($j->tanggal_pemberangkatan)->format('D, d M Y') }}</strong></td>
              <td>
                <span class="badge badge-pill badge-{{ $j->status == 'baru' ? 'success' : 'danger'}}">{{ $j->status }}</span>
              </td>
              <td><i class="fas fa-fw fa-ellipsis-h"></i></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('script')
@endsection
