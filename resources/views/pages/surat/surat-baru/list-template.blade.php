@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
@endpush
@section('title')
    Surat Baru | Dengan Template
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Surat Baru</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Surat Dengan Template
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

                                <h4 class="card-title">Pilih Template Surat</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Nama Template</th>
                                                    <th>Klasifikasi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($template as $tp)
                                                <tr>
                                                    <td>{{ $tp->nama_template }}</td>
                                                    <td style="text-transform: uppercase">{{ $tp->klasifikasi }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <form action="{{ url('/template-surat/template-approval/preview') }}" method="post" target="_blank">
                                                                    @csrf
                                                                    <input type="hidden" name="id_template" value="{{ $tp->id_template }}">
                                                                    <button type="submit" class="btn-floating waves-effect waves-light gradient-45deg-amber-amber" title="preview">
                                                                        <i class="material-icons">visibility</i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <div class="col">
                                                                <a href="{{url('surat-baru/surat-template/'.$tp->id_template.'/pengajuan-nomor')}}" class="waves-effect waves-light btn-small">Buat Surat</a>
                                                            </div>
                                                        </div>
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
            </div><!-- START RIGHT SIDEBAR NAV -->


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
