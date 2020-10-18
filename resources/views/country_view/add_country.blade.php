@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('country') }}</div>
                    <div class="card-body">
                        <form action="{{url('country/add')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : "" }}">
                                name_ar : <input type="text" value="{{Request::old('name_ar')}}" class="form-control" name="name_ar" placeholder="Enter You name in arabic">
                            </div>
                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : "" }}">
                                name_en : <input type="text" value="{{Request::old('name_en')}}" class="form-control" name="name_en" placeholder="Enter You name in English">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Add ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



