@extends('master')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">Project Flyer</h1>
  <p class="lead">If you want to sell your home you came to the right place. Enjoy your important expirience</p>
  <hr class="my-4">
  <p>Photo is a thousent words. Show everyone what you are selling.</p>
  <p class="lead">
  <a class="btn btn-primary btn-lg" href="flyers/create" role="button">Create a Flyer</a>
  </p>
	</div>
	  <div class="blog-post">
	    @foreach($flyers as $flyer)
	    <h2 class="blog-post-title"><a href="/{{$flyer->zip}}/{{$flyer->street}}">{{$flyer->street}}</a></h2>
	      {{$flyer->description}}
	    @endforeach
	 </div>

@endsection
