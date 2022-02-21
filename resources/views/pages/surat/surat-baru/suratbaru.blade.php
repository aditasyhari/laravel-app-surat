@extends('layout.master')
@section('title')
Surat Baru
@endsection
@section('content')
<div class="row">

    <div class="col s12 m12 xl6">
        <div id="flight-card" class="card">
            <a href="{{url('non-template')}}">
                <div class="card-header light-blue accent-2">
                    <div class="card-title">
                        <h5 class="task-card-title mb-3 mt-0 white-text">Surat Non Template</h5>
                    </div>
                </div>
                <div class="card-content-bg white-text">
                    <div class="card-content">
                        <div class="row flight-state-wrapper">
                            <div class="col s5 m5 l5 center-align">

                            </div>
                            <div class="col s2 m2 l2 center-align"><i class="material-icons flight-icon">subject</i>
                            </div>

                        </div>

                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col s12 m12 xl6">
        <div id="flight-card" class="card">
            <a href="">

                <div class="card-header deep-orange accent-2">
                    <div class="card-title">
                        <h5 class="task-card-title mb-3 mt-0 white-text">Surat Template</h5>
                    </div>
                </div>
                <div class="card-content-bg white-text">
                    <div class="card-content">
                        <div class="row flight-state-wrapper">
                            <div class="col s5 m5 l5 center-align">

                            </div>
                            <div class="col s2 m2 l2 center-align"><i class="material-icons flight-icon">description</i>
                            </div>

                        </div>

                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
