@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header ">
                      <h5 class="card-title">Gebruikers</h5>
                      <p class="card-category">Hier kunt u een nieuw voertuig in het systeem zetten.</p>
                  </div>
                  <div class="card-body">
                        @if(session()->get('success'))
                          <div class="alert alert-success">
                            {{ session()->get('success') }}
                          </div>
                        @endif

                      <div class="table-responsive">
                          <table class="table table-striped">
                              <thead class=" text-primary">
                                  <th>ID</th>
                                  <th>Naam</th>
                                  <th>Email</th>
                                  <th>Role</th>
                                  <th>Registratie datum</th>
                                  <th>Bewerken</th>
                                  <th>Verwijderen</th>
                              </thead>
                              <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Bewerk</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id)}}" method="post">
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
