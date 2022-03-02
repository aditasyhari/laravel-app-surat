@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/dropify/css/dropify.min.css')}}">

<style>
    .mbm-5 {
        margin-bottom: 5px;
    }
</style>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#layout_konten',
        height: 500,
        plugins: 'lineheight style fullpage print preview powerpaste casechange searchreplace autosave save directionality advcode visualblocks visualchars fullscreen table charmap hr nonbreaking toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter permanentpen charmap mentions',
        theme: 'silver',
        convert_fonts_to_spans : false,  
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify lineheight | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | charmap | fullscreen  preview save print | a11ycheck',
        lineheight_formats: '1 1.1 1.2 1.3 1.4 1.5 2',
        font_formats: "Arial=arial,helvetica,sans-serif;Sans Serif=sans-serif;Courier New=courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings",
    });

    tinymce.init({
        selector: '#layout_kop',
        height: 350,
        plugins: 'hr image lineheight style fullpage print preview powerpaste casechange searchreplace autosave save directionality advcode visualblocks visualchars fullscreen table charmap hr nonbreaking toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter permanentpen charmap mentions',
        theme: 'silver',
        convert_fonts_to_spans : false,
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify lineheight hr | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | charmap | fullscreen  preview save print | a11ycheck image',
        lineheight_formats: '1 1.1 1.2 1.3 1.4 1.5 2',
        automatic_uploads : true,
        // images_reuse_filename: true,
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {
    
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    // var blobInfo = blobCache.create(id, file);
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
        font_formats: "Arial=arial,helvetica,sans-serif;Sans Serif=sans-serif;Courier New=courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings"
    });

</script>
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
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a>
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
                                            <h4 class="card-title">Buat Surat Keluar</h4>
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
                                                    type="text" value="{{ $pengajuan['nomor_surat'] }}" readonly>
                                            </div>
                                            <div class="col s12">
                                                <label for="role">Klasifikas Surat*</label>
                                                <input type="hidden" value="{{ $pengajuan['id_klasifikasi'] }}"
                                                    name="id_klasifikasi">
                                                <input class="validate" required aria-required="true" name="klasifikasi"
                                                    type="text" value="{{ $pengajuan['nama_klasifikasi'] }}" readonly>
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s12">
                                                <input type="date" class="datepicker"
                                                    value="{{ $pengajuan['tgl_surat_fisik'] }}" readonly>
                                                <label for="dob">Tanggal Surat Fisik*</label>
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s6">
                                                <label for="status">Validator*</label>
                                                <input name="id_validator" type="hidden"
                                                    value="{{ $pengajuan['id_validator'] }}">
                                                <input class="validate" readonly aria-required="true" type="text"
                                                    value="{{ $pengajuan['nama_validator'] }}">
                                            </div>

                                            <div class="input-field col s6">
                                                <label for="status">Persetujuan TTD*</label>
                                                <input name="id_validator" type="hidden"
                                                    value="{{ $pengajuan['id_ttd'] }}">
                                                <input class="validate" readonly aria-required="true" type="text"
                                                    value="{{ $pengajuan['nama_ttd'] }}">
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="tujuan">Tujuan Surat*</label>
                                                <input class="validate" required aria-required="true" id="tujuan"
                                                    name="tujuan_surat" type="text">
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="tujuan">Email Tujuan*</label>
                                                <input class="validate" required aria-required="true" name="email_tujuan" type="text">
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s12">
                                                <label for="perihal">Perihal*</label>
                                                <input class="validate" required aria-required="true" id="perihal" name="perihal" type="text">
                                                <div class="input-field"></div>
                                            </div>

                                            <div class="input-field col s3">
                                                <label for="">Margin Kanan (mm)</label>
                                                <input class="validate" required aria-required="true" value="10" name="m_kanan" type="number">
                                            </div>

                                            <div class="input-field col s3">
                                                <label for="">Margin Kiri (mm)</label>
                                                <input class="validate" required aria-required="true" value="10" name="m_kiri" type="number">
                                            </div>

                                            <div class="input-field col s3">
                                                <label for="">Margin Atas (mm)</label>
                                                <input class="validate" required aria-required="true" value="10" name="m_atas" type="number">
                                            </div>

                                            <div class="input-field col s3">
                                                <label for="">Margin Bawah (mm)</label>
                                                <input class="validate" required aria-required="true" value="10" name="m_bawah" type="number">
                                            </div>

                                            <div class="col s12">
                                                <label for="mytextarea">Kop Surat* (size gambar/logo harus kurang dari 1 mb)</label>
                                                <textarea id="layout_kop" name="layout_kop" required></textarea>
                                            </div>

                                            <div class="progress">
                                                <div class="determinate grey" style="width: 100%"></div>
                                            </div>

                                            <div class="col s12 mt-20">
                                                <div class="row">
                                                    <p>Klik tombol dibawah ini untuk menyisipkan variabel kedalam surat.</p>
                                                </div>
                                                <div class="row mb-20" style="margin-top: 5px;">
                                                    <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('nama')">Nama</button>
                                                    <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('email')">Email</button>
                                                    <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('perihal')">Perihal</button>
                                                    <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('nosurat')">No Surat</button>
                                                    <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('tglsurat')">Tgl Surat</button>
                                                    <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('tujuan')">Tujuan</button>
                                                    <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('emailtujuan')">Email Tujuan</button>
                                                    <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('ttd')">TTD</button>
                                                </div>
                                            </div>

                                            <div class="col s12">
                                                <label for="mytextarea">Isi Surat*</label>
                                                <textarea id="layout_konten" name="layout_konten" required></textarea>
                                            </div>

                                            <div class="progress">
                                                <div class="determinate grey" style="width: 100%"></div>
                                            </div>

                                            <div class="col s12" style="margin-top: 15px;">
                                                <p>
                                                    <label>
                                                        <input class="validate" onclick="cek()" id="centang" type="checkbox" />
                                                        <span>Data yang saya masukkan sudah benar</span>
                                                    </label>
                                                </p>
                                                <div class="input-field">
                                                </div>
                                            </div>

                                            <div class="input-field col s12">
                                                <button class="btn waves-effect green left" type="submit" id="btn-submit" disabled>
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

<script>
    function variabel(a){
        switch(a) {
            case 'nama': tinymce.get("layout_konten").execCommand('mceInsertContent', false, '=Nama=');
                break;
            case 'email': tinymce.get("layout_konten").execCommand('mceInsertContent', false, '=Email=');
                break;
            case 'perihal': tinymce.get("layout_konten").execCommand('mceInsertContent', false, '=Perihal=');
                break;
            case 'nosurat': tinymce.get("layout_konten").execCommand('mceInsertContent', false, '=NoSurat=');
                break;
            case 'tglsurat': tinymce.get("layout_konten").execCommand('mceInsertContent', false, '=TglSurat=');
                break;
            case 'tujuan': tinymce.get("layout_konten").execCommand('mceInsertContent', false, '=Tujuan=');
                break;
            case 'emailtujuan': tinymce.get("layout_konten").execCommand('mceInsertContent', false, '=EmailTujuan=');
                break;
            case 'ttd': tinymce.get("layout_konten").execCommand('mceInsertContent', false, '=TTD=');
                break;
            default:
                break;
        }
    }

    var btnSubmit = document.getElementById('btn-submit');

    function cek() {
        var centang = document.getElementById('centang');

        if(centang.checked == true) {
            btnSubmit.removeAttribute('disabled');
        } else {
            btnSubmit.disabled = true
        }
    }
</script>

@endpush
