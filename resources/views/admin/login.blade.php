@extends('layouts/MasterLogin')
@section('title', 'login')
@section('main')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <p class="login-box-msg">Login membership</p>

            <form action="" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
                <div class="input-group mb-3">
                    <input type="password" class="form-control " name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="rmb" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
                <a href="{{route('home.index')}}" class="btn btn-block btn-primary">
                    <i class="fas fa-home mr-2"></i> Trang Chủ
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="{{route('forgot')}}">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="{{route('register')}}" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
