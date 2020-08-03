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
       <h2>Kirjaudu sisään</h2><br>
    </div>
    <div class="row justify-content-center" style="margin-top:1em;">
        <div class="col-md-8">
            <div class="card">
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Muista minut') }}
                                    </label>
                                </div>
                              @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Unohtuiko salasana?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary nappi">
                                    {{ __('Kirjaudu sisään') }}
                                </button>
                              <a role="button" class="btn btn-primary float-right nappi" href="{{URL('/register')}}"><i class="fas fa-user-plus fa-lg"></i></a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
