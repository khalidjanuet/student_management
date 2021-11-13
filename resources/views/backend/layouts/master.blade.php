<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('img/basic/favicon.ico')}}" type="image/x-icon">
    <title>@yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/mb-res.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    @yield('styles')
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body class="light">
@include('backend.includes.pre_loader')
<div id="app">
@include('backend.includes.left_side_bar')
<!--Sidebar End-->
@include('backend.includes.top_right_bar')

<div class="page has-sidebar-left">
    <!-- <header class="my-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="s-24">
                        <i class="icon-pages"></i>
                        
                    </h1>
                </div>
            </div>
        </div>
    </header> -->
    <div class="container-fluid my-3">
        <div class="card my-3 no-b">
            <div class="card-body">
                   @yield('content')     
            </div>
        </div>
        
    </div>
</div>
@include('backend.includes.right_side_bar')
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="{{asset('js/app.js')}}"></script>

@yield('scripts')
</body>
</html>