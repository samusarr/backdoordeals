@extends('layouts.app')

@section('content')

<div class="container" >
  <br/>
  <h2 style="text-align: center;">Lisää credittejä tilillesi</h2>
  <br/>
  <div class="col-md-6" style="margin: 0 auto;">
    <form method="post" action='/credit'>
      @csrf
      <div class="form-group">
        <label>Syötä lisättävä summa:</label>
        <input type="text" class="form-control" name="credit" placeholder="50" required><br/>
        <button type="submit" class="btn btn-primary mb-2 btn-dark">Osta</button>
      </div>
    </form>
  </div>
</div>

@endsection