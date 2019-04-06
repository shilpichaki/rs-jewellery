<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>RPS-Jewellery</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('image/RPSl.png')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Romanesco" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>

<body class="fix-menu">
<!-- Pre-loader start -->
@include('includes.preloader')
<!-- Pre-loader end -->

<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->

                <form class="md-float-material form-material" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <img src="{{asset('image/RPSJewellery.png')}}" alt="logo.png">
                        {{--<img src="../files/assets/images/logo.png" alt="logo.png">--}}
                        {{--<h4 class="text-white" style="font-family: 'Romanesco', cursive;        background: linear-gradient(to right, #f2ec32 0%, #f3c958 100%);--}}
    {{---webkit-background-clip: text;--}}
    {{---webkit-text-fill-color: transparent;--}}
    {{--font-size: 5vw;"><b>RPS-JEWELLERY</b></h4>--}}
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Log In</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
		<strong>{{ $errors->first('email') }}</strong>
	</span>
                                @endif
                                <span class="form-bar"></span>
                            </div>
                            <div class="form-group form-primary">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
		<strong>{{ $errors->first('password') }}</strong>
	</span>
                                @endif
                                <span class="form-bar"></span>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/modernizr.js')}}"></script>
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/css-scrollbars.js')}}"></script>
<!-- i18next.min.js -->
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/i18next.min.js')}}"></script>
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/i18nextXHRBackend.min.js')}}"></script>
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/jquery-i18next.min.js')}}"></script>
<script type="4e9ebb8e719cfe7b396a270f-text/javascript" src="{{asset('js/common-pages.js')}}"></script>
<script src="{{asset('js/rocket-loader.min.js')}}" data-cf-settings="4e9ebb8e719cfe7b396a270f-|49" defer=""></script>

</body>
</html>
