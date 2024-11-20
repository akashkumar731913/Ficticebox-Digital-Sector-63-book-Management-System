@extends('layouts.auth')
@section('content')

<div class="login-box">
    @if(session('faild'))
      <div class="alert alert-danger" role="alert">{{ session('faild') }}</div>
    @endif
      
    <div class="login-logo">
      <a href="../../index2.html"><b>Register Form</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
  
        <form action="{{route('register')}}" method="post">
          @csrf
          <div class="mb-3">
            <div class="input-group mb-3">
              <input type="text" name="name" class="form-control" placeholder="Name">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            @error('name') <div><small class="text-danger">{{$message}}</small></div>  @enderror
          </div>

          <div class="mb-3">
            <div class="input-group mb-3">
              <input type="text" name="type" class="form-control" value="user">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            @error('type') <div><small class="text-danger">{{$message}}</small></div>  @enderror
          </div>
          
          <div class="mb-3">
            <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            @error('email') <div><small class="text-danger">{{$message}}</small></div>  @enderror
          </div>
          <div class="mb-3">
          <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password') <div><small class="text-danger">{{$message}}</small></div>  @enderror
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        
        <div class="text-center mt-3">
          <a href="{{route('login')}}" class="login-box-msg">Login</a>
        </div>
  
      
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->


@endsection  