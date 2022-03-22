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
    Detail Surat Keluar
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Surat Keluar</h5>
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
                                            <h4 class="card-title">Detail Surat Keluar</h4>
                                        </div>
                                        <div class="col s12 m6 l2">
                                        </div>
                                    </div>
                                </div>
                                <div id="html-view-validations">
                                    <div class="row">
                                        <div class="col s4 mb-20">
                                            <label for="nosurat">Status Surat</label>
                                            <h6 class="text-uppercase">{{ $sk->status_surat }}</h6>
                                        </div>

                                        <div class="col s4 mb-20">
                                            <label for="nosurat">Validator</label>
                                            <h6 class="text-uppercase">{{ $sk->validator->nama }}</h6>
                                        </div>

                                        <div class="col s4 mb-20">
                                            <label for="nosurat">Nomor Surat</label>
                                            <h6 class="text-uppercase">{{ $sk->nomor_surat }}</h6>
                                        </div>

                                        <div class="col s4 mb-20">
                                            <label for="jenis">Klasifikasi Surat</label>
                                            <h6 class="text-uppercase">{{ $sk->klasifikasi }}</h6>
                                        </div>

                                        <div class="col s4 mb-20">
                                            <label for="ts">Tanggal Surat Fisik</label>
                                            <h6>{{ $sk->tgl_surat_fisik }}</h6>
                                        </div>

                                        <div class="col s4 mb-20">
                                            <label for="sd">Perihal</label>
                                            <h6>{{ $sk->perihal }}</h6>
                                        </div>

                                        <div class="col s4 mb-20">
                                            <label for="sd">Tujuan Surat</label>
                                            <h6>{{ $sk->tujuan_surat }}</h6>
                                        </div>

                                        <div class="col s4 mb-20">
                                            <label for="sd">Email Tujuan</label>
                                            <h6>{{ $sk->email_tujuan }}</h6>
                                        </div>

                                        <div class="col s4 mb-20">
                                            <label for="perihal">Perihal</label>
                                            <h6>{{ $sk->perihal }}</h6>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col s3 mb-20">
                                            <label for="perihal">Ukuran Halaman</label>
                                            <h6>{{ $sk->ukuran_hal }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label for="perihal">Ukuran TTD</label>
                                            <h6>{{ $sk->ukuran_ttd }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label for="perihal">Orientasi Halaman</label>
                                            <h6>{{ $sk->orientasi_hal }}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s3 mb-20">
                                            <label for="perihal">Margin Atas</label>
                                            <h6>{{ $sk->m_atas }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label for="perihal">Margin Bawah</label>
                                            <h6>{{ $sk->m_bawah }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label for="perihal">Margin Kanan</label>
                                            <h6>{{ $sk->m_kanan }}</h6>
                                        </div>
                                        <div class="col s3 mb-20">
                                            <label for="perihal">Margin Kiri</label>
                                            <h6>{{ $sk->m_kiri }}</h6>
                                        </div>
                                    </div>
                                    @if($sk->status_surat == 'revisi')
                                    <div class="row">
                                        <div class="col s12 mb-20">
                                            <label for="perihal">Revisi</label>
                                            <textarea readonly class="materialize-textarea">{{ $sk->revisi }}</textarea>
                                        </div>
                                    </div>
                                    @endif
                                    @if (Request::is('validasi-sk/*'))
                                    <form id="form-surat" action="{{ url('validasi-sk/detail-surat/validasi') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_surat_keluar" value="{{ $sk->id_surat_keluar }}">
                                        <div class="row">
                                            <div class="col s12">
                                                <label for="role">Validasi</label>
                                                <select class="error validate" id="status_surat" name="status_surat" aria-required="true" required>
                                                    <option disabled selected>Pilih</option>
                                                    <option value="disetujui">Disetujui</option>
                                                    <option value="revisi">Revisi</option>
                                                    <option value="ditolak">Tolak</option>
                                                </select>
                                                <div class="input-field">
                                                </div>
                                            </div>
                                            <div class="col s12" id="revisi" style="display: none">
                                                <label for="">Revisi</label>
                                                <textarea name="revisi" class="materialize-textarea" required>isi revisi</textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn waves-effect green">Validasi</button>
                                    </form>
                                    @endif
                                    <div class="mb-20"></div>
                                    <div class="row">
                                        <div class="col s12">
                                            <form action="{{ url('surat-keluar/lihat-surat-pdf-draft') }}" method="post" target="_blank">
                                                @csrf
                                                <input type="hidden" name="id_surat_keluar" value="{{ $sk->id_surat_keluar }}">
                                                <button type="submit" class="btn waves-effect waves-light">
                                                    <i class="material-icons">visibility</i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @if (Request::is('persetujuan-ttd/*'))
                                    <div class="mb-20"></div>
                                    <div class="row">
                                        <div class="col s12">
                                            <form action="{{ url('persetujuan-ttd/detail-surat/ttd') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id_surat_keluar" value="{{ $sk->id_surat_keluar }}">
                                                <button type="submit" class="btn waves-effect green">Ttd</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
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
    document.getElementById('status_surat').addEventListener('change', function () {
        var style = this.value == 'revisi' ? 'block' : 'none';
        document.getElementById('revisi').style.display = style;
    });
</script>
@endpush
