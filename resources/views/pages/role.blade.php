@extends('admin_welcome')
@section('admin_content')

<?php
    use Illuminate\Support\Facades\DB;
    $roles = DB::table('roles')->get();
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Mã người dùng</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Email</th>
            <th scope="col">Vai trò hiện tại</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            @foreach($model_has_roles as $key)
            <td>{{ $key->name }}</td>
            @endforeach
        </tr>
    </tbody>
</table>

<form action="{{ URL::to('admin/add_role') }}" method="post">
    @csrf
    <div class="form-row align-items-center">
        <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Phân vai trò:</label>
            <ul class="list-group">
                @foreach($roles as $role)
                <?php $isChecked = in_array($role->id, $model_has_roles_array) ? "checked" : ""; ?>
                <li class="list-group-item">
                    <input {{ $isChecked }} class="form-check-input me-1" name="role[]" id="{{ $role->name }}"
                        type="checkbox" value="{{ $role->id }}" aria-label="...">
                    <label for="{{ $role->name }}">{{ $role->name }}</label>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="my-1">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <button type="submit" class="btn btn-primary">Phân vai trò</button>
    </div>
</form>

@endsection