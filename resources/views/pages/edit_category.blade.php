@extends('admin_welcome')
@section('admin_content')

<div class="col-md-12">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Sửa danh mục sản phẩm</h5>
        </div>
        <div class="card-body">
            <form action="{{ URL::to('admin/update_category') }}" method="get">
                @foreach($categorys as $key)
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" name="category_name" class="form-control"
                                value="{{ $key->category_name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea name="category_desc"
                                class="form-control textarea">{{ $key->category_desc }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <select class="form-control" name="category_status" id="cars">
                                <option value="1" @if (old('1')==$key->category_status ) {{ 'selected' }} @endif>Hiện
                                </option>
                                <option value="0" @if (old('0')==$key->category_status ) {{ 'selected' }} @endif>Ẩn
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="category_id" value="{{ $key->category_id }}">
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Sửa danh mục</button>
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>
@endsection