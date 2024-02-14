@extends('app')

@section('content')

<h1>Yateak</h1>
<form action="/yateak" method="POST">
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
    <label for="urtea" class="form-label">Urtea:</label>
    <input type="text" class="form-control" name="urtea">
  </div>
  <div class="mb-3">
    <label for="kopurua" class="form-label">Bidaiari kopurua:</label>
    <input type="text" class="form-control" name="kopurua">
  </div>

  <button type="submit" class="btn btn-primary">Gehitu</button>
</form>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Izena</th>
                <th>Urtea</th>
                <th>Bidaiari Kopurua</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($yateak as $yate)
            <tr>
                <td>{{ $yate->izena }}</td>
                <td>{{ $yate->urtea }}</td>
                <td>{{ $yate->kopurua }}</td>
                <td>
                    <a href="{{ route('yateak-edit', ['id' => $yate->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection