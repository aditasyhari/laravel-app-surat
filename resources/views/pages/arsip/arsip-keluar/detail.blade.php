@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">
<style>
    .text-uppercase {
        text-transform: uppercase;
    }
    .mb-20 {
        margin-bottom: 20px;
    }
</style>
@endpush
@section('title')
    Detail Arsip Surat Keluar
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
                        <li class="breadcrumb-item active">Detail
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
                                            <h4 class="card-title">Detail Arsip Surat Keluar</h4>
                                        </div>
                                        <div class="col s12 m6 l2">
                                        </div>
                                    </div>
                                </div>
                                <div id="html-view-validations">
                                    <div class="row">
                                        <div class="col s6 mb-20">
                                            <label for="jenis">Klasifikasi Surat</label>
                                            <h6>{{ $sk->klasifikasi }}</h6>
                                        </div>

                                        <div class="col s6 mb-20">
                                            <label for="nosurat">No Surat</label>
                                            <h6 class="text-uppercase">{{ $sk->no_sk }}</h6>
                                        </div>

                                        <div class="col s6 mb-20">
                                            <label for="ts">Tanggal Surat Fisik</label>
                                            <h6>{{ $sk->tgl_surat_fisik }}</h6>
                                        </div>

                                        <div class="col s6 mb-20">
                                            <label for="sd">Surat Dari</label>
                                            <h6>{{ $sk->dari }}</h6>
                                        </div>

                                        <div class="col s6 mb-20">
                                            <label for="sd">Tujuan Surat</label>
                                            <h6>{{ $sk->tujuan_surat }}</h6>
                                        </div>

                                        <div class="col s6 mb-20">
                                            <label for="perihal">Perihal</label>
                                            <h6>{{ $sk->perihal }}</h6>
                                        </div>

                                        <div class="col s6 mb-20">
                                            <label for="ket">Keterangan</label>
                                            <h6>
                                                @if($sk->ket != null)
                                                    {{ $sk->ket }}
                                                @else
                                                    -
                                                @endif
                                            </h6>
                                        </div>

                                        <div class="col s12">
                                            <a href="{{ asset('arsip/surat-keluar/'.$sk->file) }}" target="_blank" class="btn waves-effect waves-light">
                                                Lihat File
                                            </a>
                                        </div>

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
<script src="{{asset('app-assets/js/scripts/form-layouts.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/form-file-uploads.js')}}"></script>

@endpush
