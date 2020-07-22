@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update een auto</h1>

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
        <form method="post" action="{{ route('cars.update', $cars->id) }}">
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
                <input type="text" class="form-control" name="categorie" value="{{ $cars->categorie }}" />
            </div>

            <div class="form-group">
                <label for="transmissie">Transmissie:</label>
                <input type="text" class="form-control" name="transmissie" value="{{ $cars->transmissie }}" />
            </div>

            <div class="form-group">
                <label for="brandstof">Brandstof:</label>
                <input type="text" class="form-control" name="brandstof" value="{{ $cars->brandstof }}" />
            </div>

            <div class="form-group">
                <label for="kmstand">Kmstand:</label>
                <input type="text" class="form-control" name="kmstand" value="{{ $cars->kmstand }}" />
            </div>

            <div class="form-group">
                <label for="foto">Afbeelding:</label>
                <input type="text" class="form-control" name="foto" value="{{ $cars->foto }}" />
            </div>

            <a class="btn btn-primary" href="{{ route('page.index', 'dashboard') }}">Terug naar overzicht</a>
            <button type="submit" class="btn btn-primary">Update auto</button>
        </form>
    </div>
</div>
@endsection
