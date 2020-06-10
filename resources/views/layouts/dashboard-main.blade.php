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

@include("partials.dashboard-header")
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
                            Copyright &copy; Payuu Services <script data-cfasync="false" src="twitter.com/stevensunflash"></script><script type="20e9db70764428ba911c7d5d-text/javascript">document.write(new Date().getFullYear());</script>
                            All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://twitter.com/stevensunflash" target="_blank">Victor Steven</a>
                            {{--<h6> <small>I love you my sugar hunny. Now and always I share this world space with you. Thanks for being there for me.</small></h6>--}}
                        </p>
                    </div>
                </div>
                {{-- <div class="col-12 col-md-6">
                    <div class="payments-methods d-flex align-items-center">
                        <p>Payments We Accept</p>
                        <i class="fa fa-cc-visa" aria-hidden="true"></i>
                        <i class="fa fa-cc-mastercard" aria-hidden="true"></i>
                        <i class="fa fa-cc-discover" aria-hidden="true"></i>
                        <i class="fa fa-cc-amex" aria-hidden="true"></i>
                        <i class="fa fa-cc-paypal" aria-hidden="true"></i>
                        <i class="fa fa-cc-stripe" aria-hidden="true"></i>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="/skulpay/js/jquery.min.js" type="20e9db70764428ba911c7d5d-text/javascript"></script>--}}

{{--<script src="/skulpay/js/popper.min.js" type="20e9db70764428ba911c7d5d-text/javascript"></script>--}}

{{--<script src="/skulpay/js/bootstrap.min.js" type="20e9db70764428ba911c7d5d-text/javascript"></script>--}}

<script src="/skulpay/js/hami.bundle.js" type="20e9db70764428ba911c7d5d-text/javascript"></script>

<script src="/skulpay/js/default-assets/active.js" type="20e9db70764428ba911c7d5d-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="20e9db70764428ba911c7d5d-text/javascript"></script>
<script type="20e9db70764428ba911c7d5d-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/a2bd7673/cloudflare-static/rocket-loader.min.js" data-cf-settings="20e9db70764428ba911c7d5d-|49" defer=""></script></body>
@include('sweetalert::alert')
<script type="text/javascript">
    var appX = "{{ config('app.url') }}";
</script>
@stack('after_scripts')
</html>
