@extends('admin_welcome')
@section('admin_content')

<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

    $message = Session::get('message');
    if($message) {
        echo '<script language="javascript">';
        echo 'alert("' . $message . '")';
        echo '</script>';
        Session::forget('message');
    }
    
?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Danh sách người dùng</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>
                                Tên người dùng
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Xác nhận email
                            </th>
                            <th>
                                Quyền
                            </th>
                            <th>
                                Vai trò
                            </th>
                            <th>
                                Phân quyền
                            </th>
                            <th>
                                Phân vai trò
                            </th>
                            <th>
                                Chuyển quyền nhanh
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @foreach($user->getRoles as $key)
                                {{ $key->name }}
                                @endforeach
                            </td>
                            <td>
                                @foreach($user->getPermissions as $key)
                                {{ $key->name }}
                                @endforeach
                            </td>
                            <td>
                                @if($user->email_verified_at == NULL)
                                Chưa xác nhận
                                @else
                                Đã xác nhận
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ URL::to('admin/phan_quyen?id=' . $user->id) }}"
                                    role="button">Link</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ URL::to('admin/vai_tro?id=' . $user->id) }}"
                                    role="button">Link</a>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="#" role="button">Link</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection