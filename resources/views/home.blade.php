@extends('layouts.app')

@section('content')

<br/><br/>
<div class="container">
  <div class="row">
    <div class="col-md-12 home-div">
      <h1 class="text-center" style="padding: 1rem 0;">Omat ilmoitukset</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 home-div">
      <h1 class="text-center" style="padding: 1rem 0;">Omat tarjoukset</h1>
      <div class="row">
        <div class="col-md-4">
        @foreach ($tarjousinfo as $info)
          <div class="row bg-dark justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto" style="padding: 0.5rem 0 0 0.5rem;">
              <h4 class="text-white">{{ $info->aihe }}</h4>
            </div>
          </div>
        @endforeach
        </div>
        <div class="col-md-4">
        @foreach ($tarjous as $tarjoukset)
          <div class="row bg-dark justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto" style="padding: 0.5rem 0 0 0.5rem;">
              <h4 class="text-white">Tarjouksesi: {{ substr($tarjoukset->tarjous, 0, 15) }}€</h4>
            </div>
          </div>
        @endforeach
        </div>
        <div class="col-md-4">
        @foreach ($tarjous as $tarjoukset)
          <div class="row bg-dark justify-content-between border-bottom rounded-sm">
            <div class="column w-40 my-auto" style="padding: 0.5rem 0 0 0.5rem;">
              <h4 class="text-white"><a class="text-white" href="/tarjous?id={{ $tarjoukset->tehtavaid}}">Näytä tehtävä</a></h4>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    <div class="col-md-4 home-div">
      <h1 class="text-center" style="padding: 1rem 0;">Omat tehtävät</h1>
      @foreach ($tehtava as $tehtavat)
        <div class="row bg-dark justify-content-between border-bottom rounded-sm">
          <div class="column w-40 my-auto" style="padding: 0.5rem 0 0 0.5rem;">
            <h4><a class="text-white" href="/omailmoitus?id={{ $tehtavat->tehtavaid }}">{{ substr($tehtavat->aihe, 0, 15) }}...</a></h4>
          </div>
          <div class="column my-auto">
            <a role="button" class="btn btn-dark" href="delete/{{ $tehtavat->tehtavaid }}">X</a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="col-md-2 home-div">
      <h1 class="text-center" style="padding: 1rem 0;">Creditit</h1>
      <div class="row" style="padding-top: 0.25rem;">
        <div class="navbar-brand" style="margin:auto;">
          <i class="fas fa-user"></i> {{ Auth::user()->credit }}€
        </div>
      </div>
      <div class="row" style="padding-top: 0.25rem;">
        <a role="button" class="btn btn-dark" href="/credit" style="margin:auto;">
          Talleta<i class="far fa-plus-square" style="color:ghostwhite;"></i>
        </a>
      </div><br/>
    </div>
  </div>
</div>

@endsection