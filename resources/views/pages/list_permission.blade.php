@extends('admin_welcome')
@section('admin_content')

<?php

use Illuminate\Support\Facades\Session;

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
            <h4 class="card-title">Danh sách quyền</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <tr>
                            <th>
                                Tên quyền
                            </th>
                            <th>
                                Tên hiển thị
                            </th>
                            <th class="text-right">
                                Thao tác
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key)
                        <tr>
                            <td>
                                {{ $key->name }}
                            </td>
                            <td>
                                {{ $key->guard_name }}
                            </td>
                            <td class=" text-right">
                                <a style="font-size: 1.5rem; margin-right: 8px; color: black;" href=""><i
                                        class=" nc-icon nc-tag-content"></i></a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không?');"
                                    style="font-size: 1.5rem; color: black;" href=""><i
                                        class="nc-icon nc-basket"></i></a>
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