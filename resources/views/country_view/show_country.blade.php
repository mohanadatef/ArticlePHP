@include('incloude.header_datatable')
<?php $count=1; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="box-title">ِAll country</h3>
                    <a class="btn btn-primary" href="{{url('country/export')}}" >Export country Data</a>
                    <a class="btn btn-primary" href="{{url('home')}}" >back</a>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-bordered table-striped" width="100%"  >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name ar</th>
                            <th>name en</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($country as $mycountry)
                            <tr>
                                <td>{{$count++ }}</td>
                                <td>{{$mycountry->name_ar}}</td>
                                <td>{{$mycountry->name_en}}</td>
                                <td>
                                    <a href="{{url('country/edit/'.$mycountry->id)}}" class="btn btn-primary" >edit</a>
                                </td>
                                <td>
                                    <a href="{{url('country/delete/'.$mycountry->id)}}"  class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</a>
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