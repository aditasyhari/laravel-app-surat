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
        plugins: 'lineheight style print preview powerpaste casechange searchreplace autosave save directionality advcode visualblocks visualchars fullscreen table charmap hr nonbreaking toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter permanentpen charmap mentions',
        theme: 'silver',
        convert_fonts_to_spans : false,  
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify lineheight | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | charmap | fullscreen  preview save print | a11ycheck',
        lineheight_formats: '1 1.1 1.2 1.3 1.4 1.5 2',
        font_formats: "Arial=arial,helvetica,sans-serif;Sans Serif=sans-serif;Courier New=courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings",
    });

    tinymce.init({
        selector: '#layout_kop',
        height: 350,
        plugins: 'hr image lineheight style print preview powerpaste casechange searchreplace autosave save directionality advcode visualblocks visualchars fullscreen table charmap hr nonbreaking toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter permanentpen charmap mentions',
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
    Edit Template Surat
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Template Surat</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Template
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
                                            <h4 class="card-title">Edit Template Surat</h4>
                                            <p>Lengkapi form berikut</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div id="html-view-validations">
                                    <form class="formValidate0" id="form-surat" method="post" action="" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <label for="status">Nama Template*</label>
                                                <input class="validate" required aria-required="true" type="text" name="nama_template" value="{{ $template->nama_template }}">
                                            </div>

                                            <div class="col s6">
                                                <label for="status">Validator Template*</label>
                                                <select class="error validate" name="id_validator" aria-required="true" required>
                                                    <option disabled selected>Pilih</option>
                                                    @foreach($validator as $v)
                                                        <option value="{{ $v->id_user }}" style="text-transform: uppercase" {{ ($template->id_validator == $v->id_user? 'selected' : '') }}>{{ $v->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col s6">
                                                <label for="status">Klasifikasi*</label>
                                                <select class="error validate" name="id_klasifikasi" aria-required="true" required>
                                                    <option disabled selected>Pilih</option>
                                                    @foreach($klasifikasi as $k)
                                                        <option value="{{ $k->id_klasifikasi }}" {{ ($template->id_klasifikasi == $k->id_klasifikasi? 'selected' : '') }} style="text-transform: uppercase">{{ $k->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-field col s3">
                                                <label for="">Margin Kanan (mm)</label>
                                                <input class="validate" required aria-required="true" value="10" name="m_kanan" type="number" value="{{ $template->m_kanan }}">
                                            </div>

                                            <div class="input-field col s3">
                                                <label for="">Margin Kiri (mm)</label>
                                                <input class="validate" required aria-required="true" value="10" name="m_kiri" type="number" value="{{ $template->m_kiri }}">
                                            </div>

                                            <div class="input-field col s3">
                                                <label for="">Margin Atas (mm)</label>
                                                <input class="validate" required aria-required="true" value="10" name="m_atas" type="number" value="{{ $template->m_atas }}">
                                            </div>

                                            <div class="input-field col s3">
                                                <label for="">Margin Bawah (mm)</label>
                                                <input class="validate" required aria-required="true" value="10" name="m_bawah" type="number" value="{{ $template->m_bawah }}">
                                            </div>

                                            <div class="col s3">
                                                <label for="">Orientasi Halaman</label>
                                                <select class="error validate" name="orientasi_hal" aria-required="true" required>
                                                    <option value="landscape" {{ ($template->orientasi_hal == 'landscape' ? 'selected' : '') }}>Landscape</option>
                                                    <option value="potrait" {{ ($template->orientasi_hal == 'potrait' ? 'selected' : '') }}>Potrait</option>
                                                </select>
                                            </div>

                                            <div class="col s3">
                                                <label for="">Ukuran Halaman</label>
                                                <select class="error validate" name="ukuran_hal" aria-required="true" required>
                                                    <option value="A4" {{ ($template->ukuran_hal == 'A4' ? 'selected' : '') }}>A4</option>
                                                    <option value="F4" {{ ($template->ukuran_hal == 'F4' ? 'selected' : '') }}>F4</option>
                                                </select>
                                            </div>

                                            <!-- <div class="col s4">
                                                <label for="">Ukuran TTD (px)</label>
                                                <input class="validate" required aria-required="true" value="220" name="ukuran_ttd" type="number">
                                            </div> -->

                                            <div class="col s12">
                                                <label for="mytextarea">Kop Surat* (size gambar/logo harus kurang dari 1 mb)</label>
                                                <textarea id="layout_kop" name="layout_kop" required>{{ $template->layout_kop }}</textarea>
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
                                                    <!-- <button type="button" class="btn btn-small mbm-5 waves-effect" onclick="variabel('ttd')">TTD</button> -->
                                                </div>
                                            </div>

                                            <div class="col s12">
                                                <label for="mytextarea">Isi Surat*</label>
                                                <textarea id="layout_konten" name="layout_konten" required>{{ $template->layout_konten }}</textarea>
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
                                                <button onclick="windowPreview()" class="btn">Preview</button>
                                                <button class="btn waves-effect green" onclick="windowSubmit()" id="btn-submit" disabled>
                                                    Update Template
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

    let form_surat = document.getElementById('form-surat');

    function windowPreview() {
        form_surat.action = "/template-surat/preview";
        form_surat.target = "_blank";
        form_surat.submit();
    }

    function windowSubmit() {
        form_surat.action = "";
        form_surat.target = "";
        form_surat.submit();
    }
</script>

@endpush
