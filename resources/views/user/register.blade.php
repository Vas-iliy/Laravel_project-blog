@extends('user.layout.layout')
@section('content')
<div class="register-box">
    <div class="register-logo">
        <b>Регистрация</b>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <form action="{{route('register.store')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Full name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                </div>
            </form>
            <a href="#" class="text-center">I already have a membership</a>
        </div>

    </div>
</div>
@endsection
