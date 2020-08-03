@extends('layouts.app')

@section('navbar')
@stop

@section('content')
  <div class="container register-block">
    <h2>Rekisteröityminen</h2>
    <form>
      <div class="form-group">
        <label>Käyttäjänimi</label>
        <input type="text" class="form-control" placeholder="Syötä käyttäjänimi">
      </div>
      <div class="form-group">
        <label>Sähköposti</label>
        <input type="email" class="form-control" placeholder="Syötä sähköpostiosoite">
      </div>
      <div class="form-group">
        <label>Salasana</label>
        <input type="password" class="form-control" placeholder="Syötä salasana">
      </div>
      <div class="form-group">
        <label>Toista salasana</label>
        <input type="password" class="form-control" placeholder="Toista salasana">
      </div>
      <div class="form-group">
        <label>Kuvaus</label>
        <textarea rows="4" class="form-control" placeholder="Kerro osaamisestasi ja taustastasi"></textarea>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Olen ihminen</label>
      </div><br>
      <button type="submit" class="btn btn-primary">Rekisteröidy</button><br>
    </form>
  </div>
@endsection