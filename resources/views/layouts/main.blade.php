<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Payuu</title>

    <link rel="stylesheet" href="/skulpay/style.css">

    @stack('after_styles')
</head>
<body>
@include("partials.header")
<div id="app">
    @yield("content")
</div>

<footer class="footer-area section-padding-80-0">
    <div class="bottom-footer-area bg-gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="copywrite-text">
                        <p>
                            Copyright &copy; Payuu <script type="text/javascript">document.write(new Date().getFullYear());</script>
                            All rights reserved 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div></footer>

<script src="{{ asset('js/app.js') }}"></script>

<script src="/skulpay/js/hami.bundle.js" type="20e9db70764428ba911c7d5d-text/javascript"></script>

<script src="/skulpay/js/default-assets/active.js" type="20e9db70764428ba911c7d5d-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="20e9db70764428ba911c7d5d-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="20e9db70764428ba911c7d5d-|49" defer=""></script></body>
@include('sweetalert::alert')
</html>
