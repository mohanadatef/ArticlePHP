@extends('layouts.app')
<link rel="stylesheet" href="{{url('css/owl.carousel.min.css')}}">
<style>
    .carousel {
        margin-bottom: 50px;
    }
    .pagination li span{
        margin-right:15px;
        font-size: 16px;
    }
    .pagination li a{
        margin-right:15px;
        font-size: 16px;
        color: #000;
    }
    .pagination .active span{
        background-color: #B3832D;
        border-color: #B3832D;
    }
</style>
@section('content')
    <div class="container">
        <h3 class="box-title">ِAll articale</h3>
        <div  class="full-size page-wrapper" style="visibility: inherit; opacity: 1;">
            <div class="container">
                <div class="owl-carousel owl-theme clients-slider">
                    @foreach($articale as $myarticale)
                        <div class="item">
                            <div class="card-header bg-dark text-white">
                                {{$myarticale->tittle}}
                            </div>
                            <div class="card-text">
                                {{$myarticale->body}}
                            </div>
                            <a target="_blank" href="#">
                                <img src="{{url('public/images').'/'.$myarticale->image}}" style="width:100px;height:100px;">
                            </a>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('js/owl.carousel.js')}}"></script>
    <script src="{{url('js/main-scripts.js')}}"></script>
@endsection
