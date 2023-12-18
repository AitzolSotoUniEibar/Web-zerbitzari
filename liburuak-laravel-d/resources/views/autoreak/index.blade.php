@extends('app')

@section('content')

Autoreak
<form action="/autoreak" method="POST">
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
  <button type="submit" class="btn btn-primary">Gehitu</button>
</form>

<div>
    @foreach ($autoreak as $autorea)
    <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
            <p class="info"><a href="{{route('autorea-edit',['id' => $autorea->id])}}">{{$autorea->izena}}</a><p>

        </div>

        <div class="col-md-3 d-flex justify-content-end">
            <form action="{{route('autorea-destroy', [$autorea->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Ezabatu</button>
            </form>
        </div>
    </div>
    @endforeach
</div>




@endsection