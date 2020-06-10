<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/custom.css" rel="stylesheet">


    @yield('after_styles')

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
          <h3 class="text-muted">
              <svg width="224" height="34" viewBox="0 0 224 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <image class="center-img" width="224" height="34" xlink:href="data:image/png;base64,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"/></svg>


      </h3>
        <nav>
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active-link" href="/" style="color:#000">Home  <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#000">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color:#000">Contact</a>
            </li>
          </ul>
        </nav>
      </div>



      @yield('content')

      <footer class="footer text-center">
        <p>© Payuu 2020</p>
      </footer>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    @yield('after_scripts')
</body></html>
