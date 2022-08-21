@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 500
    });

</script>
@endpush
@section('title')
Buat Surat Baru
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
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Buat Surat Baru
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
                                            <h4 class="card-title">Buat Surat Baru</h4>
                                            <p>Lengkapi form berikut</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div id="html-view-validations">
                                    <form class="formValidate0" id="formValidate0" method="get">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <label for="uname0">Nomor Surat</label>
                                                <input class="validate" required aria-required="true" name=""
                                                    type="text" value="nomor_surat" readonly>
                                            </div>
                                            <div class="col s12">
                                                <label for="role">Klasifikas Surat*</label>
                                                <input type="hidden" value="id_klasifikasi"
                                                    name="id_klasifikasi">
                                                <input class="validate" required aria-required="true" name="klasifikasi"
                                                    type="text" value="nama_klasifikasi" readonly>
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s12">
                                                <input type="date" class="datepicker"
                                                    value="tgl_surat_fisik" readonly>
                                                <label for="dob">Tanggal Surat Fisik*</label>
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s6">
                                                <label for="status">Validator*</label>
                                                <input name="id_validator" type="hidden"
                                                    value="id_validator">
                                                <input class="validate" readonly aria-required="true" type="text"
                                                    value="nama_validator">
                                            </div>

                                            <!-- <div class="input-field col s6">
                                                <label for="status">Persetujuan TTD*</label>
                                                <input name="id_validator" type="hidden"
                                                    value="id_ttd">
                                                <input class="validate" readonly aria-required="true" type="text"
                                                    value="nama_ttd">
                                            </div> -->

                                            <div class="input-field col s12">
                                                <label for="tujuan">Tujuan Surat*</label>
                                                <input class="validate" required aria-required="true" id="tujuan"
                                                    name="tujuan_surat" type="text">
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="tujuan">Email Tujuan*</label>
                                                <input class="validate" required aria-required="true"
                                                    name="email_tujuan" type="text">
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="status">Status</label>
                                                <input class="validate" required aria-required="true" id="status"
                                                    name="status" type="text">
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="perihal">Perihal</label>
                                                <input class="validate" required aria-required="true" id="perihal"
                                                    name="perihal" type="text">
                                            </div>

                                            <!-- <div class="progress">
                                                <div class="determinate grey" style="width: 100%"></div>
                                            </div> -->
                                            <div class="col s8">
                                                <label for="mytextarea">Isi Surat*</label>
                                                <form method="post">
                                                    <textarea id="mytextarea"></textarea>
                                                </form>
                                            </div>
                                            <div class="col s4">
                                                <li class="list-group-item">
                                                    <p class="card-description">Klik tombol dibawah ini untuk
                                                        menyisipkan variabel kedalam surat.</p>
                                                    <div class="row mt-4">
                                                        <a class="waves-effect btn-flat">Nama</a>
                                                        <a class="waves-effect btn-flat">Email</a>
                                                        <a class="waves-effect btn-flat">Perihal</a>
                                                        <a class="waves-effect btn-flat">No Surat</a>
                                                        <a class="waves-effect btn-flat">Tgl Surat</a>
                                                        <a class="waves-effect btn-flat">Tujuan</a>
                                                        <a class="waves-effect btn-flat">Karakteristik</a>
                                                        <a class="waves-effect btn-flat">Derajat</a>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <p class="card-description">Klik tombol dibawah untuk memilih Tanda
                                                        Tangan.</p>
                                                    <select class="js-example-basic-multiple w-100" name="ttd_user"
                                                        id="ttd_user" data-placeholder="Pilih TTD"
                                                        onchange="addTtd(this.value)">
                                                        <option selected disabled>Pilih TTD</option>
                                                        <option value="1">Administrator (ICT)</option>
                                                        <option value="102">Ketua III (Ketua III)</option>
                                                        <option value="98">Ketua Perpenas (PP1)</option>
                                                        <option value="103">Nuris - Staf IT II (Staf IT II)</option>
                                                        <option value="101">nurul islam (Sekretaris I)</option>
                                                        <option value="104">sahrul (Staf Khusus Perpenas)</option>
                                                        <option value="99">Sekretariat (Kepala Sekretariat)</option>
                                                        <option value="100">Sekretariat umum (Staf Sekretariat Umum)
                                                        </option>
                                                        <option value="90">Staf IT I (Staf IT I)</option>
                                                        <option value="93">Staf Khusus (Staf Khusus Perpenas)</option>
                                                    </select>
                                                    <div id="hiden"></div>
                                                    <div id="tanda"></div>
                                                </li>
                                                <li class="list-group-item">
                                                    <p class="card-description ">Untuk settingan surat default.</p>
                                                    <table class="card-description w-100 table">
                                                        <tr>
                                                            <td>1.</td>
                                                            <td>Orientasi Ukuran</td>
                                                            <td>: Potrait A4</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2.</td>
                                                            <td>Margin</td>
                                                            <td>: 10 mm</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Margin Kiri</td>
                                                            <td>: 15 mm</td>
                                                        </tr>
                                                    </table>

                                                </li>
                                            </div>
                                            <div class="col s12">
                                                <p>
                                                    <label>
                                                        <input class="validate" required aria-required="true"
                                                            id="tnc_select1" type="checkbox" />
                                                        <span>Data yang saya masukkan sudah benar</span>
                                                    </label>
                                                </p>
                                                <div class="input-field">
                                                </div>
                                            </div>


                                            <div class="input-field col s12">
                                                <button class="btn waves-effect green left" type="submit" name="action">
                                                    Buat Surat
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
