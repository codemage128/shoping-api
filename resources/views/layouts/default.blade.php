<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <title>
        @section('title')
            | Shop
        @show
    </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lib.css') }}">
@yield('header_styles')
</head>
<body>
<header>
    @php
    $url = env('API_SERVER_URL'). "api/aboutus";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, "");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $data = json_decode($result)->data;
    $instagram = $data->instagram;
    $skype = $data->skype;
    $about_us = $data->about_us;
    $phone = $data->phone;
    $fax = $data->fax;
    $email = $data->email;
    @endphp
    <div class="icon-section skin-blue">
        <div class="container">
            <ul class="list-inline">
                <li>
                    <a href="{!! $instagram !!}"> <i class="livicon" data-name="instagram" data-size="18" data-loop="true" data-c="#fff"
                                    data-hc="#757b87"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- //Icon Section End -->
    <!-- Nav bar Start -->
    <nav class="navbar navbar-default container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span><a href="#"><i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true"
                                                    data-c="#757b87" data-hc="#ccc"></i>
                    </a></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/emaillogo.PNG') }}" style="width: 150px; height: 50px" alt="logo" class="logo_position">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav navbar-right">
                <li {!! (Request::is('/home') ? 'class="active"' : '') !!}><a href="{{ route('home') }}"> Home</a>
                </li>
                <li class="dropdown {!! (Request::is('/products')) ? 'class="active"' : ''!!}">
                    <a href="{{ URL::to('products') }}">Products</a>
                </li>
                <li class="{!! (Request::is('/news')) ? 'class="active"' : ''!!}">
                    <a href="{{ URL::to('news') }}">News</a>
                </li>
            </ul>
        </div>

    </nav>
</header>
@yield('top')
<!-- Content -->
@yield('content')
<!-- Footer Section Start -->
<footer>
    <div class="container footer-text">
        <!-- About Us Section Start -->
        <div class="col-sm-6">
            <h4>About Us</h4>
            <p>
                {!! $about_us !!}
            </p>
            <hr id="hr_border2">
            <h4 class="menu">Follow Us</h4>
            <ul class="list-inline">
                <li>
                    <a href="{!! $instagram !!}"> <i class="livicon" data-name="instagram" data-size="18" data-loop="true" data-c="#ccc"
                                    data-hc="#ccc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-6">
            <h4>Contact Us</h4>
            <ul class="list-unstyled">
                <li style="margin-bottom: 10px">
                    <i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc"
                       data-hc="#ccc"></i>WICKR:{!! $phone !!}
                </li>
                <li style="margin-bottom: 10px">
                    <i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc"
                       data-hc="#ccc"></i> THREEMA:{!! $fax !!}
                </li>
                <li style="margin-bottom: 10px">
                    <i class="livicon icon3" data-name="mail-alt" data-size="20" data-loop="true" data-c="#ccc"
                       data-hc="#ccc"></i> Email:<span class="text-success" style="cursor: pointer;">
                        {!! $email !!}</span>
                </li>
                <li style="margin-bottom: 10px">
                    <i class="livicon icon4 icon3" data-name="telegram" data-size="18" data-loop="true" data-c="#ccc"
                       data-hc="#ccc"></i> TELEGRAM:
                    <span class="text-success" style="cursor: pointer;">{!! $skype !!}</span>
                </li>
            </ul>
            <hr id="hr_border">
        </div>
    </div>
</footer>
<!-- //Footer Section End -->
<div class="copyright">
    <div class="container">
        <p>Copyright &copy; Shop Procuts, 2019</p>
    </div>
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top"
   data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/frontend/lib.js') }}"></script>
<!--global js end-->
<!-- begin page level js -->
@yield('footer_scripts')
<!-- end page level js -->
</body>

</html>
