@extends('master')

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Log In & Register</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Log In & Register</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Contact
    ================================================== -->

    <!-- Container -->
    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                @if($errors->all() || \Illuminate\Support\Facades\Session::has('login-error'))
                    <div class="notification error large margin-bottom-55">
                        <h4>Error!</h4>

                        @if(\Illuminate\Support\Facades\Session::has('login-error'))
                            <p>{{ \Illuminate\Support\Facades\Session::get('login-error') }}</p>

                        @else
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                @endif


                <div id="message-register"></div>
                <button class="button social-login via-gplus"><i class="fa fa-google-plus"></i> Log In With Google Plus
                </button>
                <!--Tab -->
                <div class="my-account style-1 margin-top-5 margin-bottom-40">

                    <ul class="tabs-nav">
                        <li class=""><a href="#tab1">Log In</a></li>
                        <li><a href="#tab2">Register</a></li>
                    </ul>

                    <div class="tabs-container alt">

                        <!-- Login -->
                        <div class="tab-content" id="tab1" style="display: none;">
                            <form method="post" class="login" action="{{ route('auth.login') }}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="username">Username:
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="username" id="username" value=""
                                               required/>
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password" id="password"
                                               required/>
                                    </label>
                                </p>

                                <p class="form-row">
                                    <input type="submit" class="button border margin-top-10" name="login"
                                           value="Login"/>

                                    <label for="rememberme" class="rememberme">
                                        <input name="rememberme" type="checkbox" id="rememberme" value="forever"/>
                                        Remember Me</label>
                                </p>

                                <p class="lost_password">
                                    <a href="#">Lost Your Password?</a>
                                </p>

                            </form>
                        </div>

                        <!-- Register -->
                        <div class="tab-content" id="tab2" style="display: none;">

                            <form method="post" name="register" class="register" action="{{ route('auth.register') }}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="username2">Username:
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="username" id="username2" value=""/>
                                <p id="error-username" class="danger"></p>
                                </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="email2">Email Address:
                                        <i class="im im-icon-Mail"></i>
                                        <input type="text" class="input-text" name="email" id="email2" value=""/>
                                <p id="error-email" class="danger"></p>
                                </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password1">Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password1" id="password1"
                                        />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password2">Repeat Password:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password1_confirmation"
                                               id="password2"/>
                                    </label>
                                </p>

                                <p class="form-row">
                                    <input type="button" class="button border fw margin-top-10" id="register"
                                           name="register"
                                           value="Register"/>
                                </p>

                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
    <!-- Container / End -->
@endsection
