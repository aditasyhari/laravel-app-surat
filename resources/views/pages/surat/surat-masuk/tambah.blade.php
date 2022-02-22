@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endpush
@section('title')
    Tambah Surat Masuk
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
                        <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Surat Masuk
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
                                            <h4 class="card-title">Form Input Tambah Surat Masuk</h4>
                                        </div>
                                        <div class="col s12 m6 l2">
                                        </div>
                                    </div>
                                </div>
                                <div id="html-view-validations">
                                    <form class="formValidate0" id="formValidate0" method="get">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <label for="uname0">Nomor Surat</label>
                                                <input class="validate" required aria-required="true"
                                                    id="uname0" name="uname0" type="text">
                                            </div>
                                            <div class="input-field col s12">
                                                <label for="email">Email Tujuan</label>
                                                <input class="validate" required aria-required="true"
                                                    id="email" name="email" type="text">
                                            </div>
                                            <div class="col s12">
                                                <label for="role">Klasifikasi Surat*</label>
                                                <select class="error validate" id="role" name="role"
                                                    aria-required="true" required>
                                                    <option value="" disabled selected>Choose your profile
                                                    </option>
                                                    <option value="1">Manager</option>
                                                    <option value="2">Developer</option>
                                                    <option value="3">Business</option>
                                                </select>
                                                <div class="input-field">
                                                </div>
                                            </div>
                                            <div class="input-field col s12">
                                                <label for="tujuan">Tujuan Surat</label>
                                                <input class="validate" required aria-required="true"
                                                    id="tujuan" name="tujuan" type="text">
                                            </div>
                                            <div class="input-field col s12">
                                                <label for="perihal">Perihal</label>
                                                <input class="validate" required aria-required="true"
                                                    id="perihal" name="perihal" type="text">
                                            </div>
                                            <div class="input-field col s12">
                                                <input type="date" class="datepicker" id="dob">
                                                <label for="dob">Tanggal Surat</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <label for="foto">Foto</label>
                                                <br><br>
                                                <input type="file" id="input-file-now" class="dropify" data-default-file="" />
                                            </div>
                                            <div class="input-field col s12">
                                                <label for="ket">Keterangan</label>
                                                <input class="validate" required aria-required="true"
                                                    id="ket" name="ket" type="text">
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
