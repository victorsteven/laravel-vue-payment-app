<header class="header-area">
    </div>
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <nav class="classy-navbar justify-content-between" id="hamiNav">
                    <a class="nav-brand" href="/">
                        <h2 style="color: white;">Payuu</h2>
                    </a>

                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <div class="classynav">
                            <ul id="nav">
                                <li>
                                    <a href="/">Home</a>
                                </li>
                            </ul>
                            @guest
                            <div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                <a href="{{ route('login') }}" class="btn hami-btn live--chat--btn"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
                            </div>
                            @elseif(auth()->user()->role === 'admin') 
                            <div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                <a href="{{ route('dashboard') }}" class="btn hami-btn live--chat--btn"> Dashboard</a>
                            </div>
                            @else
                            <div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                              <a href="{{ route('customerdashboard') }}" class="btn hami-btn live--chat--btn"> Dashboard</a>
                          </div>
                            @endguest
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
