@extends('welcome')
@section('content')
<!-- Breadcrumb Start -->
<?php
    use Illuminate\Support\Facades\DB;
    $products = DB::table('tbl_product')->get();

    use Illuminate\Support\Facades\Session;
    $user = Session::get('user');
?>

@if($user)
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
                <th scope="col">Product</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $item)
            <tr>
                @foreach($products as $key)
                @if($item->product_id == $key->product_id)
                <th scope="row">{{ $key->product_name }}</th>
                <th scope="row"><img style="width: 100px" src="{{ asset('FE/images/' . $key->product_image) }}">
                </th>
                @endif
                @endforeach
                <td>{{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Cart End -->
</div>
@endif

@endsection