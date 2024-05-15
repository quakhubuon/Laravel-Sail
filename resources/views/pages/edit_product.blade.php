@extends('admin_welcome')
@section('admin_content')

<?php 

    use Illuminate\Support\Facades\DB;
    $data = DB::table('tbl_category_product')->get();

?>

<div class="col-md-12">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Sửa sản phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{ route ('products.update', [$products->product_id]) }}" method="post" enctype="multipart/form-data">
            @method('put')
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" value="{{ $products->product_name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="number" name="product_price" class="form-control"
                                value="{{ $products->product_price }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="product_desc"
                                class="form-control textarea">{{ $products->product_desc }}</textarea>
                        </div>
                    </div>
                </div>
                <label>Hình sản phẩm</label>
                <input type="file" name="product_image" class="form-control">
                <br>
                <img style="width: 100px" src="{{ asset ('FE/images/' . $products->product_image ) }}" />

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control" name="category_id" id="cars">
                                @foreach($data as $key)
                                <option value="{{ $key->category_id }}" @if ($products->category_id ==
                                    $key->category_id) {{ 'selected' }} @endif>{{ $key->category_name }}</option>
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
                                <option value="1" @if (old('1')==$products->product_status ) {{ 'selected' }} @endif>Hiện
                                </option>
                                <option value="0" @if (old('0')==$products->product_status ) {{ 'selected' }} @endif>Ẩn
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="product_id" value="{{ $products->product_id }}">
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Sửa sản phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection