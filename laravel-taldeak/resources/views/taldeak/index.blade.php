@extends('app')

@section('content')

<h1>Taldeak</h1>
<form action="/taldeak" method="POST">
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
  </div>
  <div class="mb-3">
    <label for="liga" class="form-label">Liga:</label>
    <input type="text" class="form-control" name="liga">
  </div>

  <button type="submit" class="btn btn-primary">Gehitu</button>
</form>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Izena</th>
                <th>Liga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taldeak as $taldea)
            <tr>
                <td>{{ $taldea->izena }}</td>
                <td>{{ $taldea->liga }}</td>
                <td>
                    <a href="{{ route('taldea-edit', ['id' => $taldea->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('taldea-destroy', ['id' => $taldea->id]) }}" method="POST" style="display: inline;">
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