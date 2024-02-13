@extends('app')

@section('content')

<h1>Dj Editatu</h1>
<form action="{{route('dj-update',['id' => $dj->id])}}" method="POST">
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
    <input type="text" class="form-control" name="izena" value="{{ $dj->izena }}">
  </div>
  <div class="mb-3">
    <label for="adina" class="form-label">Adina:</label>
    <input type="text" class="form-control" name="adina" value="{{ $dj->adina}}">
  </div>

  <button type="submit" class="btn btn-primary">Editatu</button>
</form>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Izena</th>
                <th>Iraupena</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kantuak as $kantua)
            <tr>
                <td>{{ $kantua->izena }}</td>
                <td>{{ $kantua->iraupena }}</td>
                <td>{{ $kantua->genero }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection