@extends('master')
@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>My Houses</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{ route('page.home') }}">Home</a></li>
                            <li>My Houses</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row">


            <!-- Widget -->
            <div class="col-md-4">
                <div class="sidebar left">

                    <div class="my-account-nav-container">

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Account</li>
                            <li><a href="my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li>
                            <li><a href="my-bookmarks.html"><i class="sl sl-icon-star"></i> Bookmarked Listings</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li class="sub-nav-title">Manage Listings</li>
                            <li><a href="my-properties.html" class="current"><i class="sl sl-icon-docs"></i> My Properties</a></li>
                            <li><a href="submit-property.html"><i class="sl sl-icon-action-redo"></i> Submit New Property</a></li>
                        </ul>

                        <ul class="my-account-nav">
                            <li><a href="change-password.html"><i class="sl sl-icon-lock"></i> Change Password</a></li>
                            <li><a href="#"><i class="sl sl-icon-power"></i> Log Out</a></li>
                        </ul>

                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <table class="manage-table responsive-table">

                    <tr>
                        <th><i class="fa fa-file-text"></i> Property</th>
                        <th class="expire-date"><i class="fa fa-calendar"></i> Expiration Date</th>
                        <th></th>
                    </tr>

                    <!-- Item #1 -->
                    @forelse($houses as $house)
                    <tr>
                        <td class="title-container">

                            @if($house->isImage())
                            <img src="{{ asset($house->firstImage()->url) }}" alt="">
                            @else

                                <img src="{{ asset('images/listing-05.jpg') }}" alt="">

                            @endif
                            <div class="title">
                                <h4><a href="#">{{ $house->title }}</a></h4>
                                <span>{{ $house->getAddress() }}</span>
                                <span class="table-property-price">{{ number_format($house->price) }}</span>
                            </div>
                        </td>
                        <td class="expire-date">December 30, 2021</td>
                        <td class="action">
                            <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#"><i class="fa  fa-eye-slash"></i> Hide</a>
                            <a href="{{ route('house.delete', $house->id) }}" onclick="return confirm('You are sure?')" class="delete"><i class="fa fa-remove"></i> Delete</a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">No data</td>
                        </tr>
                    @endforelse

                </table>
                <a href="submit-property.html" class="margin-top-40 button">Submit New Property</a>
            </div>

        </div>
    </div>

@endsection