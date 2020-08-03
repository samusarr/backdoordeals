@extends('layouts.app')


@section('content')
  <div class="container">
    @foreach ($tehtavainfo as $tehtava)
    <br/><br/>
      <div class="ilmoitus-div" style="padding:1em;">
        <div class='row'>
          <div class="col-md-12 white">
            <h3>Toimeksiantaja: {{ $tehtava->kayttajaid }}</h3>
          </div>
        </div><br/>
        <div class='row'>
          <div class="col-md-6 white">
            <h3>Aihealue: {{ $tehtava->aihealue }}</h3>
          </div>
          <div class="col-md-6 white">
            <h3>Ilmoitettu: {{ $tehtava->ilmoituspvm }}</h3>
          </div>
        </div>
        <br/>
        <div class='row'>
          <div class="col-md-6 white">
            <h3>Aihe: {{ $tehtava->aihe }}</h3>
          </div>
          <div class="col-md-6 white">
            <h3>Määräaika: {{ $tehtava->deadline }}</h3>
          </div>
        </div>
        <br/>
        <div class='row'>
          <div class="col-md-12 tarjous-kuvaus white">
            <p>{{ $tehtava->tehtavananto }}</p>
          </div>
        </div>
        <br/>
        <div class='row'>
          <div class="col-md-7 white">
            <h3>Arvosanatavoite: {{ $tehtava->arvosanatavoite }}</h3>
          </div>
          <form method="POST" action="/tarjous">
            @csrf
            <div class="form-row align-items-center">
              <div class="col-auto">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">€</div>
                  </div>
                  <input type="hidden" name="tehtavaid" value="{{ $tehtava->tehtavaid }}">
                  <input type="text" class="form-control" name="tarjous" placeholder="Syötä tarjous" required>
                </div>
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2 btn-dark">Tee tarjous</button>
              </div>
            </div>
          </form>    
        </div>
      </div>
    @endforeach
  </div>
@endsection