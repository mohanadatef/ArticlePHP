@include('incloude.header_datatable')
<?php $count=1; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="box-title">ِAll Member</h3>
                    <a class="btn btn-primary" href="{{url('member/export')}}" >Export User Data</a>
                    <a class="btn btn-primary" href="{{url('home')}}" >back</a>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-bordered table-striped" width="100%" >
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>code</th>
                                <th>country</th>
                                <th>city</th>
                                <th>image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>reset password</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $mymember)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{$mymember->name}}</td>
                                    <td>{{$mymember->email}}</td>
                                    <td>
                                        @if($mymember->code ==1)
                                            <h style="background-color:#c51f1a;">admin</h>
                                        @elseif($mymember->code ==0)
                                            <h style="background-color:#1d68a7;">user</h>
                                        @endif
                                    </td>
                                    <td>
                                        @if($mymember->country_id ==null)
                                            not choose yet
                                        @elseif($mymember->country_id !=null)
                                            {{$mymember->country->name_en}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($mymember->city_id ==null)
                                            not choose yet
                                        @elseif($mymember->city_id !=null)
                                            {{$mymember->city->name_en}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($mymember->image ==null)
                                            <img src="{{'/'.'welcome.jpg'}}" style="width:50px;height:50px;">
                                        @elseif($mymember->image !=null)
                                            <img src="{{url('profiles').'/'.$mymember->image}}" style="width:50px;height:50px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->id != $mymember->id)
                                            <a href="{{url('member/edit/'.$mymember->id)}}" class="btn btn-primary">edit</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->id != $mymember->id)
                                            <a href="{{url('member/delete/'.$mymember->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->id != $mymember->id)
                                            <a href="{{url('member/reset/'.$mymember->id)}}" class="btn btn-success">reset password</a>
                                        @endif
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
@include('incloude.scripts_datatable')
