@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kaikki kayttajaresurssit</div>
@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif

                <div class="panel-body">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">luotu</th>
    </tr>
  </thead>
  <tbody>

@foreach ($kayttajat as $kayttaja)

    <tr class="bg-success">
      <th scope="row">{{ $kayttaja->kayttajaid }}</th>
      <td>{{ $kayttaja->admin }}</td>
      <td>{{ $kayttaja->email }}</td>
	<td>{{ $kayttaja->kuvaus }}</td>
      <td><a href="/scores?id={{ $kayttaja->id }}"> Harkkapalautukset </a></td>
    </tr>

@endforeach

  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection