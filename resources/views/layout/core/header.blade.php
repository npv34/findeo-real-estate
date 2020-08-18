<header id="header-container">

    <!-- Topbar -->
    <div id="top-bar">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Top bar -->
                <ul class="top-bar-menu">
                    <li><i class="fa fa-phone"></i> (123) 123-456 </li>
                    <li><i class="fa fa-envelope"></i> <a href="#">office@example.com</a></li>
                </ul>

            </div>
            <!-- Left Side Content / End -->


            <!-- Left Side Content -->
            <div class="right-side">

                <!-- Social Icons -->
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                    <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                    <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
                </ul>

            </div>
            <!-- Left Side Content / End -->

        </div>
    </div>
    <div class="clearfix"></div>
    <!-- Topbar / End -->


    <!-- Header -->
    <div id="header">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo -->
                <div id="logo">
                    <a href="{{ route('page.home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                </div>


                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                    </button>
                </div>


                <!-- Main Navigation -->
                <nav id="navigation" class="style-1">
                    <ul id="responsive">
                        <li><a class="{{ (request()->routeIs('page.home')) ? 'current' : '' }} " href="{{ route('page.home') }}">Home</a>
                        </li>
                        <li><a class="{{ (request()->routeIs('house.index')) ? 'current' : '' }}" href="{{ route('house.index') }}">Houses</a>
                        </li>
                        <li><a href="#">Blog</a>
                        </li>
                        <li><a class="{{ (request()->routeIs('home.contact')) ? 'current' : '' }}" href="{{ route('home.contact') }}">Contact</a>
                        </li>

                    </ul>
                </nav>
                <div class="clearfix"></div>
                <!-- Main Navigation / End -->

            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            <div class="right-side">
                <!-- Header Widget -->
                <div class="header-widget">

                    @if(\Illuminate\Support\Facades\Auth::check())
                        <!-- User Menu -->
                            <div class="user-menu">
                                <div class="user-name"><span><img src="{{ asset('images/agent-03.jpg') }}" alt=""></span>Hi, {{ \Illuminate\Support\Facades\Auth::user()->username }}!</div>
                                <ul>
                                    <li><a href="{{ route('user.getMyProfile') }}"><i class="sl sl-icon-user"></i> My Profile</a></li>
                                    <li><a href="{{ route('user.getMyHouse') }}"><i class="sl sl-icon-docs"></i> My House</a></li>
                                    <li><a href="{{ route('auth.logout') }}"><i class="sl sl-icon-power"></i> Log Out</a></li>
                                </ul>
                            </div>
                    @else
                        <a href="{{ route('auth.showFormLogin') }}" class="sign-in"><i class="fa fa-user"></i> Log In / Register</a>
                    @endif

                    <a href="{{ route('house.create') }}" class="button border">Submit House</a>
                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->

        </div>
    </div>
    <!-- Header / End -->

</header>
