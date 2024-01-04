<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="description" content="Admin.">
    <link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="{{asset('backend/css/ie.css')}}" rel="stylesheet">
    <link id="ie9style" href="{{asset('backend/css/ie9.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('backend/img/favicon.ico')}}">
    <style type="text/css">
        body { background: url({{asset('backend/img/bg-login.jpg')}}) !important; }
    </style>
</head>

<body>
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index.html"><i class="halflings-icon home"></i></a>
                    <a href="#"><i class="halflings-icon cog"></i></a>
                </div>
                <h2>Login to your account</h2>
                <form class="form-horizontal" action="{{route('admin.login.submit')}}" method="post">
                    @csrf
                        <div class="input-prepend" title="Email">
                            <span class="add-on"><i class="halflings-icon user"></i></span>
                            <input class="input-large span10" name="email" id="email" type="text" placeholder="Type Email"/>
                        </div>
                        <div class="clearfix"></div>

                        <div class="input-prepend" title="Password">
                            <span class="add-on"><i class="halflings-icon lock"></i></span>
                            <input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
                        </div>
                        <div class="clearfix"></div>

                        <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

                        <div class="button-login">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="clearfix"></div>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
<script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.ui.touch-punch.js')}}"></script>
<script src="{{asset('backend/js/modernizr.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.cookie.js')}}"></script>
<script src="{{asset('backend/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/excanvas.js')}}"></script>
<script src="{{asset('backend/js/jquery.flot.js')}}"></script>
<script src="{{asset('backend/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('backend/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('backend/js/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.chosen.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.cleditor.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.noty.js')}}"></script>
<script src="{{asset('backend/js/jquery.elfinder.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.raty.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.iphone.toggle.js')}}"></script>
<script src="{{asset('backend/js/jquery.uploadify-3.1.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.gritter.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.imagesloaded.js')}}"></script>
<script src="{{asset('backend/js/jquery.masonry.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.knob.modified.js')}}"></script>
<script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('backend/js/counter.js')}}"></script>
<script src="{{asset('backend/js/retina.js')}}"></script>
<script src="{{asset('backend/js/custom.js')}}"></script>

</body>
</html>
