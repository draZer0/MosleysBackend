@extends('layouts.app', [
    'class' => '',
    'elementActive' => ''
])

@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header ">
                      <h5 class="card-title">Voertuig toevoegen</h5>
                      <p class="card-category">Hier kunt u een nieuw voertuig aanmaken.</p>
                  </div>
                  <div class="card-body">
                        @if(session()->get('success'))
                          <div class="alert alert-success">
                            {{ session()->get('success') }}
                          </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <br />
                        @endif

                      <form method="post" action="{{ route('home.store') }}">
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
                              <!-- <input type="text" class="form-control" name="transmissie"/> -->
                              <select class="custom-select" name="transmissie" required>
                                  <option value="" disabled selected>--- {{__('Kies een transmissie')}} ---</option>
                                  <option value="Automaat">Automaat</option>
                                  <option value="Handgeschakeld">Handgeschakeld</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="brandstof">Brandstof:</label>
                              <!-- <input type="text" class="form-control" name="brandstof"/> -->
                              <select class="custom-select" name="brandstof" required>
                                  <option value="" disabled selected>--- {{__('Kies een brandstof')}} ---</option>
                                  <option value="Benzine">Benzine</option>
                                  <option value="Diesel">Diesel</option>
                                  <option value="Elektrisch">Elektrisch</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="kmstand">Km stand:</label>
                              <input type="text" class="form-control" name="kmstand"/>
                          </div>

                          <div class="form-group">
                              <label for="foto">Afbeelding:</label>
                              <input type="text" class="form-control" name="foto"/>
                          </div>

                          <a class="btn btn-default" href="{{ route('page.index', 'dashboard') }}">Terug naar overzicht</a>
                          <button type="submit" class="btn btn-primary">Voertuig toevoegen</button>
                      </form>



                  </div>
              </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush
