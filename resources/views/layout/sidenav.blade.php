<ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
    data-menu="menu-navigation" data-collapsible="menu-accordion">
    <li class="bold">
        <a class="collapsible-body {{ (request()->is('/*')) ? 'active' : '' }}" href="{{url('/')}}">
            <i class="material-icons">settings_input_svideo</i>
            <span class="menu-title" data-i18n="">Dashboard</span>
        </a>
    </li>

    <li class="bold">
        <a class="waves-effect waves-cyan {{ (request()->is('surat-baru')) ? 'active' : '' }}" href="{{url('surat-baru')}}">
            <i class="material-icons">fiber_new</i>
            <span class="menu-title" data-i18n="">Surat Baru</span>
        </a>
    </li>
    <li class="bold">
        <a class="waves-effect waves-cyan {{ (request()->is('surat-masuk*')) ? 'active' : '' }}" href="{{url('surat-masuk')}}">
            <i class="material-icons">mail_outline</i>
            <span class="menu-title" data-i18n="">Surat Masuk</span>
        </a>
    </li>
    <li class="bold">
        <a class="waves-effect waves-cyan {{ (request()->is('surat-keluar*')) ? 'active' : '' }}" href="{{url('surat-keluar')}}">
            <i class="material-icons">contact_mail</i>
            <span class="menu-title" data-i18n="">Surat Keluar</span>
        </a>
    </li>

    <li class="active bold">
        <a class="collapsible-header waves-effect waves-cyan {{ (request()->is('template-surat*')) ? 'active' : '' }}">
            <i class="material-icons">description</i>
            <span class="menu-title" data-i18n="">Template Surat</span>
        </a>
        <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                <li>
                    <a class="collapsible-body" href="{{url('template-surat/daftar-template')}}" data-i18n="">
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>Daftar Template</span>
                    </a>
                </li>
                <li>
                    <a class="collapsible-body" href="{{url('template-surat/approv-template')}}" data-i18n="">
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>Approv Template</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="active bold">
        <a class="collapsible-header waves-effect waves-cyan {{ (request()->is('arsip-surat*')) ? 'active' : '' }}" href="#">
            <i class="material-icons">storage</i>
            <span class="menu-title" data-i18n="">Arsip Surat</span>
        </a>
        <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">

                <li>
                    <a class="collapsible-body" href="{{url('arsip-surat/arsip-surat-masuk')}}" data-i18n="">
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>Arsip Masuk</span>
                    </a>
                </li>
                <li>
                    <a class="collapsible-body" href="{{url('arsip-surat/arsip-surat-keluar')}}" data-i18n="">
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>Arsip Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    @if(Auth::user()->role == 'admin')
    <li class="bold">
        <a class="waves-effect waves-cyan {{ (request()->is('klasifikasi*')) ? 'active' : '' }}" href="{{url('klasifikasi')}}">
            <i class="material-icons">attachment</i><span class="menu-title" data-i18n="">Klasifikasi</span>
        </a>
    </li>
    <li class="bold">
        <a class="waves-effect waves-cyan {{ (request()->is('manajemen-anggota*')) ? 'active' : '' }}" href="{{url('manajemen-anggota')}}">
            <i class="material-icons">face</i><span class="menu-title" data-i18n="">Manajemen Anggota</span>
        </a>
    </li>
    @endif
</ul>
