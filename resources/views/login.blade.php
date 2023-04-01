@extends('layout.auth')
@section('content')
<div class="card card-outline card-primary">
  <div class="card-header text-center">
    <p class="h1"><b>{{$title}}</b></p>
  </div>
  <div class="card-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="/login" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="email" name="email" id="email" class="form-control @error('email')is-invalid @enderror" placeholder="Email" autofocus>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input type="password" name="password" id="password" class="form-control @error('password')is-invalid @enderror" placeholder="Password" >
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <p class="mb-0">
      <a href="/register" class="text-center">Register</a>
    </p>
  </div>
  <!-- /.card-body -->
</div>
@endsection()
