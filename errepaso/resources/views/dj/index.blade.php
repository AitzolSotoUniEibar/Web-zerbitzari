@extends('app')

@section('content')

<h1>DJ</h1>
<form action="/dj" method="POST">
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
    <label for="adina" class="form-label">Adina:</label>
    <input type="text" class="form-control" name="adina">
  </div>

  <button type="submit" class="btn btn-primary">Gehitu</button>
</form>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Izena</th>
                <th>Adina</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($djs as $dj)
            <tr>
                <td>{{ $dj->izena }}</td>
                <td>{{ $dj->adina }}</td>
                <td>
                    <a href="{{ route('dj-edit', ['id' => $dj->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('dj-destroy', ['id' => $dj->id]) }}" method="POST" style="display: inline;">
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