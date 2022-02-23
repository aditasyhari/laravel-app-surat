@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
<style>
    .img-input {
        max-height: 200px;
    }
</style>
@endpush
@section('title')
    Edit Anggota
@endsection
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
                        <li class="breadcrumb-item active">Edit Anggota
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
                                            <h4 class="card-title">Form Edit Anggota</h4>
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
                                    <form class="formValidate0" id="formValidate0" action="{{ url('manajemen-anggota/edit-anggota/'.$user->id_user) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">

                                            <div class="input-field col s12">
                                                <label for="nama">Nama</label>
                                                <input class="validate" required aria-required="true"
                                                    id="nama" name="nama" type="text" value="{{ $user->nama }}">
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="email">Email</label>
                                                <input class="validate" required aria-required="true"
                                                    id="email" name="email" type="text" value="{{ $user->email }}">
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="nik">NIK</label>
                                                <input class="validate" required aria-required="true"
                                                    id="nik" name="nik" type="number" value="{{ $user->nik }}">
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="foto">Foto (abaikan jika tidak mengganti foto)</label>
                                                <br>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="file" id="input-file-now" class="dropify" data-default-file="" name="foto"/>
                                            </div>
                                            <div class="input-field col s6">
                                                <img class="img-input" src="{{ asset('image/profile/'.$user->foto) }}" alt="-">
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="ttd">Tanda Tangan (abaikan jika tidak mengganti ttd)</label>
                                                <br>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="file" id="input-file-now" class="dropify" data-default-file="" name="ttd"/>
                                            </div>
                                            <div class="input-field col s6">
                                                <img class="img-input" src="{{ asset('image/ttd/'.$user->ttd) }}" alt="-">
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
