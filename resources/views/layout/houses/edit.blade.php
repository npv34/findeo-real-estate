@extends('master')
@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="submit-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><i class="fa fa-plus-circle"></i> Edit House</h2>
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
                    <form action="{{ route('house.update', $house->id) }}" method="post">
                        @csrf

                        <h3>Basic Information</h3>
                        <div class="submit-section">

                            <!-- Title -->
                            <div class="form">
                                <h5>House Title <i class="tip"
                                                   data-tip-content="Type title that will also contains an unique feature of your property (e.g. renovated, air contidioned)"></i>
                                </h5>
                                <input name="title" class="search-field" type="text" value="{{ $house->title }}"/>
                                <p class="danger" id="error-title"></p>
                            </div>

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Status -->
                                <div class="col-md-6">
                                    <h5>Status<i class="tip"></i></h5>
                                    <select class="chosen-select-no-single" name="status">
                                        <option value="1" {{ ($house->status == 1) ? 'selected':'' }}>For Sale</option>
                                        <option value="2" {{ ($house->status == 2) ? 'selected':'' }}>For Rent</option>
                                    </select>
                                </div>

                                <!-- Type -->
                                <div class="col-md-6">
                                    <h5>Type<i class="tip"></i></h5>
                                    <select class="chosen-select-no-single" name="type">
                                        <option value="1" {{ ($house->type == 1) ? 'selected':'' }}>Apartment</option>
                                        <option value="2" {{ ($house->type == 2) ? 'selected':'' }}>House</option>
                                        <option value="3" {{ ($house->type == 3) ? 'selected':'' }}>Commercial</option>
                                        <option value="4" {{ ($house->type == 4) ? 'selected':'' }}>Garage</option>
                                        <option value="5" {{ ($house->type == 5) ? 'selected':'' }}>Lot</option>
                                    </select>
                                </div>

                            </div>
                            <!-- Row / End -->
                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Price -->
                                <div class="col-md-4">
                                    <h5>Price <i class="tip"
                                                 data-tip-content="Type overall or monthly price if property is for rent"></i>
                                    </h5>
                                    <div class="select-input disabled-first-option">
                                        <input type="number" data-unit="USD" name="price" value="{{ $house->price }}">
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
                                        <option value="1" {{ ($house->rooms == 1) ? 'selected':'' }}>1</option>
                                        <option value="2" {{ ($house->rooms == 2) ? 'selected':'' }}>2</option>
                                        <option value="3" @if($house->rooms == 3)  selected @endif }}>3</option>
                                        <option value="4" {{ ($house->rooms == 4) ? 'selected':'' }}>4</option>
                                        <option value="5" {{ ($house->rooms == 5) ? 'selected':'' }}>5</option>
                                        <option value="6" {{ ($house->rooms == 6) ? 'selected':'' }}>More than 5</option>
                                    </select>
                                </div>

                            </div>
                            <!-- Row / End -->
                        </div>

                        <h3>Location</h3>
                        <div class="submit-section">

                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Address -->
                                <div class="col-md-6">
                                    <h5>Address<i class="tip"></i></h5>
                                    <input type="text" name="address" value="{{ $house->address }}">
                                    <p class="danger" id="error-address"></p>
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <h5>City<i class="tip"></i></h5>
                                    <input type="text" name="city" value="{{ $house->city }}">
                                    <p class="danger" id="error-city"></p>

                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <h5>State<i class="tip"></i></h5>
                                    <input type="text" name="state" value="{{ $house->state }}">
                                    <p class="danger" id="error-state"></p>

                                </div>

                                <!-- Zip-Code -->
                                <div class="col-md-6">
                                    <h5>Zip-Code</h5>
                                    <input type="text" name="zip_code" value="{{ $house->zip_code }}">
                                    <input type="text" style="display: none" name="user_id"
                                           value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                                </div>
                            </div>
                            <!-- Row / End -->
                        </div>

                        <h3>Detailed Information</h3>
                        <div class="submit-section">
                            <!-- Description -->
                            <div class="form">
                                <h5>Description</h5>
                                <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="summary"
                                          spellcheck="true">{{ $house->description }}</textarea>
                            </div>
                        </div>

                        <div class="divider"></div>
                        <button type="submit" class="button preview margin-top-5">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

