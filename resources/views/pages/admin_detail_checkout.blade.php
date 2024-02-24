@extends('admin_welcome')
@section('admin_content')

<?php
    use Illuminate\Support\Facades\DB;
    $products = DB::table('tbl_product')->get();
    $user = DB::table('users')->get();
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Ngày giao hàng</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($user as $u)
            @if($orders->user_id == $u->id)
            <th>{{ $u->name }}</th>
            @endif
            @endforeach
            <td>{{ $orders->order_phone }}</td>
            <td>{{ $orders->order_address }}</td>
            <td>{{ $orders->date_delivery }}</td>
        </tr>
    </tbody>
</table>

<div class="container-fluid">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $item)
            <tr>
                @foreach($products as $key)
                @if($item->product_id == $key->product_id)
                <th scope="row">{{ $key->product_name }}</th>
                <th scope="row"><img style="width: 100px" src="{{ asset('FE/images/' . $key->product_image) }}">
                </th>
                @endif
                @endforeach
                <td>{{ number_format($item->price, 3, ",") }} VNĐ</td>
                <td>{{ $item->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Cart End -->
</div>

<form action="{{ URL::to('admin/detail_checkout_update') }}" method="get">
    <div class="form-row align-items-center">
        <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Tình trạng</label>
            <select name="order_status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option value="0" @if (($orders->order_status)==0) {{ 'selected' }} @endif>Chưa xử lý
                </option>
                <option value="1" @if (($orders->order_status)==1) {{ 'selected' }} @endif>Đang xử lý
                </option>
                <option value="2" @if (($orders->order_status)==2) {{ 'selected' }} @endif>Đang giao hàng
                </option>
                <option value="3" @if (($orders->order_status)==3) {{ 'selected' }} @endif>Đã giao hàng
                </option>
            </select>
        </div>
    </div>
    <div class="my-1">
        <input type="hidden" name="order_id" value="{{ $orders->order_id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection