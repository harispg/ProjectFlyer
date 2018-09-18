@extends('master')

@section('content')
<div class="display-4">
  Create a flyer for your home.
</div>
<hr>
<div class="row">
  @include('flyers.form')
</div>
@endsection
