@extends('master')
@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="property-titlebar margin-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a href="" class="back-to-listings"></a>
                    <div class="property-title">
                        <h2>{{ $house->title }} <span class="property-badge">{{ $house->getStatus() }}</span></h2>
                        <span>
						<a href="#location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							 {{ $house->getAddress() }}
						</a>
					</span>
                    </div>

                    <div class="property-pricing">
                        <div class="property-price">VND {{ number_format($house->price) }}</div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row margin-bottom-50">
            <div class="col-md-12">

                <!-- Slider Container -->
                <div class="property-slider-container">

                    <!-- Agent Widget -->
                    <div class="agent-widget">
                        <div class="agent-title">
                            <div class="agent-photo"><img src="{{ asset('images/agent-avatar.jpg') }}" alt="" /></div>
                            <div class="agent-details">
                                <h4><a href="#">{{ $house->user->username }}</a></h4>
                                <span><i class="sl sl-icon-call-in"></i>(123) 123-456</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <input type="text" placeholder="Your Email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$">
                        <input type="text" placeholder="Your Phone">
                        <textarea>I'm interested in this property [ID 123456] and I'd like to know more details.</textarea>
                        <button class="button fullwidth margin-top-5">Send Message</button>
                    </div>
                    <!-- Agent Widget / End -->

                    <!-- Slider -->
                    <div class="property-slider no-arrows">
                        @if($house->images->count() > 0)
                            @foreach($house->images->take(6) as $image)
                                <a href="{{ asset($image->url) }}" data-background-image="{{ asset($image->url) }}" class="item mfp-gallery"></a>
                            @endforeach
                        @else
                            <a href="{{ asset('images/single-property-01.jpg') }}" data-background-image="{{ asset('images/single-property-01.jpg')}}" class="item mfp-gallery"></a>
                            <a href="{{ asset('images/single-property-02.jpg') }}" data-background-image="{{ asset('images/single-property-02.jpg')}}" class="item mfp-gallery"></a>
                            <a href="{{ asset('images/single-property-03.jpg') }}" data-background-image="{{ asset('images/single-property-03.jpg')}}" class="item mfp-gallery"></a>
                            <a href="{{ asset('images/single-property-04.jpg') }}" data-background-image="{{ asset('images/single-property-04.jpg')}}" class="item mfp-gallery"></a>
                            <a href="{{ asset('images/single-property-05.jpg') }}" data-background-image="{{ asset('images/single-property-05.jpg')}}" class="item mfp-gallery"></a>
                            <a href="{{ asset('images/single-property-06.jpg') }}" data-background-image="{{ asset('images/single-property-06.jpg')}}" class="item mfp-gallery"></a>
                        @endif




                    </div>
                    <!-- Slider / End -->

                </div>
                <!-- Slider Container / End -->

                <!-- Slider Thumbs -->
                <div class="property-slider-nav">
                    @if($house->images->count() > 0)
                        @foreach($house->images->take(3) as $image)
                            <div><img src="{{ asset($image->url) }}" alt=""></div>
                        @endforeach
                    @else
                        <div><img src="{{ asset('images/listing-01.jpg') }}" alt=""></div>
                        <div><img src="{{ asset('images/listing-01.jpg') }}" alt=""></div>
                        <div><img src="{{ asset('images/listing-01.jpg') }}" alt=""></div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <!-- Property Description -->
            <div class="col-lg-8 col-md-7">
                <div class="property-description">

                    <!-- Main Features -->
                    <ul class="property-main-features">
                        <li>Rooms <span>{{ $house->rooms }}</span></li>
                    </ul>
                    <!-- Description -->
                    <h3 class="desc-headline">Description</h3>
                    <div class="show-more">
                        @if($house->description )
                        <p>
                            {{ $house->description }}
                        </p>
                        @endif
                        <a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
                    </div>

                    <!-- Floorplans -->
                    <h3 class="desc-headline no-border">Floorplans</h3>
                    <!-- Accordion -->
                    <div class="style-1 fp-accordion">
                        <div class="accordion">

                            <h3>First Floor <span>460 sq ft</span> <i class="fa fa-angle-down"></i> </h3>
                            <div>
                                <a class="floor-pic mfp-image" href="https://i.imgur.com/kChy7IU.jpg">
                                    <img src="https://i.imgur.com/kChy7IU.jpg" alt="">
                                </a>
                                <p>Mauris mauris ante, blandit et, ultrices a, susceros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate aliquam egestas litora torquent conubia.</p>
                            </div>

                            <h3>Second Floor <span>440 sq ft</span> <i class="fa fa-angle-down"></i></h3>
                            <div>
                                <a class="floor-pic mfp-image" href="https://i.imgur.com/l2VNlwu.jpg">
                                    <img src="https://i.imgur.com/l2VNlwu.jpg" alt="">
                                </a>
                                <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. Nullam laoreet, velit ut taciti sociosqu condimentum feugiat.</p>
                            </div>

                            <h3>Garage <span>140 sq ft</span> <i class="fa fa-angle-down"></i></h3>
                            <div>
                                <a class="floor-pic mfp-image" href="https://i.imgur.com/0zJYERy.jpg">
                                    <img src="https://i.imgur.com/0zJYERy.jpg" alt="">
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Property Description / End -->


            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <div class="widget margin-bottom-30">
                        <button class="widget-button with-tip" data-tip-content="Print"><i class="sl sl-icon-printer"></i></button>
                        <button class="widget-button with-tip" data-tip-content="Add to Bookmarks"><i class="fa fa-star-o"></i></button>
                        <button class="widget-button with-tip compare-widget-button" data-tip-content="Add to Compare"><i class="icon-compare"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Widget / End -->

                    <!-- Widget -->
                    <div class="widget">
                        <h3 class="margin-bottom-35">Featured Properties</h3>

                        <div class="listing-carousel outer">
                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Eagle Apartments <i>$275,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="{{ asset('images/listing-01.jpg') }}" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->

                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Selway Apartments <i>$245,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="images/listing-02.jpg" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->

                            <!-- Item -->
                            <div class="item">
                                <div class="listing-item compact">

                                    <a href="#" class="listing-img-container">

                                        <div class="listing-badges">
                                            <span class="featured">Featured</span>
                                            <span>For Sale</span>
                                        </div>

                                        <div class="listing-img-content">
                                            <span class="listing-compact-title">Oak Tree Villas <i>$325,000</i></span>

                                            <ul class="listing-hidden-content">
                                                <li>Area <span>530 sq ft</span></li>
                                                <li>Rooms <span>3</span></li>
                                                <li>Beds <span>1</span></li>
                                                <li>Baths <span>1</span></li>
                                            </ul>
                                        </div>

                                        <img src="images/listing-03.jpg" alt="">
                                    </a>

                                </div>
                            </div>
                            <!-- Item / End -->
                        </div>

                    </div>
                    <!-- Widget / End -->

                </div>
            </div>
            <!-- Sidebar / End -->

        </div>
    </div>
@endsection
