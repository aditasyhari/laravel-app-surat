@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/flag-icon/css/flag-icon.min.css')}}">
@endpush
@section('title')
    Pengajuan Nomor 
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Template</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Pengajuan Nomor
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
                                            <h4 class="card-title">Form Pengajuan Nomor Surat</h4>
                                        </div>
                                        <div class="col s12 m6 l2">
                                        </div>
                                    </div>
                                </div>
                                <div id="html-view-validations">
                                    <form class="formValidate0" id="formValidate0" action="" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col s12">
                                                <label for="role">Klasifikasi Surat*</label>
                                                <input type="hidden" name="kode_klasifikasi" value="{{ $template->kode_klasifikasi }}">
                                                <input type="text" readonly name="nama_klasifikasi" value="{{ $template->klasifikasi }}" style="text-transform: uppercase">
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="col s12">
                                                <label for="role">Validator Surat*</label>
                                                <select class="error validate" id="id_validator" name="id_validator" aria-required="true" required>
                                                    <option disabled selected>Pilih
                                                    </option>
                                                    @foreach($user as $u)
                                                        <option value="{{ $u->id_user }}" class="text-uppercase">{{ $u->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <!-- <div class="col s12">
                                                <label for="role">Penandatangan Surat*</label>
                                                <select class="error validate" id="id_ttd" name="id_ttd" aria-required="true" required>
                                                    <option disabled selected>Pilih
                                                    </option>
                                                    @foreach($user as $u)
                                                        <option value="{{ $u->id_user }}" class="text-uppercase">{{ $u->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-field">
                                                </div>
                                            </div> -->

                                            <div class="input-field col s12">
                                                <input type="date" class="datepicker" name="tgl_surat_fisik" required>
                                                <label for="dob">Tanggal Surat Fisik*</label>
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
@endpush
