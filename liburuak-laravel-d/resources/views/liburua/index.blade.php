@extends('app')

@section('content')

Liburuak
<form action="{{route('liburua.store')}}" method="POST">
@csrf

@if (session('success'))
  <h6 class="alert alert-success">{{session('success')}}</h6>
@endif

@error('izena')
<h6 class="alert alert-success">{{$message}}</h6>
@enderror

  <div class="mb-3">
    <label for="izena" class="form-label">Izena:</label>
    <input type="text" class="form-control" name="izena">

    <label for="deskribapena" class="form-label">Deskribapena:</label>
    <input type="text" class="form-control" name="deskribapena">

    <label for="autorea" class="form-label">Autorea:</label>
    <select name="autorea">
      @foreach ($autoreak as $autorea)
        <option value="{{$autorea->id}}">{{$autorea->izena}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Gehitu</button>
</form>

<div>
    @foreach ($liburuak as $liburua)
    <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
            <p class="info"><a href="{{route('liburua.edit',['liburua' => $liburua->id])}}">{{$liburua->izena}}</a><p>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
            <form action="{{route('liburua.destroy', [$liburua->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Ezabatu</button>
            </form>
        </div>
    </div>
    @endforeach
</div>


@endsection