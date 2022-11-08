<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white border" wire:ignore>
                    @if ($product->productImages->count() > 0)

                        <div class="exzoom" id="exzoom">
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach ($product->productImages as $itemImage)
                                        <li><img src="{{ asset($itemImage->image) }}" /></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="exzoom_nav"> </div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                             <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                           
                        </div>
                    @else
                        <h1>No Image Added</h1>
                    @endif
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                        <div class="float-end">
                            @if ($product->quantity > 0)
                                <label class="stock bg-success"> In Stock</label>
                            @else
                                <label class="stock bg-danger">Out of Stock!</label>
                            @endif
                        </div>

                    </h4>
                    <hr>
                    <p class="product-path">
                        Home /{{ $product->category->name }}/{{ $product->name }}

                    </p>
                    <div>
                        <span class="selling-price">${{ $product->selling_price }}</span>
                        <span class="original-price">${{ $product->original_price }}</span>
                    </div>


                    <div>

                        @if ($product->productColors->count() > 0)

                            @if ($product->productColors)
                                @foreach ($product->productColors as $colorItem)
                                    {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id}}" /> {{$colorIten->color->name --}}
                                    <label class="colorSelectionLabel text-secondary"
                                        style="background-color: {{ $colorItem->color->code }}"
                                        wire:click="colorSelected({{ $colorItem->id }})">
                                        {{ $colorItem->color->name }}
                                    </label>
                                @endforeach
                            @endif

                            @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                <label class="stock bg-danger"> Out of Stock</label>
                            @elseif ($this->prodColorSelectedQuantity > 0)
                                <label class="stock bg-success">In Stock </label>
                            @endif
                        @endif




                    </div>

                    <div class="mt-2">
                        <div class="input-group">
                            <span class="btn  btn1" wire:click="decrementQuantity"> <i class="fa fa-minus text-black"></i></span>
                            <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}"
                                readonly class="input-quantity" />
                            <span class="btn btn1" wire:click="incrementQuantity"> <i class="fa fa-plus text-black"></i></span>
                        </div>
                    </div>
                    <div class="mt-2">

                        @if (Auth::check())
                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                        @else
                            <button type="button" class="btn btn1" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                        @endif


                        <button type="button" wire:click="addToWishList({{ $product->id }})" class="btn btn1">
                            <span wire:loading.remove wire:target="addToWishList">
                                <i class="fa fa-heart"></i> Add to Wishlist
                            </span>
                            <span wire:loading wire:target="addToWishList">Adding...</span>
                        </button>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {!! $product->small_description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- - Login modal- --}}



<div>
    <div wire:ignore.self class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class=" mt-4">Sign In</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="card-body m-auto">

                    <form method="POST" action="{{ route('login') }}">
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
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

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

    @push('scripts')
        <script>
            $(function() {

                $("#exzoom").exzoom({



                    // thumbnail nav options
                    "navWidth": 60,
                    "navHeight": 50,
                    "navItemNum": 5,
                    "navItemMargin": 7,
                    "navBorder": 1,

                    // autoplay
                    "autoPlay": false,

                    // autoplay interval in milliseconds
                    "autoPlayTimeout": 2000

                });

            });
        </script>
    @endpush
