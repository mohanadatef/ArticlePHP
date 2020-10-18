@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Artacile') }}</div>
                <div class="card-body">
                    <form action="{{url('articale/edit/'.$articale->id)}}" enctype="multipart/form-data" method="POST">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('tittle') ? ' has-error' : "" }}">
                            tittle : <input type="text"  class="form-control" name="tittle" value="{{$articale->tittle}}" placeholder="enter you tittle">
                        </div>
                        <div class="form-group{{ $errors->has('body') ? ' has-error' : "" }}">
                            body : <textarea type="text" class="form-control" name="body" >{{$articale->body}}</textarea>
                        </div>
                        <img src="{{url('images').'/'.$articale->image}}" style="width:100px;height:100px;">
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
                        <input type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')" value="Edit articale">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection