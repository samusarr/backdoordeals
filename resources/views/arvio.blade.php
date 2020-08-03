@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center" style="padding: 1rem 0;">tarjoajan arviot</h1>
    <hr>
  <div class="row">
    <div class="col-md-6 ilmoitus-div">
    <br/>
    @foreach ($kuvaus as $kuvaus2)
    <h4 class="text-white">{{ $kuvaus2->kuvaus }}</h4>
    @endforeach
    </div>
    <div class="col-md-6">
    @foreach ($arviot as $arvio)
    <h4 class="text-white">{{ $arvio->arvosteluteksti }}</h4>
    <h4 class="text-white">{{ $arvio->arvostelutahdet }} /5</h4>
    <hr>
    @endforeach
    </div>
  </div>
</div>

@endsection