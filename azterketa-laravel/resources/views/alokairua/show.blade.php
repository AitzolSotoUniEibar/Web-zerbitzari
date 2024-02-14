@extends('app')

@section('content')

Alokairua
<form action="{{route('alokairua.update',[$alokairua->id])}}" method="POST">
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
    <input type="text" class="form-control" name="izena" value="{{$alokairua->izena}}">

    <br>
    <label for="yate" class="form-label">Yate:</label>
    <select name="yate">
      @foreach ($yates as $yate)
        <option value="{{$yate->id}}">{{$yate->izena}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Editatu</button>
</form>

@endsection