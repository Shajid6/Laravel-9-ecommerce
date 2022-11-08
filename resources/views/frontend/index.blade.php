@extends('layouts.app')
@section('title', 'Home Page')

@section('content')



    <main class="main mt-4">

        <section class="home-slider">

            <div class="row d-flex">


                <div class="col-md-2 ">

                    <ul class="category_menu">
                        @foreach ($categories as $category)
                            <li>
                                <a href="#">

                                    <span class="cat_name">{{ $category->name }}</span>
                                    <span class="fa fa-arrow-right"></span>
                                </a>

                                <ul class="right_sliding">
                                    @foreach ($category->children as $child)
                                        <li>
                                            <a href="#">

                                                <span class="cat_name">{{ $child->name }}</span>
                                                <span class="fa fa-arrow-right"></span>
                                            </a>



                                            <ul class="right_sliding1">
                                                @foreach ($child->children as $child2)
                                                    <li>
                                                        <a href="#">

                                                            <span class="cat_name">{{ $child2->name }}</span>
                                                            <span class="fa fa-arrow-right"></span>
                                                        </a>

                                                    </li>
                                                @endforeach
                                            </ul>


                                        </li>
                                    @endforeach
                                </ul>



                            </li>
                        @endforeach
                    </ul>

                </div>


                <div class="ss col-xl-9 col-8 float-end">
                    <div class="owl-carousel owl2 owl-theme ">
                        @foreach ($sliders as $key => $sliderItem)
                            <div class="item">
                                @if ($sliderItem->image)
                                <a href="">
                                    <div class="slider-img">
                                        <img src="{{ asset($sliderItem->image) }}" class=" w-100 slider-im"
                                            alt="slider" />
                                    </div>
                                    </a>
                                @endif
                                <div class="carousel-caption d-none d-md-block col-md-4 float-first">
                                    <div class="custom-carousel-content text-light">
                                        <h2>
                                            {!! $sliderItem->title !!}
                                        </h2>
                                        <p>
                                            {!! $sliderItem->description !!}
                                        </p>
                                        <div>
                                            <a href="#" class="btn btn-primary text-light">
                                                Shop Now </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>



                {{-- <div class="col-md-10 float-end">

                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                @foreach ($sliders as $key => $sliderItem)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        @if ($sliderItem->image)
                                            <img src="{{ asset($sliderItem->image) }}" class="d-block w-100 slider-im"
                                                alt="slider" />
                                        @endif
                                        <div class="carousel-caption d-none d-md-block col-md-4 float-first">
                                            <div class="custom-carousel-content text-light">
                                                <h2>
                                                    {!! $sliderItem->title !!}
                                                </h2>
                                                <p>
                                                    {!! $sliderItem->description !!}
                                                </p>
                                                <div>
                                                    <a href="#" class="btn btn-primary text-light">
                                                        Shop Now </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div> --}}


            </div>

            </div>

        </section>


           <!DOCTYPE html>








        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                            <h4 class="bg-1">Free Shipping</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                            <h4 class="bg-3">Online Order</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                            <h4 class="bg-2">Save Money</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                            <h4 class="bg-4">Promotions</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                            <h4 class="bg-5">Happy Sell</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                            <h4 class="bg-6">24/7 Support</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <section>
            <livewire:frontend.new.new-product />
        </section>


        <section class="banner-2 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="assets/imgs/banner/banner-4.png" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                        <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                        <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>


        <section class=" mt-15 mb-25">

            <div class="py-5 bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                            <div class="underline mb-4"></div>
                        </div>

                        @if ($categories)
                            @forelse ($categories as $categories)
                                <div class="col-md-2">
                                    <div class="product-card">
                                        <div class="product-card-img">

                                            @if ($categories->image)
                                                <figure class=" img-hover-scale overflow-hidden">
                                                    <a href="{{ url('/collections') }}">

                                                        <img src="{{ asset($categories->image) }}"
                                                            alt="{{ $categories->name }}">
                                                    </a>
                                                </figure>
                                            @endif
                                        </div>
                                        <div class="product-card-body">

                                            <h6 class="product-name">
                                                <a href="{{ url('/collections') }}">
                                                    {{ $categories->name }}
                                                </a>
                                            </h6>


                                        </div>
                                    </div>
                                </div>

                            @empty
                                <div class="col-md-12">
                                    <h2>No categories Available for</h2>
                                </div>
                            @endforelse
                        @endif
                    </div>

                </div>
            </div>



        </section>



        <section class="banners mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="assets/imgs/banner/banner-1.png" alt="">
                            <div class="banner-text">
                                <span>Smart Offer</span>
                                <h4>Save 20% on <br>Woman Bag</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="assets/imgs/banner/banner-2.png" alt="">
                            <div class="banner-text">
                                <span>Sale off</span>
                                <h4>Great Summer <br>Collection</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="assets/imgs/banner/banner-3.png" alt="">
                            <div class="banner-text">
                                <span>New Arrivals</span>
                                <h4>Shop Today’s <br>Deals & Offers</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section>
            <div class="py-5 bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Trendding Products</h4>
                            <div class="underline"></div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="owl-carousel owl1 owl-theme ">
                                @foreach ($newArraivalsProducts as $productItem)
                                    <div class='item'>
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                <label class="stock bg-danger">New</label>
                                                @if ($productItem->productImages->count() > 0)
                                                    <a
                                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                            alt="{{ $productItem->name }}">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="product-card-body">
                                                <p class="product-brand">{{ $productItem->brand }}</p>
                                                <h5 class="product-name">
                                                    <a
                                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                        {{ $productItem->name }}
                                                    </a>
                                                </h5>
                                                <div>
                                                    <span class="selling-price">${{ $productItem->original_price }}</span>
                                                    <span class="original-price">${{ $productItem->selling_price }}</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>



        </section>




        <section>

            <div class="py-5 bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="section-title mb-20"><span>Featured</span> Brands</h3>
                            <div class="underline mb-4"></div>
                        </div>

                        @if ($brands)
                            @forelse ($brands as $brand)
                                <div class="col-md-2">

                                    <div class="product-card-img">

                                        @if ($brand->image)
                                            <figure class=" img-hover-scale overflow-hidden">
                                                <a href="{{ url('/collection') }}">

                                                    <img class="img-grey-hover" src="{{ asset($brand->image) }}"
                                                        alt="{{ $brand->name }}">


                                                </a>
                                                <h6>{{ $brand->name }}</h6>
                                            </figure>
                                        @endif
                                    </div>


                                </div>
                            @empty
                                <div class="col-md-12">
                                    <h2>No brands Available for</h2>
                                </div>
                            @endforelse
                        @endif
                    </div>

                </div>
            </div>



        </section>


    </main>




