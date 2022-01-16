@extends('layouts.master')

@section('title')
<title>Dashboard</title>
@endsection

@section('css')
@endsection

@section('content_heading')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
@endsection

@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col text-center">
                        <div class="text-md font-weight-bold text-primary mb-1">
                            Truck Tersedia
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">---</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col text-center">
                        <div class="text-md font-weight-bold text-primary mb-1">
                            Truck Muat
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">---</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col text-center">
                        <div class="text-md font-weight-bold text-primary mb-1">
                            Di Perjalanan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">---</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow py-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-md font-weight-bold text-gray-800 text-uppercase">Daftar Anggota</div>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.supir.index') }}" class="text-primary float-right">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
