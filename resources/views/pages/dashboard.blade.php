@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-bus-front-12 text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Voorraad</p>
                                    <p class="card-title">{{ $cars_count  }}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i>Laatste toegevoegd: {{ $cars->last()->created_at}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-single-02 text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Medewerkers</p>
                                    <p class="card-title">{{ $users_count }}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>Laatste registratie: {{ $users->last()->created_at}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Omzet</p>
                                    <p class="card-title">WIP
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-wrench"></i> In aanbouw
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-satisfied text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Recensies</p>
                                    <p class="card-title">WIP
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-wrench"></i> In aanbouw
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header ">
                      <h5 class="card-title">Voertuig toevoegen</h5>
                      <p class="card-category">Hier kunt u een nieuw voertuig in het systeem zetten.</p>
                  </div>
                  <div class="card-body">
                        @if(session()->get('success'))
                          <div class="alert alert-success">
                            {{ session()->get('success') }}
                          </div>
                        @endif

                      <div>
                        <a href="{{ route('cars.create')}}" class="btn btn-primary btn-wd">Nieuwe auto</a>
                      </div>


                      <div class="table-responsive">
                          <table class="table table-striped">
                              <thead class=" text-primary">
                                  <th>ID</th>
                                  <th>Merk</th>
                                  <th>Type</th>
                                  <th>Prijs</th>
                                  <th>Bouwjaar</th>
                                  <th>Categorie</th>
                                  <th>Transmissie</th>
                                  <th>Brandstof</th>
                                  <th>Kilometerstand</th>
                                  <th>Afbeelding</th>
                                  <th>Bewerken</th>
                                  <th>Verwijderen</th>
                              </thead>
                              <tbody>
                                @foreach($cars as $car)
                                <tr>
                                    <td>{{$car->id}}</td>
                                    <td>{{$car->merk}}</td>
                                    <td>{{$car->type}}</td>
                                    <td>{{$car->prijs}}</td>
                                    <td>{{$car->bouwjaar}}</td>
                                    <td>{{$car->categorie}}</td>
                                    <td>{{$car->transmissie}}</td>
                                    <td>{{$car->brandstof}}</td>
                                    <td>{{$car->kmstand}}</td>
                                    <td>
                                      <img src="{{$car->foto}}" style="max-width:80px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('cars.edit',$car->id)}}" class="btn btn-primary">Bewerk</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" type="submit">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
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
