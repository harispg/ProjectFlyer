@extends('master')
@section('content')
  <div class="row">
    <div class="col-md-3">
      <h1>{!! $flyer->street !!}</h1>
      <h2>{!! $flyer->price !!}</h2>
      <div class="description">
        {!! nl2br($flyer->description) !!}
      </div>
    </div>

  <div class="col-md-9">
    @foreach ($flyer->photos as $photo)
      <img src="/{{ $photo->path }}" alt="">
    @endforeach
  </div>

  </div>

 <form id="formToAddPhotos" class="dropzone" action="/{{$flyer->zip}}/{{$flyer->street}}/photos" method="post">
   {{ csrf_field() }}
 </form>
@section('scripts.footer')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js" type="text/javascript"></script>
  <script type="text/javascript">
    Dropzone.options.formToAddPhotos = {
      paramName: "photo",
      maxFilesize: 3,
      acceptedFiles: '.jpg, .jpeg, .npg, .bmp'
    }
  </script>
@endsection
@endsection
