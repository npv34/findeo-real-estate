@extends('master')
@section('content')
    <section class="search margin-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Title -->
                    <h3 class="search-title">Search</h3>

                    <!-- Form -->
                    <div class="main-search-box no-shadow">


                        <!-- Row With Forms -->
                        <div class="row with-forms">

                            <!-- Status -->
                            <div class="col-md-3">
                                <select name="tab" data-placeholder="Any Status" class="chosen-select-no-single" >
                                    <option value="0">Any Status</option>
                                    <option value="1" {{ (request()->tab == 1) ? 'selected' : '' }}>For Sale</option>
                                    <option value="2" {{ (request()->tab == 2) ? 'selected' : '' }}>For Rent</option>
                                </select>
                            </div>

                            <!-- Property Type -->
                            <div class="col-md-3">
                                <select data-placeholder="Any Type" name="type" class="chosen-select-no-single" >
                                    <option value="1" {{ (request()->type == 1) ? 'selected' : '' }}>Apartment</option>
                                    <option value="2" {{ (request()->type == 2) ? 'selected' : '' }}>House</option>
                                    <option value="3" {{ (request()->type == 3) ? 'selected' : '' }}>Commercial</option>
                                    <option value="4" {{ (request()->type == 4) ? 'selected' : '' }}>Garage</option>
                                    <option value="5" {{ (request()->type == 5) ? 'selected' : '' }}>Lot</option>
                                </select>
                            </div>

                            <!-- Main Search Input -->
                            <div class="col-md-6">
                                <div class="main-search-input">
                                    <input type="text" name="keyword" placeholder="Enter address e.g. street, city or state" value="{{ request()->get('keyword') }}"/>
                                    <button type="submit" class="button">Search</button>
                                </div>
                            </div>

                        </div>
                        <!-- Row With Forms / End -->
                    </div>
                    <!-- Box / End -->
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row fullwidth-layout">

            <div class="col-md-12">

                <!-- Sorting / Layout Switcher -->
                <div class="row margin-bottom-15">

                    <div class="col-md-6">
                        <!-- Sort by -->
                        <div class="sort-by">
                            <label>Sort by:</label>

                            <div class="sort-by-select">
                                <select data-placeholder="Default order" class="chosen-select-no-single" >
                                    <option>Default Order</option>
                                    <option>Price Low to High</option>
                                    <option>Price High to Low</option>
                                    <option>Newest Properties</option>
                                    <option>Oldest Properties</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Layout Switcher -->
                        <div class="layout-switcher">
                            <a href="#" class="list"><i class="fa fa-th-list"></i></a>
                            <a href="#" class="grid"><i class="fa fa-th-large"></i></a>
                            <a href="#" class="grid-three"><i class="fa fa-th"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Listings -->
                <div class="listings-container list-layout">
                    @forelse($houses as $house)
                    <div class="listing-item">

                        <a href="" class="listing-img-container">

                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                                <span>{{ $house->getStatus() }}</span>
                            </div>

                            <div class="listing-img-content">
                                <span class="listing-price">VND {{ number_format($house->price) }}
                                    @if($house->area)
                                        <i>{{ number_format($house->area) }} / sq ft</i>
                                    @endif
                                </span>
                                <span class="like-icon with-tip" data-tip-content="Add to Bookmarks"></span>
                                <span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
                            </div>

                            <div class="listing-carousel">
                                @if($house->images->count() > 0)
                                    @foreach($house->images->take(3) as $image)
                                        <div><img src="{{ asset($image->url) }}" height="285" alt=""></div>
                                    @endforeach
                                @else
                                    <div><img src="{{ asset('images/listing-01.jpg') }}" alt=""></div>
                                    <div><img src="{{ asset('images/listing-01.jpg') }}" alt=""></div>
                                    <div><img src="{{ asset('images/listing-01.jpg') }}" alt=""></div>
                                @endif

                            </div>
                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a href="{{ route('house.detail', $house->id) }}">{{ $house->title }}</a></h4>
                                <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                    <i class="fa fa-map-marker"></i>
                                    {{ $house->getAddress() }}
                                </a>

                                <a href="{{ route('house.detail', $house->id) }}" class="details button border">Details</a>
                            </div>

                            <ul class="listing-details">
                                <li>{{ $house->rooms }} Bedroom</li>
                            </ul>

                            <div class="listing-footer">
                                <a href="#"><i class="fa fa-user"></i> {{ $house->user->username }}</a>
                                <span><i class="fa fa-calendar-o"></i> {{ $house->diffForHumans() }}</span>
                            </div>

                        </div>

                    </div>
                    @empty
                    @endforelse
                </div>
                <!-- Listings Container / End -->

                <div class="clearfix"></div>
            </div>

        </div>
    </div>
@endsection
