@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Member') }}</div>
                <div class="card-body">
                    <form action="{{url('member/edit/'.$member->id)}}" enctype="multipart/form-data" method="POST">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                            name : <input type="text"  class="form-control" name="name" value="{{$member->name}}" placeholder="enter you name">
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                            email : <input type="email" class="form-control" name="email" value="{{$member->email}}" placeholder="enter you email">
                        </div>
                        <div class="form-group{{ $errors->has('code') ? ' has-error' : "" }}" >
                            code : <select  type="code" class="form-control" name="code">
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
                        @if($member->image ==null)
                            <img src="{{'/'.'welcome.jpg'}}" style="width:50px;height:50px;">
                        @elseif($member->image !=null)
                          image :  <img src="{{url('profiles').'/'.$member->image}}" style="width:100px;height:100px;">
                        @endif
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                            <table class="table">
                                <tr>
                                    <td width="40%" align="right"><label>Select File for Upload</label></td>
                                    <td width="30"><input type="file"   name="image" /></td>
                                </tr>
                                <tr>
                                    <td width="40%" align="right"></td>
                                    <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                </tr>
                            </table>
                        </div>
                        <input type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')" value="Edit member">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection