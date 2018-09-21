@extends('master')
@section('content')
  <div class="row">
    <div class="col-md-4">
      <h1>{!! $flyer->street !!}</h1>
      <h2>{!! $flyer->price !!}</h2>
      <div class="description">
        {!! nl2br($flyer->description) !!}
      </div>
    </div>

    <div class="col-md-8 gallery">
      @foreach($flyer->photos->chunk(4) as $set)
        <div class="row">
          @foreach ($set as $photo)
            <div class="col-md-3 gallery__image">
              <img src="/{{ $photo->thumbnail_path}}" alt="">
            </div>
          @endforeach
        </div>
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
