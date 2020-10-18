@include('incloude.header_datatable')
<?php $count=1; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="box-title">ِAll Articale</h3>
                    <a class="btn btn-primary" href="{{url('articale/export')}}" >Export articale Data</a>
                    <a class="btn btn-primary" href="{{url('home')}}" >back</a>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-bordered table-striped" width="100%"  >
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>tittle</th>
                                <th>body</th>
                                <th>user</th>
                                <th>image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($articale as $myarticale)
                            <tr>
                                <td>{{$count++ }}</td>
                                <td>{{$myarticale->tittle}}</td>
                                <td>{{$myarticale->body}}</td>
                                <td>{{$myarticale->user->name}}</td>
                                <td><img src="{{url('public/images').'/'.$myarticale->image}}" style="width:25px;height:25px;"></td>
                                <td><img src="{{$myarticale->test_file}}" style="width:25px;height:25px;"></td>
                                <td ><a href="{{$myarticale->test_file }}"><i class="fa fa-download"></i> open</a> </td>

                                <td>
                                    <a href="{{url('articale/edit/'.$myarticale->id)}}" class="btn btn-primary" >edit</a>
                                </td>
                                <td>
                                    <a href="{{url('articale/delete/'.$myarticale->id)}}"  class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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