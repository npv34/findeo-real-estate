@extends('master')
@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-plus-circle"></i> Add House</h2>
            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <div class="row">
        <!-- Submit Page -->
        <div class="col-md-12">
            <div class="submit-page">

                <!-- Section -->
                <h3>Basic Information</h3>
                <div class="submit-section">

                    <!-- Title -->
                    <div class="form">
                        <h5>Property Title <i class="tip" data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i></h5>
                        <input name="title" class="search-field" type="text" value=""/>
                        <p class="danger" id="error-title"></p>
                    </div>

                    <!-- Row -->
                    <div class="row with-forms">

                        <!-- Status -->
                        <div class="col-md-6">
                            <h5>Status<i class="tip"></i></h5>
                            <select class="chosen-select-no-single" name="status">
                                <option value="1">For Sale</option>
                                <option value="2">For Rent</option>
                            </select>
                        </div>

                        <!-- Type -->
                        <div class="col-md-6">
                            <h5>Type<i class="tip"></i></h5>
                            <select class="chosen-select-no-single" name="type">
                                <option value="1">Apartment</option>
                                <option value="2">House</option>
                                <option value="3">Commercial</option>
                                <option value="4">Garage</option>
                                <option value="5">Lot</option>
                            </select>
                        </div>

                    </div>
                    <!-- Row / End -->


                    <!-- Row -->
                    <div class="row with-forms">

                        <!-- Price -->
                        <div class="col-md-4">
                            <h5>Price <i class="tip" data-tip-content="Type overall or monthly price if property is for rent"></i></h5>
                            <div class="select-input disabled-first-option">
                                <input type="text" data-unit="USD" name="price">
                                <p class="danger" id="error-price"></p>
                            </div>
                        </div>

                        <!-- Area -->
                        <div class="col-md-4">
                            <h5>Area</h5>
                            <div class="select-input disabled-first-option">
                                <input type="text" data-unit="Sq Ft" name="area">
                            </div>
                        </div>

                        <!-- Rooms -->
                        <div class="col-md-4">
                            <h5>Rooms</h5>
                            <select class="chosen-select-no-single" name="rooms">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">More than 5</option>
                            </select>
                        </div>

                    </div>
                    <!-- Row / End -->

                </div>
                <!-- Section / End -->


                <!-- Section -->

                <!-- Section / End -->


                <!-- Section -->
                <h3>Location</h3>
                <div class="submit-section">

                    <!-- Row -->
                    <div class="row with-forms">

                        <!-- Address -->
                        <div class="col-md-6">
                            <h5>Address<i class="tip"></i></h5>
                            <input type="text" name="address" >
                            <p class="danger" id="error-address"></p>
                        </div>

                        <!-- City -->
                        <div class="col-md-6">
                            <h5>City<i class="tip"></i></h5>
                            <input type="text" name="city" >
                            <p class="danger" id="error-city"></p>

                        </div>

                        <!-- City -->
                        <div class="col-md-6">
                            <h5>State<i class="tip"></i></h5>
                            <input type="text" name="state" >
                            <p class="danger" id="error-state"></p>

                        </div>

                        <!-- Zip-Code -->
                        <div class="col-md-6">
                            <h5>Zip-Code</h5>
                            <input type="text" name="zip_code">
                            <input type="text" style="display: none" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        </div>
                    </div>
                    <!-- Row / End -->
                </div>
                <!-- Section / End -->
                <!-- Section -->
                <h3>Detailed Information</h3>
                <div class="submit-section">
                    <!-- Description -->
                    <div class="form">
                        <h5>Description</h5>
                        <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
                    </div>
                </div>
                <!-- Section / End -->

                <div class="divider"></div>
                <a id="submit-house" class="button preview margin-top-5">Submit<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
</div>
@endsection

