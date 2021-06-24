<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('APP_NAME',"Blueapple")}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('public/backend/images/find-me.png')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/backend/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('public/backend/images/clean.jpg');background-repeat: no-repeat;background-size:cover;">
<div class="login-box">
    <div class="login-logo">
        <a href="#">{{env('APP_NAME',"Blueapple")}}</a>
    </div>
    <!-- /.login-logo -->

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in</p>
            @include('admin.partials.messages')
            <form action="{{route('Admin.Login')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required/>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required/>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span><i class="fa fa-eye" id="togglePassword"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                  
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="row mt-1">
                  
                    <!-- /.col -->
                    <div class="col-12">
                        <a href="{{url('admin/register')}}" class="btn btn-success btn-block">Sign Up</a>
                    </div>
                    <!-- /.col -->
                </div>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@include('admin.partials.footer_js')
<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>
