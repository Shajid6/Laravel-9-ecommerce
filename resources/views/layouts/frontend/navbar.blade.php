 {{-- <div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <h5 class="brand-name">{{ $appSetting->website_name }}</h5>
                </div>
                <div class="col-md-5 my-auto">
                    <form action="{{ url('search') }}" method="GET" role="search">
                        <div class="input-group">
                            <input type="search" name="search" value="" placeholder="Search your product"
                                class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            @if (Auth::check())
                                <a class="nav-link" href="{{ url('cart') }}">
                                    <i class="fa fa-shopping-cart"></i> Cart (
                                    <livewire:frontend.cart.cart-count />)
                                </a>
                            @else
                                <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    <i class="fa fa-shopping-cart"></i>Cart (
                                    <livewire:frontend.cart.cart-count />
                                    )
                                </a>
                            @endif
                        </li>

                        <li class="nav-item">
                            @if (Auth::check())
                                <a class="nav-link" href="{{ url('wishlist') }}">
                                    <i class="fa fa-heart"></i> Wishlist (
                                    <livewire:frontend.wishlist-count />)
                                </a>
                            @else
                                <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    <i class="fa fa-heart"></i>Wishlist (
                                    <livewire:frontend.wishlist-count />
                                    )
                                </a>
                            @endif
                        </li>


                        @guest
                            <li class="nav-item">
                                @if (Route::has('login'))
                                    <a type="button" class="nav-link" data-bs-toggle="modal"
                                        data-bs-target="#loginModal">{{ __('Login') }}</a>

                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a type="button" class="nav-link" data-bs-toggle="modal"
                                        data-bs-target="#registernModal">{{ __('Register') }}</a>
                                @endif
                            </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> ggg{{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ url('orders') }}"><i class="fa fa-list"></i> My
                                            Orders</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> My
                                            Wishlist</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('cart') }}"><i
                                                class="fa fa-shopping-cart"></i> My
                                            Cart</a></li>

                                    <li>


                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                e-Bazar
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">


                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">

                        <div class="dropdown">

                            <button class="dropbtn">Browse Category</button>
                            <div class="dropdown-content">

                                @foreach ($categories2 as $category)
                                    <a href="{{url('collections/' . $category->slug)}}">
                                        <label value="{{ $category->id }}"> {{ $category->name }}</label>
                                @endforeach

                                </a>
                            </div>

                        </div> 

