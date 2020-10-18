@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Member') }}</div>
                    <div class="card-body">
                        <form action="{{url('member/add')}}" action="yout path" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                                Name : <input type="text" value="{{Request::old('name')}}" class="form-control" name="name" placeholder="Enter You name">
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                                email : <input type="text" value="{{Request::old('email')}}" class="form-control" name="email" placeholder="Enter You email">
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                                password : <input type="password" value="{{Request::old('password')}}" class="form-control" name="password" placeholder="Enter You password">
                            </div>
                            <div class="form-group">
                                password confirmation : <input type="password" value="{{Request::old('password')}}" class="form-control" name="password_confirmation" placeholder="Enter You password">
                            </div>
                            <div class="form-group">
                                code : <select class="form-group{{ $errors->has('code') ? ' is-invalid' : '' }}" type="code" class="form-control" name="code" >
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
                                        </select>
                            </div>
                            <div class="container">
                                <div class="form-group">
                                    <select id="country_id" name="country_id" class="form-control" style="width:350px" >
                                        <option value="" selected disabled>Select</option>
                                        @foreach($country as $key => $mycountry)
                                            <option value="{{$key}}"> {{$mycountry}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Select State:</label>
                                    <select name="city_id" id="city_id" class="form-control" style="width:350px">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>Select File for Upload</label></td>
                                        <td width="30"><input type="file"  name="image" ></td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                    </tr>
                                </table>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Add ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



