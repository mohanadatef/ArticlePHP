@extends('layouts.app')
@section('content')
    <?php $count=1; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-header pull-left">
                    <h3 class="box-title">ِAll articale</h3>
                </div>
            </div>
        </div>
        @foreach($articale as $myarticale)
            <div class="col-md-4">
                <div class="card mb-3" style="min-width: 18rem;">
                    <div class="card-header bg-dark text-white">
                        {{$myarticale->tittle}}
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            {{$myarticale->body}}
                        </div>
                        <div class="card-image">
                            <img src="{{url('images').'/'.$myarticale->image}}" style="width:100px;height:100px;">
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
@endsection
