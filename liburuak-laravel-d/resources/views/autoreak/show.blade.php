@extends('app')

@section('content')

<div>
  <form action="{{route('autorea-update',['id' => $autorea->id])}}" method="POST">
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
      <input type="text" class="form-control" name="izena" value="{{$autorea->izena}}">
    </div>
    <button type="submit" class="btn btn-primary">Eguneratu</button>
  </form>
</div>

<div>
  @if ($autorea->liburuak->count() > 0)
    @foreach ($autorea->liburuak as $liburua)
      <div>
        <a>{{$liburua->izena}}</a>
      </div>
    @endforeach
  @else
    Ez dago autore honen libururik
  @endif
</div>
@endsection