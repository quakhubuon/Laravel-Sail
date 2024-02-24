@extends('admin_welcome')
@section('admin_content')

<div class="col-md-12">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Thêm danh mục sản phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{ URL::to('admin/category') }}" method="get">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="category_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="category_desc" class="form-control textarea"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <select class="form-control" name="category_status" id="cars">
                                <option value="1" selected>Hiện</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Thêm danh mục</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection