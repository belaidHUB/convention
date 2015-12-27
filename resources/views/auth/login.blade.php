@extends('app')

@section('content')
<!-- resources/views/auth/login.blade.php -->
<div class="row">
    <div class="col-md-offset-4 col-md-4 style-background" style="padding-top: 16px">
    <form method="POST" action="{{ url('auth/login')}}">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button  class="btn btn-success pull-right" type="submit" style="border-radius:0px;margin-bottom: 16px;">Connexion</button>
    </div>
</form>
    </div>
</div>
@endsection