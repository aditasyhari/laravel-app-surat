@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
<style>
    .text-uppercase {
        text-transform: uppercase;
    }
    .text-capitalize {
        text-transform: capitalize;
    }
</style>
@endpush
@section('title')
    Surat Masuk
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Surat Masuk</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Surat Masuk
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
                                <h4 class="card-title">Data Surat Masuk</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Surat</th>
                                                    <th>Perihal</th>
                                                    <th>Klasifikasi</th>
                                                    <th>Pengirim</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sm as $m)
                                                <tr>
                                                    <td class="text-uppercase">{{ $m->no_sm }}</td>
                                                    <td class="text-capitalize">{{ $m->perihal }}</td>
                                                    <td class="text-capitalize">{{ $m->klasifikasi }}</td>
                                                    <td class="text-capitalize">{{ $m->dari }}</td>
                                                    <td>
                                                        <a href="{{ url('surat-masuk/detail-surat/'.$m->id_arsip_sm) }}" class="btn btn-small waves-effect waves-light gradient-45deg-amber-amber" title="Lihat Detail">
                                                            Detail
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/card-advanced.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('app-assets/js/scripts/data-tables.js')}}" type="text/javascript"></script>
@endpush
