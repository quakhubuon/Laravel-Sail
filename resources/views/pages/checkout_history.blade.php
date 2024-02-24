@extends('welcome')
@section('content')

<?php
    use Illuminate\Support\Facades\Session;
    $user = Session::get('user');
?>

@if($user)
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">History Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Payment</th>
                <th scope="col">Total price</th>
                <th scope="col">Created at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $item)
            <tr>
                <th scope="row">{{ $item->order_id }}</th>
                <td>{{ $item->order_phone }}</td>
                <td>{{ $item->order_address }}</td>
                <td>{{ $item->order_payment }}</td>
                <td>{{ $item->total_price }}</td>
                <td>{{ $item->created_at }}</td>
                <td><a href="{{ URL::to('detail_checkout?order_id=' . $item->order_id) }}"
                        class="btn btn-sm btn-primary">Chi
                        tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Cart End -->
</div>
@endif

@endsection