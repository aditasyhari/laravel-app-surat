@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
@endpush
@section('title')
    Template Surat
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
                        <li class="breadcrumb-item"><a href="index-2.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Daftar Template Surat
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="section section-data-tables">
                <!-- DataTables example -->
                <!-- Page Length Options -->
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <a href="{{ url('template-surat/tambah-template') }}" class="waves-effect waves-light  btn gradient-45deg-light-blue-cyan box-shadow-none border-round mr-1 mb-1 right">Tambah</a>
                                <h4 class="card-title">Data Template Surat</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Nama Template</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Dibuat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($template as $tp)
                                                <tr>
                                                    <td>{{ $tp->nama_template }}</td>
                                                    <td style="text-transform: uppercase;">{{ $tp->status_template }}</td>
                                                    <td>{{ tglIndo($tp->created_at) }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col s2">
                                                                <a href="{{ url('template-surat/edit-template/'.$tp->id_template) }}" class="mb-6 btn-floating waves-effect waves-light gradient-45deg-green-teal" title="detail dan edit">
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                            </div>
                                                            <div class="col s2">
                                                                <form method="POST" action="{{ url('template-surat/delete/'.$tp->id_template) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="mb-6 btn-floating waves-effect waves-light gradient-45deg-purple-deep-orange show_confirm" title="Hapus Data"><i class="material-icons">delete</i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- <a class="mb-6 btn-floating waves-effect waves-light gradient-45deg-purple-deep-orange" title="delete">
                                                            <i class="material-icons">delete</i>
                                                        </a> -->
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
<script src="{{asset('app-assets/vendors/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/card-advanced.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/data-tables.js')}}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Anda yakin menghapus data ini?`,
            text: "Jika anda hapus, data akan hilang.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
        });
    });
</script>
@endpush