@endsection


@section('script')
    <script>
        var owl = $('.owl1 ');
        owl.owlCarousel({
            loop: true,
            items: 5,
            margin: 10,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true

        });

        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        })
    </script>
    <script>
        var owl = $('.owl2 ');
        owl.owlCarousel({
            loop: true,
            items: 1,
            smartSpeed:3000,
            slideTransition:"fadeOut",
            margin: 10,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause:true

        });

        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay')
        })
    </script>


@endsection





{{--  
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    @if ($sliderItem->image)
                        <img src="{{ asset($sliderItem->image) }}" class="d-block w-100" alt="slider" />
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {!! $sliderItem->title !!}
                            </h1>
                            <p>
                                {!! $sliderItem->description !!}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to eBazar E-Commerce</h4>
                    <div class="underline mx-auto"> </div>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, obcaecati suscipit unde veritatis
                        natus alias consequatur explicabo ipsa eaque laborum! Aperiam corporis tempore dolores enim,
                        expedita iusto, quam eius quod culpa vel eaque eum molestias dicta ipsa labore est debitis?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trendding Products</h4>
                    <div class="underline"></div>
                </div>
                @if ($brands)
                    <div class="col-md-12">
                        <div class="owl-carousel owl1 owl-theme ">
                            @foreach ($trendingProducts as $productItem)
                                <div class='item'>
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->original_price }}</span>
                                                <span class="original-price">${{ $productItem->selling_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h2 class="s">No Products Available for</h2>
                    </div>
            </div>
            @endif


        </div>
    </div>

    <div class="card-body">
    

    </div>


    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12  text-center mt-4">
                    <h3>All Your Choice is here</h3>
                    <div class="underline m-auto float-middle mb-4"></div>
                </div>
                @if ($brands)
                    <div class="col-md-12">
                        <div class="owl-carousel owl1 owl-theme ">
                            @foreach ($brands as $brandItem)
                                <div class='item'>
                                    <div class="product-card">
                                        <div class="product-card-img">


                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                                <img src="{{ asset($brandItem->image) }}" alt="{{ $brandItem->name }}">
                                            </a>

                                        </div>
                                        <div class="product-card-body">

                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $brandItem->name }}
                                                </a>
                                            </h5>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h2 class="s">No Products Available for</h2>
                    </div>
            </div>
            @endif


        </div>
    </div>

    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>For-You</h4>
                    <div class="underline mb-4"></div>
                </div>
                @forelse ($featuredProducts as $productItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>
                                @if ($productItem->productImages->count() > 0)
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">

                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                            alt="{{ $productItem->name }}">
                                    </a>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->name }}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>

                                <div>
                                    <span class="selling-price">${{ $productItem->original_price }}</span>
                                    <span class="original-price">${{ $productItem->selling_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-md-12">
                        <h2>No Products Available for</h2>
                    </div>
                @endforelse
                <div class="text-center mt-4">
                    <a href="{{ url('collections') }}" class="btn btn-warning px-3">Shop More</a>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $('.owl1').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script> --}}
