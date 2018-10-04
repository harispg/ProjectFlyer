@extends('master')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <h1>{!! $flyer->street !!}</h1>
      <h2>{!! $flyer->price !!}</h2>
      <div class="description">
        {!! nl2br($flyer->description) !!}
      </div>
    </div>

    <div class="col-md-6 gallery">
      @foreach($flyer->photos->chunk(4) as $set)
        <div class="row">
          @foreach ($set as $photo)
            <div class="col-md-3 gallery__image">
              {{-- <form method="POST" action="/photos/{{$photo->id}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit">Delete</button>

              </form> --}}
              @if ($user && $user->owns($flyer))

              {!! link_to('Delete', "/photos/{$photo->id}", 'DELETE') !!}
              @endif

              <a href="/{{$photo->path}}"  data-lity>
                <img src="/{{ $photo->thumbnail_path}}" >
              </a>
            </div>
          @endforeach
        </div>
      @endforeach
      @if ($user && $user->owns($flyer))
         <hr>
         <form id="formToAddPhotos" class="dropzone" action="/{{$flyer->zip}}/{{$flyer->street}}/photos" method="post">
           {{ csrf_field() }}
         </form>
      @endif
    </div>
  </div>
@section('scripts.footer')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js" type="text/javascript"></script>
  <script src="/js/lity.min.js"></script>
  <script type="text/javascript">
    Dropzone.options.formToAddPhotos = {
      paramName: 'photo',
      maxFilesize: 3,
      acceptedFiles: '.jpg, .jpeg, .npg, .bmp'
    }
  </script>
@endsection
@endsection
