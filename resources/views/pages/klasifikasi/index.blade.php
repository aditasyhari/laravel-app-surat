@extends('layout.master')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
<style>
    .text-uppercase {
        text-transform: uppercase;
    }
</style>
@endpush
@section('title')
    Klasifikasi Surat
@endsection
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">Klasifikasi Surat</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Klasifikasi
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
                                <h4 class="card-title">
                                    Data Klasifikasi Surat
                                    <a href="{{ url('klasifikasi/tambah-klasifikasi') }}" class="btn-floating btn-large waves-effect waves-light blue btn-small" title="Tambah Anggota"><i class="material-icons">add</i></a>
                                </h4>
                                @if ($message = Session::get('success'))
                                    <div class="card-panel green lighten-1">
                                        <strong class="white-text">{{ $message }}</strong>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Kode</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($klasifikasi as $k)
                                                <tr>
                                                    <td class="text-uppercase">{{ $k->nama }}</td>
                                                    <td class="text-uppercase">{{ $k->kode }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col s2">
                                                                <a href="{{ url('klasifikasi/edit-klasifikasi/'.$k->id_klasifikasi) }}" class="btn-floating btn-large waves-effect waves-light cyan accent-3 btn-small" title="Edit Data"><i class="material-icons">edit</i></a>
                                                            </div>
                                                            <div class="col s1">
                                                                <form method="POST" action="{{ url('klasifikasi/delete-klasifikasi/'.$k->id_klasifikasi) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn-floating btn-large waves-effect waves-light red btn-small show_confirm" title="Hapus Data"><i class="material-icons">delete</i></button>
                                                                </form>
                                                            </div>
                                                        </div>
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