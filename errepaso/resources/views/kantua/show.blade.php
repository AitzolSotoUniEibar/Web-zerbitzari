@extends('app')

@section('content')

Kantua
<form action="{{route('kantua.update',[$kantua->id])}}" method="POST">
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
    <input type="text" class="form-control" name="izena" value="{{ $kantua->izena }}">

    <label for="genero" class="form-label">genero:</label>
    <input type="text" class="form-control" name="genero" value="{{ $kantua->genero }}">

    <label for="iraupena" class="form-label">iraupena:</label>
    <input type="text" class="form-control" name="iraupena" value="{{ $kantua->iraupena }}">

    <label for="dj" class="form-label">dj:</label>
    <select name="dj">
      @foreach ($djs as $dj)
        <option value="{{$dj->id}}">{{$dj->izena}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Eguneratu</button>
</form>

@endsection