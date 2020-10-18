@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit city') }}</div>
                    <div class="card-body">
                        <form action="{{url('city/edit/'.$city->id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : "" }}">
                                name_ar : <input type="text"  class="form-control" name="name_ar" value="{{$city->name_ar}}" placeholder="enter you name in arabic">
                            </div>
                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : "" }}">
                                name_en : <input type="text" class="form-control" name="name_en" value="{{$city->name_en}}" placeholder="enter you name in arabic">
                            </div>
                            <div class="form-group">
                                <select id="country_id" name="country_id" class="form-control" style="width:350px" >
                                    <option value="" selected disabled>Select</option>
                                    @foreach($country as $key => $mycountry)
                                        <option value="{{$key}}"> {{$mycountry}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')" value="Edit articale">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection