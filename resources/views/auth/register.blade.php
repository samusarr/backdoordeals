@extends('layouts.app')
@section('navbar')
@stop

@section('content')
<div class="container">
    <div class="row d-flex align-items-center justify-content-center" style="margin-top:5%">
        <div class="circle-responsive">
          <div class="circle-content"><h1 class="logo-teksti">SBD</h1></div>
        </div>
    </div>
    <div class="row text-center justify-content-center" style="margin-top:2em;">
       <h2>Rekisteröidy</h2><br>
    </div>
    <div class="row justify-content-center" style="margin-top:2em;">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf

                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Käyttäjätunnus') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>

                                @if ($errors->has('id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Salasana') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Vahvista salasana') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kuvaus') }}</label>

                            <div class="col-md-6">
                              <textarea rows="4" id="kuvaus" class="form-control{{ $errors->has('kuvaus') ? ' is-invalid' : '' }}" name="kuvaus" required></textarea>

                                @if ($errors->has('kuvaus'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kuvaus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      <input type="hidden" name="credit" class="form-control{{ $errors->has('credit') ? ' is-invalid' : '' }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary nappi">
                                    {{ __('Rekisteröidy') }}
                                </button>
                              <a role="button" class="btn btn-primary float-right nappi" href="{{URL('/login')}}"><i class="fas fa-arrow-circle-left fa-lg"></i></a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
