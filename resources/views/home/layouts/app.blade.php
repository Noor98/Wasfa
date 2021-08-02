<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>نظام ادارة المحتوى</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <link href="/bootstrap-rtl/dist/css/rtl/bootstrap.min.css" rel="stylesheet"> 
    <link href="/bootstrap-rtl/assets/css/docs.rtl.min.css"  rel="stylesheet"> 
    
    <style>
        #footer{
            min-height: 4rem;
            min-width: 768px;
            background: #563d7c;
            
        }
    #title{
    color:rebeccapurple;
    }  
    a:hover{
    color: rebeccapurple;
    font-weight: bold;
        font-style: normal;
        }
</style>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/storage/images/wasfa_resized.png" >
                </a>
                &nbsp; &nbsp; &nbsp;
                <a class="navbar-brand" href="{{ url('/') }}">
                    نظام ادارة المحتوى
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="/">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link" href="/home/articles">الوصفات</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">دخول</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
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
                                        تسجيل خروج
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
            @yield('content')
        </main>
    </div>
     @yield('js')
   
</body>
   <!-- <br> <br> <br> <br> <br> <br> <br> <br> <br>  -->
    
   

<footer class="footer-area" style="background-color:thistle;">

<div class="mini-footer">
<div class="row"> 
<div class="col-md-9">
<div class="copyright-text">
<p style="color:#563d7c;">
    <img src="/storage/images/wasfaa_resized.png">
</p>
  
    <div class="social social--color--filled" >
<ul>
<li>
<a href="/home/articles?q=&category_id=1"  style="color:#563d7c;">
 المأكولات البحرية
</a>
</li>
<li>
<a href="/home/articles?q=&category_id=2"  style="color:#563d7c;">
اللحوم
</a>
</li>
<li>
<a href="/home/articles?q=&category_id=3" style="color:#563d7c;">
المعجنات
</a>
</li>
<li>
<a href="/home/articles?q=&category_id=4"  style="color:#563d7c;">
الدجاج والطيور
</a>
</li>
    <li>
<a href="/home/articles?q=&category_id=5" style="color:#563d7c;">
مشروبات</a>
</li>
    <li>
<a href="/home/articles?q=&category_id=7"  style="color:#563d7c;">
سلطات</a>
</li>
    <li>
<a href="/home/articles?q=&category_id=6"  style="color:#563d7c;">
حلويات</a>
</li>

    
</ul>
</div>
    
    
</div>
</div>
    
<!-- start .social -->
<div class="col-md-3 social-col" style="color:#563d7c;">
<p style="color:#563d7c;">
    <!-- <img src="/storage/images/wasfaa_resized.png"> -->
</p>
</div>
</div>
</div>
    
    
    <div class="mini-footer">
<div class="row"> 
<div class="col-md-5">
<div class="copyright-text">
<p style="color:#563d7c;">
</p>
  
    <div class="social social--color--filled" >

</div>
    
    
</div>
</div>
    
<!-- start .social -->
<div class="col-md-5 social-col" style="color:#563d7c;">
<p style="color:#563d7c;">
    <!-- <img src="/storage/images/wasfaa_resized.png"> -->
 {{date("Y")}}  كافة الحقوق محفوظة ل wasfa &copy; 
</p>
</div>
</div>
</div>
    
    
</footer>
       
        
    
</html>
