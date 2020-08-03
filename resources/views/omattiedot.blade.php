@extends('layouts.app')

@section('content')
  <br/>
    <h1 class="text-center" style="padding: 1rem 0;">Omat tiedot ja niiden muokkaus</h1>
    <div class="container">
      <hr>
      <br>
    <div class="ilmoitus-div" style="padding:1em;">
    <form method="POST" action='/omattiedot'>
      @csrf
      <div class="form-group">
        <label>Käyttäjätunnus:</label>
        <input type="text" class="form-control" name='id' placeholder="{{ Auth::id() }}" disabled>
      </div>
      <div class="form-group">
        <label>Sähköposti:</label>
        <input type="email" class="form-control" name='email' value="{{ Auth::user()->email }}">
      </div>
      <div class="form-group">
        <label>Salasana:</label>
        <input type="password" class="form-control" name='uusisalasana1' placeholder="Syötä uusi salasana"><br/>
        <input type="password" class="form-control" name='uusisalasana2' placeholder="Syötä uusi salasana uudestaan">
      </div>
      <div class="form-group">
        <label>Kuvaus:</label><br/>
        <textarea class="kuvaus form-control" type="text" rows="4" name='kuvaus'>{{ Auth::user()->kuvaus }}</textarea>
      </div>
      <div class="form-group">
        <label>Vahvistus:</label>
        <input type="password" class="form-control" name='vanhasalasana' placeholder="Syötä nykyinen salasana" required><br/>
      </div>
      <button type="submit" class="btn nappi">Tallenna muutokset</button>
    </form>
  </div>
  </div>    
<br>

@endsection