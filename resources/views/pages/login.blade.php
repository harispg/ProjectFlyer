@extends('master')
@section('content')
  <h2>Login</h2>
  <hr>
    <form  action="/login" method="post">
      {{ csrf_field() }}

      <div class="row">
        <div class="col-md-4 offset-4">

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
              <button type="submit" name="button">Log me in!</button>
            </div>
            @include('partials.errors')
        </div>

      </div>

    </form>

@endsection
