@extends('admin_welcome')
@section('admin_content')

<div class="col-md-12">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Thêm người dùng</h5>
        </div>
        <div class="card-body">
            <form action="{{ URL::to('admin/create') }}" method="get">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Thêm người dùng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection