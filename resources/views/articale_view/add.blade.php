@extends('layouts.app')
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Artacile') }}</div>
                <div class="card-body">
                    <form action="{{url('articale/add')}}" enctype="multipart/form-data" method="POST"  >
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('tittle') ? ' has-error' : "" }}">
                            tittle : <input type="text" value="{{Request::old('tittle')}}" class="form-control" name="tittle" placeholder="Enter You tittle">
                        </div>
                        <div class="form-group{{ $errors->has('body') ? ' has-error' : "" }}">
                            body : <textarea type="text" value="{{Request::old('body')}}" class="form-control" name="body"></textarea>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : "" }}">
                            <table class="table">
                                <tr>
                                    <td width="40%" align="right"><label>Select File for Upload</label></td>
                                    <td width="30"><input type="file" value="{{Request::old('image')}}" name="image" /></td>
                                </tr>
                                <tr>
                                    <td width="40%" align="right"></td>
                                    <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                                </tr>
                            </table>
                        </div>

                                <input type="file" name="upload_file" />
                        <input type="submit" class="btn btn-primary" value="Add ">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample styleselect fontselect fontsizeselect',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>
@endsection



