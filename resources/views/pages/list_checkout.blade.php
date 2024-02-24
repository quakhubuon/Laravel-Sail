@extends('admin_welcome')
@section('admin_content')

<!-- Breadcrumb End -->
<div class="container-fluid">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ giao hàng</th>
                <th scope="col">Phương thức thanh toán</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày giao hàng</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Thao tác</th>
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
                <td>{{ $item->date_delivery }}</td>
                <td>
                    @if ($item->order_status == 0)
                    chưa xử lý
                    @elseif ($item->order_status == 1)
                    đang xử lý
                    @elseif ($item->order_status == 2)
                    đang giao hàng
                    @elseif ($item->order_status == 3)
                    đã giao hàng
                    @endif
                </td>
                <td><a href="{{ URL::to('admin/detail_checkout?order_id=' . $item->order_id) }}"
                        class="btn btn-sm btn-primary">Chi
                        tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Cart End -->
</div>

@endsection