{{-- @foreach ($shareData['categories2'] as $category)
                    <li class="dropdown m-menu-fw">

                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">{{ $category->name }}
                            <span><i class="fa fa-angle-down"></i></span></a>
                        @endforeach 

                    </li>
                    <a class="nav-link" href="{{ url('/collections') }}">All-Categories</a> --}}


 {{-- <div class="collapse " id="ui-basic">

                    </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/new-arrivals') }}">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/featured-products') }}">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:8000/collections/fasion">Fashions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accessories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Appliances</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div> --}}

 {{-- Login modal --}}

 {{-- <div>
     <div class="modal fade" id="loginModal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class=" mt-4">Sign In</h4>

                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>

                 <div class="card-body m-auto">

                     <form name="myForm" method="POST" action="{{ route('login') }}">
                         @csrf

                         <div class="row mb-3 ">
                             <label for="email" class="col-md-4 col-form-label text-md-end ">
                                 {{ __('') }}
                             </label>

                             <div class="col-md-6 mt-4">
                                 <h6>Email Address</h6>
                                 <input id="email" type="email"
                                     class="form-control @error('email') is-invalid @enderror" name="email"
                                     value="{{ old('email') }}" required autocomplete="email" autofocus>

                                 @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-3">

                             <label for="password"
                                 class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                             <div class="col-md-6">
                                 <h6>Password</h6>
                                 <input id="password" type="password"
                                     class="form-control @error('password') is-invalid @enderror" name="password"
                                     required autocomplete="current-password">

                                 @error('password')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>


                             <div class="row mb-3">
                                 <div class="col-md-6 offset-md-4">
                                     <div class="form-check">
                                         <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                             {{ old('remember') ? 'checked' : '' }}>

                                         <label class="form-check-label" for="remember">
                                             {{ __('Remember Me') }}
                                         </label>
                                     </div>
                                 </div>
                             </div>

                             <div class="row mb-0 mb-5">
                                 <div class="col-md-8 offset-md-4 btn-sm">
                                     <button type="submit" class="btn btn-primary">
                                         {{ __('Login') }}
                                     </button>


                                     @if (Route::has('password.request'))
                                         <a class="btn btn-link" href="{{ route('password.request') }}">
                                             {{ __('Forgot Your Password?') }}
                                         </a>
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div>
     <div class="modal fade" id="registernModal0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class=" mt-4">Sign Up</h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>

                 <div class="card-body">
                     <form method="POST" action="{{ route('register') }}">
                         @csrf

                         <div class="row mb-3">
                             <label for="name"
                                 class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                             <div class="col-md-6 mt-4">
                                 <h6>Name</h6>
                                 <input id="name" type="text"
                                     class="form-control @error('name') is-invalid @enderror" name="name"
                                     value="{{ old('name') }}" required autocomplete="name" autofocus>

                                 @error('name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-3">

                             <label for="email"
                                 class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                             <div class="col-md-6 ">
                                 <h6>Email Address</h6>
                                 <input id="email" type="email"
                                     class="form-control @error('email') is-invalid @enderror" name="email"
                                     value="{{ old('email') }}" required autocomplete="email">

                                 @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-3">
                             <label for="password"
                                 class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                             <div class="col-md-6">
                                 <h6>Password</h6>
                                 <input id="password" type="password"
                                     class="form-control @error('password') is-invalid @enderror" name="password"
                                     required autocomplete="new-password">

                                 @error('password')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                         </div>

                         <div class="row mb-3">
                             <label for="password-confirm"
                                 class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>

                             <div class="col-md-6 ">
                                 <h6>Confirm Password</h6>
                                 <input id="password-confirm" type="password" class="form-control"
                                     name="password_confirmation" required autocomplete="new-password">
                             </div>
                         </div>

                         <div class="row mb-5">
                             <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-primary mx-auto">
                                     {{ __('Register') }}
                                 </button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div> --}}




 {{-- New navbar --}}



 <div class="main-navbar shadow-sm sticky-top">
     <div class="top-navbar">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                     <h5 class="brand-name">Funda Ecom</h5>
                 </div>


                 <div class="col-md-5 my-auto">
                     <form action="{{ url('search') }}" method="GET" role="search">
                         <div class="input-group">
                             <input type="search"name="search" value="" placeholder="Search your product"
                                 class="form-control" />
                             <button class="btn bg-white" type="submit">
                                 <i class="fa fa-search"></i>
                             </button>
                         </div>
                     </form>
                 </div>

                 <div class="col-md-4 my-auto">
                     <ul class="nav justify-content-end">

                         <li class="nav-item">
                             <div class="header-action-right">
                                 <div class="header-action-2">
                                     <div class="header-action-icon-2">
                                         <img class="svgInject" alt="Surfside Media"
                                             src="assets/imgs/theme/icons/icon-heart.svg">
                                           
                                         @if (Auth::check())
                                             <a class="nav-link" href="{{ url('wishlist') }}">
                                                 <span class="pro-count blue">
                                                     <livewire:frontend.wishlist-count />
                                                 </span>

                                             </a>
                                         @else
                                             <a type="button" class="nav-link"href="{{ url('login') }}">
                                                 <span class="pro-count blue">
                                                     <livewire:frontend.wishlist-count />
                                                 </span>

                                             </a>
                                         @endif
                                     </div>

                                 </div>

                             </div>

                         </li>



                         <li class="nav-item">
                             <div class="header-action-right">
                                 <div class="header-action-2">
                                     <div class="header-action-icon-2">
                                         <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                                         @if (Auth::check())
                                             <a class="nav-link" href="{{ url('cart') }}">
                                                 <span class="pro-count blue">
                                                     <livewire:frontend.cart.cart-count />
                                                 </span>
                                             </a>
                                         @else
                                             <a type="button" class="nav-link" href="{{ url('login') }}">
                                                 <span class="pro-count blue">
                                                     <livewire:frontend.cart.cart-count />
                                                 </span>
                                             </a>
                                         @endif

                                     </div>

                                 </div>

                             </div>
                         </li>

                         <li class="nav-item dropdown">
                             <div class="header-info header-info-right">
                                 <ul>

                                     @guest
                                         <li class="nav-item">
                                             @if (Route::has('login'))
                                                 <a type="button" href="{{ url('login') }}"
                                                     class="nav-link">{{ __('Login') }}</a>

                                         </li>
                                         <li class="nav-item">
                                             @if (Route::has('register'))
                                                 <a type="button" href="{{ url('register') }}"
                                                     class="nav-link">{{ __('Register') }}</a>
                                             @endif
                                         </li>
                                         @endif
                                     </ul>
                                 </div>
                             </li>
                         @else


                                       <div class="dropdowns">
                                     <button class="dropbtn"> <i class="fa fa-user"></i>{{ Auth::user()->name }}</button>
                                     <div class="dropdown-content">
                                         <a class="dropdown-item" href="#"><i class="fa fa-user"></i>
                                             Profile</a>

                                         <a class="dropdown-item" href="{{ url('orders') }}"><i class="fa fa-list"></i> My
                                             Orders</a>

                                         <a class="dropdown-item" href="{{ url('wishlist') }}"><i class="fa fa-heart"></i>
                                             My
                                             Wishlist</a>
                                         <a class="dropdown-item" href="{{ url('cart') }}"><i
                                                 class="fa fa-shopping-cart"></i> My
                                             Cart</a>

                             <li class="dropdown-item">
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                     <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                                   
                             </li>
                             @endguest
                     </div>
                 </div>
          

             </ul>
         </div>
     </div>
 </div>
 </div>
 <nav class="navbar navbar-expand-lg">
     <div class="container-fluid">
         <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
             eBazar
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
             data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link" href="#">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">All Categories</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">New Arrivals</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Featured Products</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Electronics</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Fashions</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Accessories</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Appliances</a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
 </div>




 {{--  <div class="pc-navbar">

     <header class="header-area header-style-1 header-height-2">
         <div class="header-top header-top-ptb-1 d-none d-lg-block ">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-xl-3 col-lg-4">
                         <div class="header-info">
                             <ul>
                                 <li>
                                     <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i>
                                         English <i class="fi-rs-angle-small-down"></i></a>
                                     <ul class="language-dropdown">
                                         <li><a href="#"><img src="assets/imgs/theme/flag-fr.png"
                                                     alt="">Français</a></li>
                                         <li><a href="#"><img src="assets/imgs/theme/flag-dt.png"
                                                     alt="">Deutsch</a></li>
                                         <li><a href="#"><img src="assets/imgs/theme/flag-ru.png"
                                                     alt="">Pусский</a></li>
                                     </ul>
                                 </li>
                             </ul>
                         </div>
                     </div>


                     <div class="col-xl-9 col-lg-4">
                         <div class="header-info header-info-right">
                             <ul>

                                 @guest
                                     <li class="nav-item">
                                         @if (Route::has('login'))
                                             <a type="button" href="{{ url('login') }}"
                                                 class="nav-link">{{ __('Login') }}</a>

                                     </li>
                                     <li class="nav-item">
                                         @if (Route::has('register'))
                                             <a type="button" href="{{ url('register') }}"
                                                 class="nav-link">{{ __('Register') }}</a>
                                         @endif
                                     </li>
                                     @endif
                                 @else
                                     <li class="nav-item dropdown">
                                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                             role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                             <i class="fa fa-user"></i>{{ Auth::user()->name }}
                                         </a>
                                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                             <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i>
                                                     Profile</a></li>
                                             <li><a class="dropdown-item" href="{{ url('orders') }}"><i
                                                         class="fa fa-list"></i> My
                                                     Orders</a>
                                             </li>
                                             <li><a class="dropdown-item" href="{{ url('wishlist') }}"><i
                                                         class="fa fa-heart"></i> My
                                                     Wishlist</a>
                                             </li>
                                             <li><a class="dropdown-item" href="{{ url('cart') }}"><i
                                                         class="fa fa-shopping-cart"></i> My
                                                     Cart</a></li>

                                             <li>


                                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                                                 </a>

                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                     class="d-none">
                                                     @csrf
                                                 </form>
                                             </li>
                                         @endguest

                                     </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
             <div class="container">
                 <div class="header-wrap">
                     <div class="logo logo-width-1">
                         <h3 href=""> <i class="fa-sharp fa-solid fa-user-headset"></i>{{-- {{ $appSetting->website_name }} 
                         </h3>
                     </div>
                     <div class="header-right">




                      




                                 <div class="header-action-icon-2">

                                     <div class="col-xl-9 col-lg-4">

                                     </div>
                                 </div>




                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
 </div> --}}
