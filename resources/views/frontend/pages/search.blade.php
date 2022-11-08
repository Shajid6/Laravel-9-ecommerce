@extends('layouts.app')
@section('title', 'search-products')
@section('content')
<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
             @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="col-md-12">
                <h4>Search Products</h4>
                <div class="underline mb-4"></div>
            </div>
                    @forelse ( $searchProducts as $productItem) 
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
                       
                                @empty
                <div class="col-md-12">
                    <h2>No Products Available for</h2>
                </div>
                @endforelse
                <div class="text-center mt-4">
                    <a href="{{url('collections')}}" class="btn btn-warning px-3">Shop More</a>
                </div>
            </div>
            </div>
    </div>

@endsection