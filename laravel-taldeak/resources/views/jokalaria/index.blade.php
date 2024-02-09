@extends('app')

@section('content')

Jokalaria
<form action="/jokalaria" method="POST">
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

    <label for="adina" class="form-label">Adina:</label>
    <input type="text" class="form-control" name="adina">

    <label for="taldea" class="form-label">Taldea:</label>
    <select name="taldea">
      @foreach ($taldeak as $taldea)
        <option value="{{$taldea->id}}">{{$taldea->izena}}</option>
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
                <th>Adina</th>
                <th>Taldea</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jokalariak as $jokalaria)
            <tr>
                <td>{{ $jokalaria->izena }}</td>
                <td>{{ $jokalaria->adina }}</td>
                <td>{{ $jokalaria->taldea->izena }}</td>
                <td>
                    <a href="{{ route('jokalaria.edit', [$jokalaria->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('jokalaria.destroy', [$jokalaria->id]) }}" method="POST" style="display: inline;">
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