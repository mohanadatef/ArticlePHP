@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset password Member') }}</div>
                    <div class="card-body">
                        <form action="{{url('member/reset/'.$member->id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                                password : <input type="password" value="{{Request::old('password')}}" class="form-control" name="password" placeholder="Enter You password">
                            </div>
                            <div class="form-group">
                                password confirmation : <input type="password" value="{{Request::old('password')}}" class="form-control" name="password_confirmation" placeholder="Enter You password">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Add ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



