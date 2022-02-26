@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
@endpush
@section('title')
Tambah Arsip Surat Keluar
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
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">Arsip
                        </li>
                        <li class="breadcrumb-item">Surat Keluar
                        </li>
                        <li class="breadcrumb-item active">Tambah
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
                                            <h4 class="card-title">Form Tambah Arsip Surat Keluar</h4>
                                        </div>
                                        <div class="col s12 m6 l2">
                                        </div>
                                    </div>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="card-panel green lighten-1">
                                        <strong class="white-text">{{ $message }}</strong>
                                    </div>
                                @endif
                                <div id="html-view-validations">
                                    <form class="formValidate0" id="formValidate0" method="post" action="{{ url('arsip-surat/sk/tambah-arsip') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col s12">
                                                <label for="jenis">Klasifikasi Surat*</label>
                                                <select class="error validate" id="jenis" name="klasifikasi" aria-required="true" required>
                                                    <option disabled selected>Pilih
                                                    </option>
                                                    @foreach($klasifikasi as $k)
                                                        <option value="{{ $k->nama }}" class="text-uppercase">{{ $k->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="nosurat">No Surat*</label>
                                                <input class="validate" required aria-required="true" id="nosurat" name="no_sk" type="text">
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <input type="date" class="datepicker" name="tgl_surat_fisik" id="ts" required>
                                                <label for="ts">Tanggal Surat Fisik*</label>
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="sd">Surat Dari*</label>
                                                <input class="validate" required aria-required="true" id="sd" name="dari" type="text">
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="sd">Tujuan Surat*</label>
                                                <input class="validate" required aria-required="true" id="sd" name="tujuan_surat" type="text">
                                                <div class="input-field">
                                                </div>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                                <label for="perihal">Perihal*</label>
                                                <input class="validate" id="perihal" name="perihal" type="text" required aria-required="true">
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="ket">Keterangan</label>
                                                <input class="validate" id="ket" name="ket" type="text">
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="foto">File*</label>
                                                <br><br>
                                                <input type="file" id="input-file-now" class="dropify" data-default-file="" name="file" required/>
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
            </div>

        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('app-assets/js/scripts/form-layouts.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-file-uploads.js')}}"></script>

@endpush
