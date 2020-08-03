@extends('layouts.app')

@section('content')
<div class="container">
  <br/>
  <h1 class="text-center" style="padding: 1rem 0;">Ilmoita toimeksianto</h1>
  <hr>
  <div class="ilmoitus-div" style="padding:1em;">
  <form method="POST" action="/ilmoitus">
  @csrf
    <div class="row">
      <div class="col-md-6">
        <h2 class="text-center">Tiedot</h2>
        <div class="form-group">
          <label>Aihe:</label>
          <input type="text" name="aihe" class="form-control" placeholder="Tehtävän aihe" required>
        </div>
        <div class="form-group">
          <label>Aihealue:</label>
          <select class="custom-select" name="aihealue" required>
            <option>Biologia</option>
            <option>Kielet</option>
            <option>Maantieto</option>
            <option>Matematiikka</option>
            <option>Ohjelmointi</option>
            <option>Uskonto</option>
          </select>
        </div>
        <div class="form-group">
          <label>Arvosana:</label>
          <select class="custom-select" name="arvosanatavoite" required>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <h2 class="text-center">Aikataulu</h2>
        <div class="form-group">
          <label>Deadline:</label>
          <input type="date" class="form-control" name="pvm" required>
        </div>
        <div class="form-group">
          <label>Deadline:</label>
          <input type="time" class="form-control" name="aika" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 form-group">
        <label>Tehtävänanto:</label>
        <textarea class="kuvaus form-control" type="text" rows="4" placeholder="Kuvaile tehtävänantoa" name="tehtavananto"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <button type="submit" class="btn btn-lg">Ilmoita</button>
      </div>
    </div>
  </form>
  </div>  
</div>

@endsection