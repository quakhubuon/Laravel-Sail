@extends('admin_welcome')
@section('admin_content')

<?php
    use Illuminate\Support\Facades\Session;
    
    $message = Session::get('message');
    if($message) {
        echo '<script language="javascript">';
        echo 'alert("' . $message . '")';
        echo '</script>';
        Session::put('message', null);
    }
?>

<div class="col-md-12">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Thêm sản phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{ route ('products.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="number" name="product_price" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="product_desc" class="form-control textarea"></textarea>
                        </div>
                    </div>
                </div>

                <label>Hình sản phẩm</label>
                <input type="file" name="product_image" class="form-control">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control" name="category_id" id="cars">
                                @foreach($data as $key)
                                <option value="{{ $key->category_id }}">{{ $key->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <select class="form-control" name="product_status" id="cars">
                                <option value="1" selected>Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Thêm sản phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection