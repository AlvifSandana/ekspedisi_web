@extends('layouts.master')

@section('title')
<title>Invoice</title>
@endsection

@section('css')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
@endsection

@section('content_heading')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Invoice</h1>
</div>
@endsection

@section('content')
@include('layouts.flashmsg')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table" id="tbl_invoice">
                <thead class="text-center">
                    <th>ID</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
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
            $('#tbl_invoice').DataTable();
        })
    </script>
@endsection
