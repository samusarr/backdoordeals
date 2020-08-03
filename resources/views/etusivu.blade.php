@extends('layouts.app')

@section('content')

<br/>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center" style="padding: 1rem 0;">Omat ilmoitukset</h1>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-5 home-div">
      <h2 class="text-center" style="padding: 1rem 0;">Omat tehtävät</h2>
      @foreach ($tehtava as $tehtavat)
        <div class="row justify-content-between border-bottom rounded-sm  darkgrey" style=" margin: 0 0.2em">
          <div class="column w-40 my-auto" style="padding: 0.5rem 0 0 0.5rem;">
            <h4><a class="text-white" href="/omailmoitus?id={{ $tehtavat->tehtavaid }}">{{ substr($tehtavat->aihe, 0, 20) }}...</a></h4>
          </div>
          <div class="column my-auto">
            <a role="button" class="btn rasti" href="delete/{{ $tehtavat->tehtavaid }}">X</a>
          </div>
        </div>
      @endforeach
      <br>
    </div>
    <div class="col-md-5 home-div">
      <h2 class="text-center" style="padding: 1rem 0;">Creditit</h2>
      <div class="row" style="padding-top: 0.25rem;">
        <div class="navbar-brand white" style="margin:auto;">
          <i class="fas fa-user"></i> {{ Auth::user()->credit }}€
        </div>
      </div>
      <div class="row" style="padding-top: 0.25rem;">
        <a role="button" class="btn btn-lg nappi" href="/credit" style="margin:auto;">
          Talleta
        </a>
      </div><br/>
    </div>
  </div>
  <br/>
  <br/>
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center" style="padding: 1rem 0;">Omat tarjoukset</h1>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-4 home-div">
      <h2 class="text-center" style="padding: 1rem 0;">Hyväksytyt</h2>
      <div class="row my-auto justify-content-center">
        <div class="col-md-6 my-auto">
        @foreach ($hyvaksytyt as $hyvaksytty)
          <div class="row darkgrey justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto darkgrey" style="padding: 0.5rem 0 0 0.5rem;">
              <h5 class="text-white">{{ substr($hyvaksytty->aihe, 0, 15) }}..</h5>
            </div>
          </div>
        @endforeach
        </div>
        <div class="col-md-2">
        @foreach ($hyvaksytyt as $hyvaksytty)
          <div class="row darkgrey justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto darkgrey" style="padding: 0.5rem 0 0 0.5rem;">
              <h5 class="text-white">{{ $hyvaksytty->tarjous }}€</h5>
            </div>
          </div>
        @endforeach
        </div>
        <div class="col-md-2">
        @foreach ($hyvaksytyt as $hyvaksytty)
          <div class="row darkgrey justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto darkgrey" style="padding: 0.5rem 0 0 0.5rem;">
              <h5 class="text-white"><a class="text-white" href="/tehtavat?id={{ $hyvaksytty->tehtavaid}}">Näytä</a></h5>
            </div>
          </div>
        @endforeach
        </div>
      </div>
      <br>
    </div>
    
    <div class="col-md-4 home-div">
      <h2 class="text-center" style="padding: 1rem 0;">Avoimet</h2>
      <div class="row my-auto justify-content-center">
        <div class="col-md-8 my-auto">
        @foreach ($avoimet as $avoin)
          <div class="row darkgrey justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto darkgrey" style="padding: 0.5rem 0 0 0.5rem;">
              <h5 class="text-white">{{ substr($avoin->aihe, 0, 15) }}..</h5>
            </div>
          </div>
        @endforeach
        </div>
        <div class="col-md-2">
        @foreach ($avoimet as $avoin)
          <div class="row darkgrey justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto darkgrey" style="padding: 0.5rem 0 0 0.5rem;">
              <h5 class="text-white">{{ $avoin->tarjous }}€</h5>
            </div>
          </div>
        @endforeach
        </div>
      </div>
      <br>
    </div>
    
    <div class="col-md-4 home-div">
      <h2 class="text-center" style="padding: 1rem 0;">Hylätyt</h2>
      <div class="row my-auto justify-content-center">
        <div class="col-md-8 my-auto">
        @foreach ($hylatyt as $hylatty)
          <div class="row darkgrey justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto darkgrey" style="padding: 0.5rem 0 0 0.5rem;">
              <h5 class="text-white">{{ substr($hylatty->aihe, 0, 15) }}..</h5>
            </div>
          </div>
        @endforeach
        </div>
        <div class="col-md-2">
        @foreach ($hylatyt as $hylatty)
          <div class="row darkgrey justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto darkgrey" style="padding: 0.5rem 0 0 0.5rem;">
              <h5 class="text-white">{{ $hylatty->tarjous }}€</h5>
            </div>
          </div>
        @endforeach
        </div>
      </div>
      <br>
    </div>
    
  </div>
  <br>
</div>

@endsection