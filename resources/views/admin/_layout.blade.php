<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head id="header">
        <meta charset="utf-8" />
        <title>@yield("title") - لوحة التحكم</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #1 for blank page layout" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link rel="stylesheet" type="text/css" href="style.css">

        
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        
       <link href="/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
         <link href="/metronic/assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        
       <link href="/metronic/assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" /> 
        
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/metronic/assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="/metronic/assets/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/metronic/assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="/nprogress-master/nprogress.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style type="text/css"> 
           #title { font-family:Arial; color:blueviolet; } 
     </style>   
        @yield("css")
    </head>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    
                    <div class="page-logo">
                        <a href="/admin/home" >
                            <img src="/metronic/assets/layouts/layout/img/wassfa_resized.png" alt="" class="" style=" position:relative; right:auto; left:auto; "  /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                 
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> 
                                    {{ Auth::user()->name }}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="/admin/home/changepassword">
                                            <i class="icon-user"></i> تغيير كلمة المرور </a>
                                    </li>
                                    
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-lock"></i>
                                        تسجيل خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                </ul>
                            </li>
                           
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">
                    
                    <div class="page-sidebar navbar-collapse collapse">
                        
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <?php                            
                                $topLinks=\DB::table("link")->where("parent_id",0)->get();
                            ?>
                            @foreach($topLinks as $topLink)
                            <?php                            
                                $subLinks=\DB::table("link")->where("parent_id",$topLink->id)->get();
                            ?>
                            @if($admin->links->where("id",$topLink->id)->count()>0)
                            <li class="nav-item start ">
                                <a href="{{$topLink->url}}" class="nav-link nav-toggle">
                                    <i class="{{$topLink->icon}}"></i>
                                    <span class="title">{{$topLink->title}}</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    @foreach($subLinks as $subLink)
                                    @if($admin->links->where("id",$subLink->id)->count()>0)
                                    <li class="nav-item start ">
                                        <a href="{{$subLink->url}}" class="nav-link ">
                                            <i class="{{$subLink->icon}}"></i>
                                            <span class="title">{{$subLink->title}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            
                        </ul>
                        
                    </div>
                    
                </div>
                
                <div class="page-content-wrapper">                    
                    <div class="page-content">                        
                        <h1 class="page-title"  style="color:blueviolet;font-weight: bold;"> @yield("title")
                            <small style="color:blueviolet; ">@yield("subtitle")</small>
                        </h1>
                        @include("_msg")
                        @yield("content")
                    </div>                    
                </div>
            </div>
            <div class="page-footer">
                <div class="page-footer-inner"> {{date("Y")}} &copy; جميع الحقوق محفوظة
                    ل NOOR S. ABO HASIRA ^_*
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تأكيد</h4>
              </div>
              <div class="modal-body">
                هل انت متأكد من الاستمرار في العملية؟
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء الامر</button>
                <a class="btn btn-danger">نعم, متأكد</a>
              </div>
            </div>
          </div>
        </div>
        <script src="/metronic/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="/metronic/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>  
        <script src="/nprogress-master/nprogress.js"></script>
        
        
         <!-- view modal -->   
        <script>
            $(function(){
                //$("#Confirm").modal("show");
                $(".Confirm").click(function(e){
                    $("#Confirm").modal("show");
                    $("#Confirm .btn-danger").attr("href",$(this).attr("href"));
                    return false;
                    //e.preventDefault();
                });
                
                // view NProgress 
                $(document).ajaxStart(function() {
                    NProgress.start()
                });
                $(document).ajaxStop(function() {
                    NProgress.done() 
                });	
                $(document).ajaxError(function() {
                    NProgress.done() 
                });
            });
        </script>
        @yield("js")
    </body>

</html>