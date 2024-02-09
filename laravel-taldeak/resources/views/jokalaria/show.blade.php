@extends('app')

@section('content')

Jokalaria
<form action="{{route('jokalaria.update',[$jokalaria->id])}}" method="POST">
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
    <input type="text" class="form-control" name="izena" value="{{ $jokalaria->izena }}">

    <label for="adina" class="form-label">Adina:</label>
    <input type="text" class="form-control" name="adina" value="{{ $jokalaria->adina }}">

    <label for="taldea" class="form-label">Taldea:</label>
    <select name="taldea">
      @foreach ($taldeak as $taldea)
        <option value="{{$taldea->id}}">{{$taldea->izena}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Eguneratu</button>
</form>

@endsection