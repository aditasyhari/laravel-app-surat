@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
@endpush
@section('title')
Arsip Surat Keluar
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Arsip Surat Keluar</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Arsip Surat Keluar
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="section section-data-tables">
                <!-- DataTables example -->
                <!-- Page Length Options -->
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <a href="{{url('arsip-surat/tambah-arsip-keluar')}}"
                                    class="waves-effect waves-light  btn gradient-45deg-light-blue-cyan box-shadow-none border-round mr-1 mb-1 right">Tambah</a>
                                <h4 class="card-title">Data Arsip Surat Keluar</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>No Surat</th>
                                                    <th>Tujuan</th>
                                                    <th>Perihal</th>
                                                    <th>Klasifikasi</th>
                                                    <th>Tanggal Terima</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1234577</td>
                                                    <td>Lembaga Tes</td>
                                                    <td>Lembaga Tes</td>
                                                    <td>Instruksi</td>
                                                    <td>25-06-2021</td>
                                                    <td>
                                                        <a class="mb-6 btn-floating waves-effect waves-light gradient-45deg-amber-amber" title="detail">
                                                            <i class="material-icons">details</i>
                                                        </a>
                                                        <a class="mb-6 btn-floating waves-effect waves-light gradient-45deg-green-teal" title="edit">
                                                            <i class="material-icons">edit</i>
                                                        </a>
                                                        <a class="mb-6 btn-floating waves-effect waves-light gradient-45deg-purple-deep-orange" title="delete">
                                                            <i class="material-icons">delete</i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- START RIGHT SIDEBAR NAV -->


        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/card-advanced.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"
    type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/data-tables.js')}}" type="text/javascript"></script>
@endpush
