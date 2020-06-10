<header class="header-area">
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
                              @if(auth()->user()->role === "admin") 
                              <li class="{{ strpos(request()->url(), 'dashboard') !== false ? 'active' : '' }}">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                              </li>
                              @elseif(auth()->user()->role === "customer")
                              <li class="{{ strpos(request()->url(), 'customer-dashboard') !== false ? 'active' : '' }}">
                                <a href="{{ route('customerdashboard') }}">Dashboard</a>
                              </li>
                              @endif
                            </ul>
                            <div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                              <a href="{{ route('login') }}" class="btn hami-btn live--chat--btn"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="fa fa-lock" aria-hidden="true"></i> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
