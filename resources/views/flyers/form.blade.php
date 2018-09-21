
    <form enctype="multipart/form-data" action="/flyers" method="post">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="street">Street</label>
            <input type="text" name="street" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="zip">Zip</label>
            <input type="text" name="zip" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" name="country">
              @foreach ($countries as $code => $country)
                <option value="{{$code}}">{{$country}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="state">State</label>
            <input type="text" name="state" class="form-control" required>
          </div>

      </div>
  <div class="col-md-6">

    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" name="price" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control" rows="10" cols="80" required></textarea>
    </div>
      @include('partials.errors')
    </div>
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Create flyer</button>
        </div>
      </div>
    </div>
  </form>
