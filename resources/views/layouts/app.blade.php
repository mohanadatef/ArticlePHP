<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('incloude.header')
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if(Auth::user()->code==1)
                            <a class="navbar-brand" href="{{ url('/home') }}">
                                {{ config('app.name', 'artical') }}
                            </a>
                            <div class="navbar-brand">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">articale
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <div class="card-body">
                                            <li><a class="navbar-brand" href="{{url('/articale/add')}}">Add Articale</a></li>
                                            <li><a class="navbar-brand" href="{{url('/articale/show')}}">Show Articale</a></li>
                                            <li><a class="navbar-brand" href="{{url('/articale/import')}}">Import Articale</a></li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="navbar-brand">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">member
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <div class="card-body">
                                            <li><a class="navbar-brand" href="{{url('/member/add')}}">Add Member</a></li>
                                            <li><a class="navbar-brand" href="{{url('/member/show')}}">Show Member</a></li>
                                            <li><a class="navbar-brand" href="{{url('/member/import')}}">Import Member</a></li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="navbar-brand">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">core data
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <div class="card-body">
                                            <li><a class="navbar-brand" href="{{url('/test/show')}}">test</a></li>
                                            <li class="dropdown-submenu">
                                                <a class="test">country <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <div class="card-body">
                                                        <li><a class="navbar-brand" href="{{url('/country/add')}}">Add Country</a></li>
                                                        <li><a class="navbar-brand" href="{{url('/country/show')}}">Show Country</a></li>
                                                        <li><a class="navbar-brand"  href="{{url('/country/import')}}">Import country</a></li>
                                                    </div>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a class="test" >city <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <div class="card-body">
                                                        <li><a class="navbar-brand" href="{{url('/city/add')}}">Add city</a></li>
                                                        <li><a class="navbar-brand" href="{{url('/city/show')}}">Show city</a></li>
                                                        <li><a class="navbar-brand" href="{{url('/city/import')}}">Import city</a></li>
                                                    </div>
                                                </ul>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a class="navbar-brand" href="{{ url('/home') }}">
                                {{ config('app.name', 'artical') }}
                            </a>
                            <a class="navbar-brand" href="{{url('/articale/add')}}">Add Articale</a>
                            <a class="navbar-brand" href="{{url('/articale/show')}}">Show Articale</a>
                        @endif
                    @else
                        <a class="navbar-brand" href="{{ url('/welcome') }}">
                            {{ config('app.name', 'artical') }}
                        </a>
                    @endauth
                </div>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @yield('content')
    </main>
</div>
</body>
@include('incloude.scripts')
</html>
