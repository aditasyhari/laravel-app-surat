@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endpush
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Managemen Anggota</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Angota
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="section section-data-tables">
                <div class="row">
                    <div class="col s12">
                        <div id="html-validations" class="card card-tabs">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l10">
                                            <h4 class="card-title">Form Input Tambah Anggota</h4>
                                        </div>
                                        <div class="col s12 m6 l2">
                                        </div>
                                    </div>
                                </div>
                                <div id="html-view-validations">
                                    <form class="formValidate0" id="formValidate0" method="get">
                                        <div class="row">

                                            <div class="input-field col s12">
                                                <label for="nama">Nama</label>
                                                <input class="validate" required aria-required="true"
                                                    id="nama" name="nama" type="text">
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="email">Email</label>
                                                <input class="validate" required aria-required="true"
                                                    id="email" name="email" type="text">
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="nik">NIK</label>
                                                <input class="validate" required aria-required="true"
                                                    id="nik" name="nik" type="number">
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="foto">Foto</label>
                                                <br><br>
                                                <input type="file" id="input-file-now" class="dropify" data-default-file="" />
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="ttd">Tanda Tangan</label>
                                                <br><br>
                                                <input type="file" id="input-file-now" class="dropify" data-default-file="" />
                                            </div>

                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light right" type="submit"
                                                    name="action">Submit
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
<script src="{{asset('app-assets/js/scripts/form-layouts.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-file-uploads.js')}}"></script>

@endpush
