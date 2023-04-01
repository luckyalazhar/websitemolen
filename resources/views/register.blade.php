@extends('layout.auth')
@section('content')
<div class="card card-outline card-primary">
  <div class="card-header text-center">
    <p class="h1"><b>{{$title}}</b></p>
  </div>
  <div class="card-body">
    <p class="login-box-msg">Register a new membership</p>
    <form action="/register" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="text" name="name" id="name" class="form-control @error('name')is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input type="text" name="username" id="username" class="form-control @error('username')is-invalid @enderror" placeholder="Username" value="{{ old('username') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
        @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input type="email" name="email" id="email" class="form-control @error('email')is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
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
        <input type="password" name="password" id="password" class="form-control @error('password')is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
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
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="/login" class="text-center">Login</a>
  </div>
  <!-- /.card-body -->
</div>
@endsection()
