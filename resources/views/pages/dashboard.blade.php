@extends('layout.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
            <!--card stats start-->
            <div id="card-stats">
                <div class="row">
                    <div class="col s12 m6 l6 xl3">
                        <div
                            class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                            <div class="padding-4">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">email</i>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-0 white-text">{{ $total_sm }}</h5>
                                    <p class="no-margin">Surat Masuk</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6 l6 xl3">
                        <div
                            class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                            <div class="padding-4">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">contact_mail</i>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-0 white-text">{{ $total_sk }}</h5>
                                    <p class="no-margin">Surat Keluar</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6 l6 xl3">
                        <div
                            class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                            <div class="padding-4">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">description</i>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-0 white-text">{{ $total_template }}</h5>
                                    <p class="no-margin">Template Surat</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m6 l6 xl3">
                        <div
                            class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                            <div class="padding-4">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">perm_identity</i>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <h5 class="mb-0 white-text">{{ $total_anggota }}</h5>
                                    <p class="no-margin">Anggota</p>
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
