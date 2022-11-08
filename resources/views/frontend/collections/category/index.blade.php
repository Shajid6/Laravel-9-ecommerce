@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-red">Our Categories</h2>
                    <div class="underline mb-4"></div>
                </div>
                @forelse ($categories as $categoryItem)
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="{{ url('/collections/' . $categoryItem->slug) }}">
                                <div class="category-card-img">
                                    <img src="{{ asset("$categoryItem->image") }}" class="w-100" alt="">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{ $categoryItem->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h2>No Categories Available</h2>
                    </div>
                @endforelse
            </div>
        </div>
    

    </div>
    @endsection
    
 
