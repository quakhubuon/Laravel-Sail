@extends('admin_welcome')
@section('admin_content')

<?php
    use Illuminate\Support\Facades\DB;
    $permissions = DB::table('permissions')->get();
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Mã người dùng</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Email</th>
            <th scope="col">Quyền hiện tại</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($model_has_permissions as $key)
                {{ $key->name }}
                @endforeach
            </td>
        </tr>
    </tbody>
</table>

<form action="{{ URL::to('admin/add_permission') }}" method="post">
    @csrf
    <div class="form-row align-items-center">
        <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Phân vai trò:</label>
            <ul class="list-group">
                @foreach($permissions as $permission)
                <?php $isChecked = in_array($permission->id, $model_has_permissions_array) ? "checked" : ""; ?>
                <li class="list-group-item">
                    <input {{ $isChecked }} class="form-check-input me-1" name="permission[]"
                        id="{{ $permission->name }}" type="checkbox" value="{{ $permission->id }}" aria-label="...">
                    <label for="{{ $permission->name }}">{{ $permission->name }}</label>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="my-1">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <button type="submit" class="btn btn-primary">Phân quyền</button>
    </div>
</form>

@endsection