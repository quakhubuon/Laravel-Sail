@extends('welcome')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<?php
    use Illuminate\Support\Facades\Session;
    $cart = Session::get('cart');
    $total = 0;
?>

<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if($cart != null)
                    @foreach($cart as $item)
                    @php
                    $total += $item['price'] * $item['quantity'];
                    @endphp
                    <tr>
                        <td class="align-middle"><img src="{{ asset('FE/images/'. $item['image']) }}" alt=""
                                style="width: 50px;">
                            {{ $item['name'] }}
                        </td>
                        <td class="align-middle">{{ number_format($item['price'], 3, ",") }} VNĐ
                        </td>
                        <td class="align-middle">
                            <form action="{{ URL::to('update_cart') }}" method="post">
                                @csrf
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input name="cart_quantity" type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="{{ $item['quantity'] }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="cart_id" value="{{ $item['id'] }}">
                            </form>
                        </td>
                        <td class="align-middle">{{ number_format($item['price'] * $item['quantity'], 3, ",") }} VNĐ
                        </td>
                        <td class="align-middle">
                            <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                                href="{{ URL::to('delete_cart/' . $item['id'] ) }}"
                                class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                    Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>{{ number_format($total, 3, ",") }} VNĐ</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        @if($cart != null)
                        <h6 class="font-weight-medium">{{ number_format(10, 3, ",") }} VNĐ</h6>
                        @endif
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        @if($cart != null)
                        <h5>{{ number_format($total + 10, 3, ",") }} VNĐ</h5>
                        @endif
                    </div>
                    <a class="btn btn-block btn-danger font-weight-bold my-3 py-3"
                        onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{ URL::to('delete_all') }}">Cancel
                        Cart</a>
                    <a href="{{ URL::to('/check_out') }}"
                        class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection