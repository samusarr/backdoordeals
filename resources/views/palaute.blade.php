@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h1 class="text-center" style="padding: 1rem 0;">Palaute</h1>
  <hr>
  <div class="ilmoitus-div" style="padding:1em;">
  <form method="POST" action="/palaute">
  @csrf
    <div class="row">
      <h2 class="text-center">Anna palaute vasta saatuasi valmiin tehtävän</h2>
      <div class="col-md-6">
        <div class="form-group">
          <label>Arvio:</label>
          <select class="custom-select" name="arvio" required>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 form-group">
        <label>Palaute:</label>
        <textarea class="kuvaus" rows="4" placeholder="Kuvaile tehtävänantoa" name="palaute"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <button type="submit" class="btn btn-lg">Lähetä</button>
      </div>
    </div>
    @foreach ($tarjoukset as $tarjous)
    <input type="hidden" name="tehtavaid" value="{{ $tarjous->tehtavaid }}">
    <input type="hidden" name="kayttajaid" value="{{ $tarjous->kayttajaid }}">
    <input type="hidden" name="hinta" value="{{ $tarjous->tarjous }}">
    @endforeach
    @foreach ($kayttajakredits as $kayttajakredit)  
        <input type="hidden" name="kredits" value="{{ $kayttajakredit->credit }}">
    @endforeach
  </form>
  </div>  
</div>

@endsection