@extends('layouts.admin')
@section('title', 'My Orders')
@section('content')

    <div class="row ">
        <div class="card border mt-3">
            <div class="col-md-12">
                <h5>
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                </h5>
                <div class="card-header">

                    <h3 class="text-primary">My Order Details

                        <a href="{{ url('admin/orders') }}" class=" btn btn-danger float-end text-white mx-1"> Back

                        </a>
                        <a href="{{ url('admin/invoice/' . $order->id .'/generate') }}" class="  btn btn-primary  float-end text-white mx-1">
                            Download Invoice
                        </a>
                        <a href="{{ url('admin/invoice/' . $order->id ) }}"
                            class="  btn btn-warning float-end text-white mx-1" target="_blank">
                            view Invoice
                        </a>
                    </h3>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id:{{ $order->id }} </h6>
                            <h6>Tracking Id/No :{{ $order->tracking_no }}</h5>
                                <h6>Orderd Date:{{ $order->created_at->format('d-m-Y h:A') }} </h6>
                                <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Full Name:{{ $order->fullname }} </h6>
                            <h6>Email ID :{{ $order->email }}</h6>
                            <h6>Phone: {{ $order->phone }}</h6>
                            <h6>Address:{{ $order->address }} </h6>
                            <h6>Pin code:{{ $order->pincode }} </h6>
                        </div>
                    </div>
                    <br />
                    <h5 class="fw-bold">Order Items</h5>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table bordered table striped">
                            <thead>

                                <th>Item Id</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if ($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                    style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif

                                        </td>
                                        <td>
                                            {{ $orderItem->product->name }}
                                            @if ($orderItem->productColor)
                                                <span>-color: {{ $orderItem->productColor->color->name }}</span>
                                            @endif
                                        </td>
                                        <td width="10%">${{ $orderItem->price }}</td>
                                        <td width="10%">{{ $orderItem->quantity }}</td>

                                        <td width="10%" class="fw-bold">${{ $orderItem->quantity * $orderItem->price }}
                                        </td>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp

                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5"class="fw-bold">
                                        <h5>TOtal Ammount</h5>
                                    </td>
                                    <td colspan="1"class="fw-bold">
                                        <h5>${{ $totalPrice }}</h5>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        <div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class=" card-body">
                    <h4>Order Process (Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h6 class="mb-2">Update Your Order Status</h6>
                                <div class="input-group">

                                    <select name="order_status" class="form-select">
                                        <option value="">Select Order Status</option>
                                        <option value="in progress"
                                            {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress
                                        </option>
                                        <option
                                            value="completed"{{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="pending"{{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option
                                            value="cancelled"{{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                        <option
                                            value="out-for-delivery"{{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>
                                            Out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3"> Current Order Status:<span class="text-uppercase text-success ">
                                    {{ $order->status_message }}
                                </span></h4>

                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
    </div>


@endsection
