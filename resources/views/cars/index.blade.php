@extends('base')

@section('main')
<div class="row">
  <div class="col-sm-12">  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>

<div class="col-sm-12">
    <h1 class="display-3">Cars</h1>
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
@endsection
