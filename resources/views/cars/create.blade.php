@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Voeg een auto toe</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cars.store') }}">
          @csrf
          <div class="form-group">
              <label for="merk">Merk:</label>
              <input type="text" class="form-control" name="merk"/>
          </div>

          <div class="form-group">
              <label for="type">Type:</label>
              <input type="text" class="form-control" name="type"/>
          </div>

          <div class="form-group">
              <label for="prijs">Prijs:</label>
              <input type="text" class="form-control" name="prijs"/>
          </div>

          <div class="form-group">
              <label for="bouwjaar">Bouwjaar:</label>
              <input type="text" class="form-control" name="bouwjaar"/>
          </div>

          <div class="form-group">
              <label for="categorie">Categorie:</label>
              <!-- <input type="text" class="form-control" name="categorie"/> -->
              <select class="custom-select" name="categorie" required>
                  <option value="" disabled selected>--- {{__('Kies een categorie')}} ---</option>
                  <option value="Compact">Compact</option>
                  <option value="Coupe">Coupe</option>
                  <option value="Motor">Motor</option>
                  <option value="Muscle">Muscle</option>
                  <option value="Off-road">Off-road</option>
                  <option value="Sedan">Sedan</option>
                  <option value="Super">Super</option>
                  <option value="Sport">Sport</option>
                  <option value="Sport classic">Sport classic</option>
                  <option value="SUV">SUV</option>
                  <option value="Van">Van</option>
              </select>
          </div>

          <div class="form-group">
              <label for="transmissie">Transmissie:</label>
              <input type="text" class="form-control" name="transmissie"/>
          </div>

          <div class="form-group">
              <label for="brandstof">Brandstof:</label>
              <input type="text" class="form-control" name="brandstof"/>
          </div>

          <div class="form-group">
              <label for="kmstand">Km stand:</label>
              <input type="text" class="form-control" name="kmstand"/>
          </div>

          <div class="form-group">
              <label for="foto">Afbeelding:</label>
              <input type="text" class="form-control" name="foto"/>
          </div>

          <a class="btn btn-primary" href="{{ route('page.index', 'dashboard') }}">Terug naar overzicht</a>
          <button type="submit" class="btn btn-primary">Bevestig auto</button>
      </form>
  </div>
</div>
</div>
@endsection
