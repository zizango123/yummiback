@extends('layouts.public')

@section('content')
<div class="container">

  <div class="margin_login d-flex justify-content-center" >

    <div class="col-sm-4">
      <h3><center>Admin Login</center></h3>

      <form method="post" action="/dologin">
        {!! csrf_field() !!}

        <div class="form-group">
          <label for="exampleInputEmail1">E-mail address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
        </div>



        <div class="form-group">
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>




      </form>
    </div>

  </div>
</div>
@endsection
