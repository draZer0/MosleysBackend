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
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Capacity</p>
                                    <p class="card-title">{{ $count  }}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update Now
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
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Revenue</p>
                                    <p class="card-title">$ 1,345
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i> Last day
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
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Errors</p>
                                    <p class="card-title">23
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> In the last hour
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
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Followers</p>
                                    <p class="card-title">+45K
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Update now
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Users Behavior</h5>
                        <p class="card-category">24 Hours performance</p>
                    </div>
                    <div class="card-body ">




                      <div class="row">
                        <div class="col-sm-12">  @if(session()->get('success'))
                          <div class="alert alert-success">
                            {{ session()->get('success') }}
                          </div>
                        @endif
                      </div>

                      <div class="col-sm-12">
                          <div>
                          <a style="margin: 19px;" href="{{ route('cars.create')}}" class="btn btn-primary">Nieuwe auto</a>
                          </div>

                        <table class="table table-striped">
                          <thead>
                              <tr>
                                <td>ID</td>
                                <td>Merk</td>
                                <td>Type</td>
                                <td>Prijs</td>
                                <td>Bouwjaar</td>
                                <td>Categorie</td>
                                <td>Transmissie</td>
                                <td>Brandstof</td>
                                <td>Kmstand</td>
                                <td>Afbeelding</td>
                                <td colspan = 2>Actions</td>
                              </tr>
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
                      <div>



                      </div>




                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
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
