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
                      <h5 class="card-title">Voertuig bewerken</h5>
                      <p class="card-category">Hier kunt u een bestaand voertuig bewerken.</p>
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

                        <form method="post" action="{{ route('home.update', $cars->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                              <label for="merk">Merk:</label>
                                <input type="text" class="form-control" name="merk" value="{{ $cars->merk }}" />
                            </div>

                            <div class="form-group">
                                <label for="type">Type:</label>
                                <input type="text" class="form-control" name="type" value="{{ $cars->type }}" />
                            </div>

                            <div class="form-group">
                                <label for="prijs">Prijs:</label>
                                <input type="text" class="form-control" name="prijs" value="{{ $cars->prijs }}" />
                            </div>

                            <div class="form-group">
                                <label for="bouwjaar">Bouwjaar:</label>
                                <input type="text" class="form-control" name="bouwjaar" value="{{ $cars->bouwjaar }}" />
                            </div>

                            <div class="form-group">
                                <label for="categorie">Categorie:</label>
                                <!-- <input type="text" class="form-control" name="categorie" value="{{ $cars->categorie }}" /> -->
                                <select class="custom-select" name="categorie">
                                    <option value="{{ $cars->categorie }}" selected>{{ $cars->categorie }}</option>
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
                                <!-- <input type="text" class="form-control" name="transmissie" value="{{ $cars->transmissie }}" /> -->
                                <select class="custom-select" name="transmissie">
                                    <option value="{{ $cars->transmissie }}" selected>{{ $cars->transmissie }}</option>
                                    <option value="Automaat">Automaat</option>
                                    <option value="Handgeschakeld">Handgeschakeld</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="brandstof">Brandstof:</label>
                                <!-- <input type="text" class="form-control" name="brandstof" value="{{ $cars->brandstof }}" /> -->
                                <select class="custom-select" name="brandstof">
                                    <option value="{{ $cars->brandstof }}" selected>{{ $cars->brandstof }}</option>
                                    <option value="Benzine">Benzine</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Elektrisch">Elektrisch</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kmstand">Kmstand:</label>
                                <input type="text" class="form-control" name="kmstand" value="{{ $cars->kmstand }}" />
                            </div>

                            <div class="form-group">
                                <label for="foto">Afbeelding:</label>
                                <input type="text" class="form-control" name="foto" value="{{ $cars->foto }}" />
                            </div>

                            <a class="btn btn-default" href="{{ route('page.index', 'dashboard') }}">Terug naar overzicht</a>
                            <button type="submit" class="btn btn-primary">Voertuig bewerken</button>
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
