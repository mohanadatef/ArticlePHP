@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit country') }}</div>
                    <div class="card-body">
                        <form action="{{url('country/edit/'.$country->id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : "" }}">
                                name_ar : <input type="text"  class="form-control" name="name_ar" value="{{$country->name_ar}}" placeholder="enter you name in arabic">
                            </div>
                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : "" }}">
                                name_en : <input type="text" class="form-control" name="name_en" value="{{$country->name_en}}" placeholder="enter you name in arabic">
                            </div>
                            <input type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')" value="Edit articale">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection