<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <title>
        @yield('title')
    </title>
    @include('layout.style')
    @stack('style')
</head>

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  "
    data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <header class="page-topbar" id="header">
        @include('layout.header')
    </header>

    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
        <div class="brand-sidebar">
            <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index-2.html"><img
                        src="{{asset('app-assets/images/logo/materialize-logo-color.png')}}"
                        alt="materialize logo" /><span class="logo-text hide-on-med-and-down">E-Surat</span></a><a
                    class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
            @include('layout.sidenav')
        </div>
    </aside>

    <div id="main">
        @yield('content')
    </div>

    <footer
        class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
        <div class="footer-copyright">
            <div class="container">
                <span>&copy; 2022 <a href="#">E-surat</a> All rights reserved.</span>
            </div>
        </div>
    </footer>

    @include('layout.script')

    @if($message = Session::get('error'))
    <script>
        swal({
            icon: 'error',
            title: '{{ $message }}',
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                confirmButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
    </script>
    @endif

    @stack('js')
</body>

</html>
