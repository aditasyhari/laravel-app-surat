@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endpush
@section('title')
Buat Surat
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
                        <li class="breadcrumb-item active">Buat Surat
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
                                            <h4 class="card-title">Entri Surat Keluar</h4>
                                            <p>Lengkapi form berikut</p>
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
                                                <input class="validate" required aria-required="true" id="uname0"
                                                    name="uname0" type="text">
                                            </div>
                                            <div class="col s12">
                                                <label for="role">Jenis Surat*</label>
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
                                                <input type="date" class="datepicker" id="dob">
                                                <label for="dob">Tanggal Surat Fisik</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <label for="tujuan">Tujuan Surat</label>
                                                <input class="validate" required aria-required="true" id="tujuan"
                                                    name="tujuan" type="text">
                                            </div>
                                            <div class="input-field col s12">
                                                <label for="status">Status</label>
                                                <input class="validate" required aria-required="true" id="status"
                                                    name="status" type="text">
                                            </div>
                                            <div class="col s12">
                                                <p>Karakteristik Surat</p>
                                                <div class="col">
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            name="gender0" type="radio" checked />
                                                        <span>Surat Terbatas</span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            name="gender0" type="radio" />
                                                        <span>Surat Rahasia</span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            name="gender0" type="radio" />
                                                        <span>Surat Biasa</span>
                                                    </label>
                                                </div>
                                                <div class="input-field">
                                                </div>
                                            </div>
                                            <div class="col s12">
                                                <p>Derajat Surat</p>
                                                <div class="col">
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            name="gender0" type="radio" />
                                                        <span>Biasa</span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            name="gender0" type="radio" />
                                                        <span>Segera</span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            name="gender0" type="radio" />
                                                        <span>Sangat Segera</span>
                                                    </label>
                                                </div>
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="perihal">Perihal</label>
                                                <input class="validate" required aria-required="true" id="perihal"
                                                    name="perihal" type="text">
                                            </div>

                                            <div class="input-field col s12">
                                                <button class="btn waves-effect light-blue left" type="submit"
                                                    name="action"> Lihat template
                                                    <i class="material-icons right">remove_red_eye</i>
                                                </button>
                                            </div>
                                            <div class="col s12">
                                                <p>
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            id="tnc_select1" type="checkbox" />
                                                        <span>Centang untuk edit data</span>
                                                    </label>
                                                </p>
                                                <div class="input-field">
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="determinate grey" style="width: 100%"></div>
                                            </div>
                                            <div class="col s12">
                                                <p>
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            id="tnc_select1" type="checkbox" />
                                                        <span>Centang untuk edit data</span>
                                                    </label>
                                                </p>
                                                <div class="input-field">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect green left" type="submit"
                                                        name="action"> Send
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect light-blue left" type="submit"
                                                        name="action">Preview
                                                    </button>
                                                </div>
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
