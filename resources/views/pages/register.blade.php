@extends('master')

@section('content')
<h2>Registration</h2>
<hr>
  <form  action="/register" method="post">
    {{ csrf_field() }}

    <div class="row">
      <div class="col-md-6 offset-3">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control">
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm your password:</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>

          <div class="form-group">
            <button type="submit" name="button">Sing up!</button>
          </div>
          @include('partials.errors')
      </div>

    </div>

  </form>

@endsection
