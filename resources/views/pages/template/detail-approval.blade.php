@extends('layout.master')
@push('style')
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
    Detail Approval Template
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Approval Template</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a>
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
                                            <h4 class="card-title">Detail Approval Template</h4>
                                        </div>
                                        <div class="col s12 m6 l2">
                                        </div>
                                    </div>
                                </div>
                                <div id="html-view-validations">
                                    <div class="row">
                                        <div class="col s3 mb-20">
                                            <label>Nama Template</label>
                                            <h6>{{ $tp->nama_template }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label>Ukuran Halaman</label>
                                            <h6>{{ $tp->ukuran_hal }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label>Ukuran TTD</label>
                                            <h6>{{ $tp->ukuran_ttd }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label>Orientasi Halaman</label>
                                            <h6>{{ $tp->orientasi_hal }}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s3 mb-20">
                                            <label>Margin Atas</label>
                                            <h6>{{ $tp->m_atas }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label>Margin Bawah</label>
                                            <h6>{{ $tp->m_bawah }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label>Margin Kanan</label>
                                            <h6>{{ $tp->m_kanan }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label>Margin Kiri</label>
                                            <h6>{{ $tp->m_kiri }}</h6>
                                        </div>
                                    </div>
                                    @if($tp->status_template == 'revisi')
                                    <div class="row">
                                        <div class="col s12 mb-20">
                                            <label for="perihal">Revisi</label>
                                            <textarea readonly class="materialize-textarea">{{ $tp->revisi }}</textarea>
                                        </div>
                                    </div>
                                    @endif
                                    <form id="form-surat" action="{{ url('/template-surat/template-approval/detail/approval') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_template" value="{{ $tp->id_template }}">
                                        <div class="row">
                                            <div class="col s12">
                                                <label for="role">Validasi</label>
                                                <select class="error validate" id="status_template" name="status_template" aria-required="true" required>
                                                    <option disabled selected>Pilih</option>
                                                    <option value="disetujui">Disetujui</option>
                                                    <option value="revisi">Revisi</option>
                                                    <option value="ditolak">Tolak</option>
                                                </select>
                                                <div class="input-field">
                                                </div>
                                            </div>
                                            <div class="mb-20"></div>
                                            <div class="col s12" id="revisi" style="display: none">
                                                <label for="">Revisi</label>
                                                <textarea name="revisi" class="materialize-textarea" required>isi revisi</textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn waves-effect green">Submit</button>
                                    </form>
                                    <div class="mb-20"></div>
                                    <div class="row">
                                        <div class="col s12">
                                            <form action="{{ url('/template-surat/template-approval/preview') }}" method="post" target="_blank">
                                                @csrf
                                                <input type="hidden" name="id_template" value="{{ $tp->id_template }}">
                                                <button type="submit" class="btn waves-effect waves-light">
                                                    <i class="material-icons">visibility</i>
                                                </button>
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
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('app-assets/js/scripts/form-layouts.js')}}" type="text/javascript"></script>

<script>
    document.getElementById('status_template').addEventListener('change', function () {
        var style = this.value == 'revisi' ? 'block' : 'none';
        document.getElementById('revisi').style.display = style;
    });
</script>
@endpush
