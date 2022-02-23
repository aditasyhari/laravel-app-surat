@extends('layout.master')
@section('title')
Profile
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Profile</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">User</a>
                        </li>
                        <li class="breadcrumb-item active">Profile
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="row user-profile mt-1">
                <img class="responsive-img" alt="" src="{{asset('app-assets/images/gallery/search.jpg')}}">
            </div>
            <div class="section" id="user-profile">
                <div class="row">
                    <!-- User Profile Feed -->
                    <div class="col s12 m4 l3 user-section-negative-margin">
                        <div class="row">
                            <div class="col s12 center-align">
                                @if (Auth::user()->foto == true)
                                <img class="responsive-img circle z-depth-5" width="200"
                                    src="{{asset('image/profile/'.Auth::user()->foto)}}" alt="">
                                @else
                                <img class="responsive-img circle z-depth-5" width="200"
                                    src="{{asset('app-assets/images/gallery/35.png')}}" alt="">
                                @endif
                                <br>
                                <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
                                {{-- modal --}}
                                <div id="modal1" class="modal">
                                    <div class="modal-content">
                                        <h4>Edit Profile</h4>
                                        <form class="formValidate0" id="formValidate0" action="{{ url('profile/update/'.Auth::user()->id_user) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <label for="nama">Nama</label>
                                                    <input class="validate" required aria-required="true" id="nama" name="nama"
                                                        type="text" value="{{ Auth::user()->nama }}">
                                                </div>

                                                <div class="input-field col s12">
                                                    <label for="email">Email</label>
                                                    <input class="validate" required aria-required="true" id="email"
                                                        name="email" type="text" value="{{ Auth::user()->email }}">
                                                </div>

                                                <div class="input-field col s12">
                                                    <label for="nik">NIK</label>
                                                    <input class="validate" required aria-required="true" id="nik" name="nik"
                                                        type="number" value="{{ Auth::user()->nik }}">
                                                </div>

                                                <div class="input-field col s12">
                                                    <label for="foto">Foto</label>
                                                    <input class="validate" required aria-required="true" id="foto" name="foto"
                                                        type="file">
                                                </div>

                                                <div class="input-field col s12">
                                                    <label for="ttd">Tanda Tangan</label>
                                                    <input class="validate" required aria-required="true" id="ttd" name="ttd"
                                                        type="file">
                                                </div>
                                            </div>
                                            <button class="btn waves-effect waves-light right" type="submit"
                                                name="action">Submit
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User Post Feed -->
                    <div class="col s12 m8 l6">
                        <div class="row">
                            <div class="card user-card-negative-margin z-depth-0" id="feed">
                                <div class="card-content card-border-gray">
                                    <div class="row">
                                        <div class="col s12">
                                            @if ($message = Session::get('success'))
                                                <div class="card-panel green lighten-1">
                                                    <strong class="white-text">{{ $message }}</strong>
                                                </div>
                                            @endif
                                            <h5>{{ Auth::user()->nama }}</h5>
                                            <h6>{{ Auth::user()->email }}</h6>
                                            <p>{{ Auth::user()->nik }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Today Highlight -->
                    <div class="col s12 m12 l3 hide-on-med-and-down">
                        <div class="row mt-5">
                            <div class="col s12">
                                <h6>Tanda Tangan</h6>
                                @if (Auth::user()->foto == true)
                                <img class="responsive-img card-border z-depth-2 mt-2"
                                src="{{asset('image/ttd/'.Auth::user()->ttd)}}" alt="ttd">
                                @else
                                <img class="responsive-img card-border z-depth-2 mt-2"
                                    src="{{asset('app-assets/images/misch/signature-scan.png')}}" alt="ttd">

                                    @endif
                            </div>
                        </div>

                        <hr class="mt-5">
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div><!-- START RIGHT SIDEBAR NAV -->

        </div>
    </div>
</div>


@endsection

@push('js')
<script src="{{asset('app-assets/js/scripts/advance-ui-modals.js')}}" type="text/javascript"></script>
@endpush
