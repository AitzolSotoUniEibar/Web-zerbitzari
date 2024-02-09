@extends('app')

@section('content')

<h1>Taldea Editatu</h1>
<form action="{{route('taldea-update',['id' => $taldea->id])}}" method="POST">
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
    <input type="text" class="form-control" name="izena" value="{{ $taldea->izena }}">
  </div>
  <div class="mb-3">
    <label for="liga" class="form-label">Liga:</label>
    <input type="text" class="form-control" name="liga" value="{{ $taldea->liga}}">
  </div>

  <button type="submit" class="btn btn-primary">Editatu</button>
</form>

<div>
  @if ($taldea->players->count() > 0)
    @foreach ($taldea->players as $player)
      <div>
        <a>{{$player->izena}}</a>
      </div>
    @endforeach
  @else
    Ez dago jokalaririk
  @endif
</div>

@endsection
