@extends('app')

@section('content')

Alokairua
<form action="/alokairua" method="POST">
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

    <br>
    <label for="yate" class="form-label">Yate:</label>
    <select name="yate">
      @foreach ($yates as $yate)
        <option value="{{$yate->id}}">{{$yate->izena}}</option>
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
                <th>Yate</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alokairuak as $alokairua)
            <tr>
                <td>{{ $alokairua->izena }}</td>
                <td>{{ $alokairua->yate->izena }}</td>
                <td>
                    <a href="{{ route('alokairua.edit', [$alokairua->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('alokairua.destroy', [$alokairua->id]) }}" method="POST" style="display: inline;">
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