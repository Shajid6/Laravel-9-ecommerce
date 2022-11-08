
@extends('layouts.app')
@section('title')
    {{ $category->meta_title }}
@endsection

@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection

@section('meta_description')
    {{ $category->meta_description }}
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row  ">
                <div class="col-md-12 ">
                    <h2 class="mb-4 bg-red">Our Products</h2>
                </div>
                <div class="row mb-4 mt-4">


                    <div class="col-md-4">
                        <div class="m-auto">
                            <h3>{{ $category->name }} category-</h3>
                            <div class="underline"></div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam, reiciendis!</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="m-auto">
                            <h3> {{ $category->name }}category-</h3>
                            <div class="underline"></div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam, reiciendis!</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="m-auto">
                           <h3> {{ $category->name }}category-</h3>
                            <div class="underline"></div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam, reiciendis!</p>
                        </div>
                    </div>
                    
    </div>

    <livewire:frontend.product.index :category='$category' />
    </div>
    </div>
    </div>
@endsection
