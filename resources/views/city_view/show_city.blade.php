@include('incloude.header_datatable')
<?php $count=1; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="box-title">ِAll city</h3>
                    <a class="btn btn-primary" href="{{url('city/export')}}" >Export city Data</a>
                    <a class="btn btn-primary" href="{{url('home')}}" >back</a>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-bordered table-striped" width="100%"  >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name ar</th>
                            <th>name en</th>
                            <th>country</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($city as $mycity)
                            <tr>
                                <td>{{$count++ }}</td>
                                <td>{{$mycity->name_ar}}</td>
                                <td>{{$mycity->name_en}}</td>
                                <td>{{$mycity->country->name_en}}</td>
                                <td>
                                    <a href="{{url('city/edit/'.$mycity->id)}}" class="btn btn-primary" >edit</a>
                                </td>
                                <td>
                                    <a href="{{url('city/delete/'.$mycity->id)}}"  class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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