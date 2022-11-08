@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-end flex-wrap">
                            <div class="me-md-3 me-xl-5">

                                <h5 class="mb-md-0">Your analytics dashboard template.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>Total Orders</label>
                        <h1>{{ $totallOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white"> view </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Today Orders</label>
                        <h1>{{ $todayOrder }}</h1>
                        <a href="{{ url('admin/oders') }}" class="text-white"> view </a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card card-body bg-dark text-white mb-3">
                        <label>This month Orders</label>
                        <h1>{{ $thisMonthOrder }}</h1>
                        <a href="{{ url('admin/orders') }}" class="text-white"> view </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label>This Year Orders</label>
                        <h1>{{ $thisYearOrder }}</h1>
                        <a href="{{ url('admin/products') }}" class="text-white"> view </a>
                    </div>
                </div>


                 <div class="col-md-3">
                    <div class="card card-body bg-dark text-white mb-3">
                        <label>Categories</label>
                        <h1>{{ $totallCategory }}</h1>
                        <a href="{{ url('admin/category') }}" class="text-white"> view </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>Total Brands</label>
                        <h1>{{ $totallBrand}}</h1>
                        <a href="{{ url('admin/brands') }}" class="text-white"> view </a>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label>Total Products</label>
                        <h1>{{ $totallProduct}}</h1>
                        <a href="{{ url('admin/products') }}" class="text-white"> view </a>
                    </div>
                </div>

                 <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Totall Admin</label>
                        <h1>{{ $totallAdmin}}</h1>
                        <a href="{{ url('admin/user') }}" class="text-white"> view </a>
                    </div>
                </div>

                   <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label>Totall Admin</label>
                        <h1>{{ $totallAdmin}}</h1>
                        <a href="{{ url('admin/user') }}" class="text-white"> view </a>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label>Total User</label>
                        <h1>{{ $totallUser }}</h1>
                        <a href="{{ url('admin/user') }}" class="text-white"> view </a>
                    </div>
                </div>
                    <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label>All User</label>
                        <h1>{{ $totallAllUser }}</h1>
                        <a href="{{ url('admin/user') }}" class="text-white"> view </a>
                    </div>
                </div>


               


            </div>
        @endsection
