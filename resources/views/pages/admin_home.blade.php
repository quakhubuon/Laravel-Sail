@extends('admin_welcome')
@section('admin_content')
<?php

    use Illuminate\Support\Facades\Auth;
    if(isset(Auth::user()->name)) {
        echo 'Đây là trang chủ của ' . Auth::user()->name;
    }  else {
        echo 'Đây là trang chủ ';
    }
?>
@endsection