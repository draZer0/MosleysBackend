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
                      <h5 class="card-title">GebruikersEDIT </h5>
                      <p class="card-category">Hier kunt u een nieuw user in het systeem zetten.</p>
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

                        <form method="post" action="{{ route('user.update', $users->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                              <label for="name">Naam:</label>
                                <input type="text" class="form-control" name="name" value="{{ $users->name }}" />
                            </div>

                            <div class="form-group">
                                <label for="role">Role:</label>
                                <!-- <input type="text" class="form-control" name="role" value="{{ $users->role }}" /> -->

                                <select class="custom-select" name="role" required>
                                    <option value="" disabled selected>--- {{__('Kies een role')}} ---</option>
                                    <option value="user">Gebruiker</option>
                                    <option value="employee">Medewerker</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>


                            <a class="btn btn-primary" href="{{ route('user.index', 'dashboard') }}">Terug naar overzicht</a>
                            <button type="submit" class="btn btn-primary">Update user</button>
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
