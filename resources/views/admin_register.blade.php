<!DOCTYPE html>
<html>

<head>
    <title>Register Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('BE/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 d-none d-md-block image-container">
                <img height="820px" width="1000px" src="{{ asset('BE/assets/img/bg.jpg') }}">
            </div>

            <div class="col-lg-6 col-md-6 form-container">
                <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
                    <div class="logo mb-3">
                        <img src="{{ asset('BE/assets/img/logo.png') }}" width="150px">
                    </div>
                    <div class="heading mb-4">
                        <h4>Create an account</h4>
                    </div>
                    <form method="post" action="{{ URL::to ('admin/register')}}">
                        {{ csrf_field() }}
                        <div class="form-input">
                            <span><i class="fa fa-user"></i></span>
                            <input type="text" name="name" placeholder="Full Name" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cb1">
                                    <label class="custom-control-label text-white" for="cb1">I agree</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="forget.html" class="forget-link">Forget Password</a>
                            </div>
                        </div>
                        <div class="text-left mb-3">
                            <button type="submit" class="btn">Register</button>
                        </div>
                        <div class="text-center mb-2">
                            <div class="mb-3" style="color: #777">or register with</div>

                            <a href="" class="btn btn-social btn-facebook">facebook</a>

                            <a href="" class="btn btn-social btn-google">google</a>

                            <a href="" class="btn btn-social btn-twitter">twitter</a>
                        </div>
                        <div style="color: #777">Already have an account
                            <a href="login.html" class="login-link">Login here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>