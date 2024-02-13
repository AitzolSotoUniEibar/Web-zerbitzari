@extends('app')

@section('content')

Kantua
<form action="/kantua" method="POST">
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

    <label for="genero" class="form-label">Genero:</label>
    <input type="text" class="form-control" name="genero">

    <label for="iraupena" class="form-label">Iraupena:</label>
    <input type="text" class="form-control" name="iraupena">

    <label for="dj" class="form-label">Dj:</label>
    <select name="dj">
      @foreach ($djs as $dj)
        <option value="{{$dj->id}}">{{$dj->izena}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Gehitu</button>
</form>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Izena</th>
                <th>Iraupena</th>
                <th>Genero</th>
                <th>DJ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kantuak as $kantua)
            <tr>
                <td>{{ $kantua->izena }}</td>
                <td>{{ $kantua->iraupena }}</td>
                <td>{{ $kantua->genero }}</td>
                <td>{{ $kantua->dj->izena }}</td>
                <td>
                    <a href="{{ route('kantua.edit', [$kantua->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('kantua.destroy', [$kantua->id]) }}" method="POST" style="display: inline;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection