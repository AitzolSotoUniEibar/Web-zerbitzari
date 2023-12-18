@extends('app')

@section('content')

<div>
  <form action="{{route('liburua.update',['liburua' => $liburua->id])}}" method="POST">
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
      <input type="text" class="form-control" name="izena" value="{{$liburua->izena}}">

      <label for="deskribapena" class="form-label">Deskribapena:</label>
      <input type="text" class="form-control" name="deskribapena" value="{{$liburua->deskribapena}}">

      <label for="autorea" class="form-label">Autorea:</label>
      <select name="autorea">
        @foreach ($autoreak as $autorea)
          <option value="{{$autorea->id}}">{{$autorea->izena}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Eguneratu</button>
  </form>
</div>
@endsection