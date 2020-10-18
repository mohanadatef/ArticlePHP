@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Brand') }}</div>
                    <div class="card-body">
                        <form action="{{url('city/import')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <span class="text-muted">file must .xlsx</span>
                            <br>
                            <br>
                            <button class="btn btn-primary">Import city Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
