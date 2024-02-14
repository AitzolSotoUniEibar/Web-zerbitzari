@extends('app')

@section('content')

<h1>Yatea Editatu</h1>
<form action="{{route('yateak-update',['id' => $yate->id])}}" method="POST">
@method('PATCH')
@csrf

@if (session('success'))
  <h6 class="alert alert-success">{{session('success')}}</h6>
@endif

@error('izena')
<h6 class="alert alert-success">{{$message}}</h6>
@enderror

  <div class="mb-3">
    <label for="izena" class="form-label">Izena:</label>
    <input type="text" class="form-control" name="izena" value="{{ $yate->izena }}">
  </div>
  <div class="mb-3">
    <label for="urtea" class="form-label">Urtea:</label>
    <input type="text" class="form-control" name="urtea" value="{{ $yate->urtea}}">
  </div>

  <div class="mb-3">
    <label for="kopurua" class="form-label">Bidaiari kopurua:</label>
    <input type="text" class="form-control" name="kopurua" value="{{ $yate->kopurua}}">
  </div>

  <button type="submit" class="btn btn-primary">Editatu</button>
</form>


@endsection