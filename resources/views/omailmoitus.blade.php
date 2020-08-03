@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
    @foreach ($ilmoitusinfo as $ilmoitus)
      <div class="col-md-6"><br/><br/>
        <div class="column ilmoitus-div" style="padding-left:1em; padding-top:1em;">
        <div class='row'>
          <div class="col-md-5 text-center white">
            <h3>Aihealue:<br/>{{ $ilmoitus->aihealue }}</h3>
          </div>
          <div class="col-md-5 text-center white">
            <h3>Ilmoitettu:<br/>{{ $ilmoitus->ilmoituspvm }}</h3>
          </div>
        </div>
        <br/>
        <div class='row'>
          <div class="col-md-5 text-center white">
            <h3>Aihe:<br/>{{ $ilmoitus->aihe }}</h3>
          </div>
          <div class="col-md-5 text-center white">
            <h3>Määräaika:<br/>{{ $ilmoitus->deadline }}</h3>
          </div>
        </div><br/>
        <div class='row'>
          <div class="col-md-12 tarjous-kuvaus white" style="word-wrap:break-word;">
            <h3>Tehtävänanto:</h3>
            <p>{{ $ilmoitus->tehtavananto }}</p>
          </div>
        </div><br/>
          <div class='row'>
            <div class="col-md-7 white">
              <h3>Arvosanatavoite: {{ $ilmoitus->arvosanatavoite }}</h3>
            </div>          
          </div>
        </div>
        <br>
      </div>
      @endforeach
      <div class="col-md-6"><br><br><br>
        <div class="row">
          <div class="table-responsive col-md-12">
          <table class="table table-striped text-center table-bordered ilmoitus-div">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Tarjoaja</th>
                <th scope="col">Tarjous</th>
                <th scope="col" colspan="2">Pvm</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($tarjousinfo as $tarjous)
            <tr>
              <th scope="row"><a href="/arvio?id={{ $tarjous->kayttajaid }}">{{ $tarjous->kayttajaid }}</a></th>
              <td colspan="2">{{ $tarjous->tarjous }}€</td>
              <td>{{ $tarjous->tarjouspvm }}</td>
              <td>
              <form method="get" action="{{action('HyvaksyTarjousController@hyvaksytarjous') }}">
              @csrf
              <input type="hidden" name="tehtavaid" value="{{ $ilmoitus->tehtavaid }}">
              <input type="hidden" name="tarjouksentekija" value="{{ $tarjous->kayttajaid }}">
              <input type="hidden" name="tarjottusumma" value="{{ $tarjous->tarjous }}">
                <button type="submit" class="btn nappi float-right">
                  <i class="far fa-check-circle fa-lg"></i>
                </button>
              </form>
              </td>
              <td>
              <form method="post" action="{{action('HylkaaTarjousController@hylkaatarjous') }}">
              @csrf
              <input type="hidden" name="tehtavaid" value="{{ $ilmoitus->tehtavaid }}">
                <button type="submit" class="btn nappi float-right">
                  <i class="far fa-times-circle fa-lg"></i>
                </button>
              </form>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
          </div>  
        </div>
        @foreach ($ilmoitusinfo as $ilmoitus)
        <div class="row">
          <a role="button" class="btn nappi shade" href="/palaute?id={{ $ilmoitus->tehtavaid }}" style="margin: 2rem 0 0 12.25rem;">
            <h3>Anna palaute</h3>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection