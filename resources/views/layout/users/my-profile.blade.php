@extends('master')
@section('content')

    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>My Profile</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>My Profile</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Widget -->
            <div class="col-md-4">
                <div class="sidebar left">
                    <div class="my-account-nav-container">
                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Account</li>
                            <li><a href="{{ route('user.getMyProfile') }}" class="current"><i class="sl sl-icon-user"></i> My Profile</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Listings</li>
                            <li><a href="{{ route('user.getMyHouse') }}"><i class="sl sl-icon-docs"></i> My House</a></li>
                            <li><a href="{{ route('house.create') }}"><i class="sl sl-icon-action-redo"></i> Submit New House</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li><a href="#"><i class="sl sl-icon-lock"></i> Change Password</a></li>
                            <li><a href="{{ route('auth.logout') }}"><i class="sl sl-icon-power"></i> Log Out</a></li>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="row">

                    <form method="post" action="{{ route('user.updateProfile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8 my-profile">
                            <h4 class="margin-top-0 margin-bottom-30">My Account</h4>
                            <label>Your Name</label>
                            <input value="{{ $userLogin->username }}" disabled type="text">
                            <label>Phone</label>
                            <input class="{{ ($errors->has('phone')) ? 'border-color' : '' }}" name="phone" value="{{ ($userLogin->phone) ? $userLogin->phone : '' }}" type="text">
                            @if($errors->has('phone'))
                                <p class="danger">{{ $errors->first('phone') }}</p>
                            @endif
                            <label>Email</label>
                            <input class="{{ ($errors->has('email')) ? 'border-color' : '' }}" name="email" value="{{ $userLogin->email }}" type="email">
                            @if($errors->has('email'))
                                <p class="danger">{{ $errors->first('email') }}</p>
                            @endif
                            <h4 class="margin-top-50 margin-bottom-0">Social</h4>
                            <label><i class="fa fa-facebook-square"></i> Facebook</label>
                            <input class="{{ ($errors->has('facebook')) ? 'border-color' : '' }}" name="facebook" value="{{ ($userLogin->facebook) ? $userLogin->facebook : '' }}" type="text">
                            @if($errors->has('facebook'))
                                <p class="danger">{{ $errors->first('facebook') }}</p>
                            @endif
                            <button type="submit" class="button margin-top-20 margin-bottom-20">Save Changes</button>
                        </div>
                        <div class="col-md-4">
                            <!-- Avatar -->
                            <div class="edit-profile-photo">
                                <img src="{{ asset('images/agent-02.jpg')  }}" alt="">
                                <div class="change-photo-btn">
                                    <div class="photoUpload">
                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                        <input name="avatar" type="file" class="upload" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
