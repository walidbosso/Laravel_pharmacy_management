@extends('layouts/authen')

@section('title')
Gestion de Pharmacie: S'inscrire
@endsection



@section('icon')
handshake
@endsection

@section('content')
<section class="vh-100 bg-image"
"  >

<div class="demo-container" >
  <div class="container" >
    <div class="row" >
      
      <div class="col-lg-6 col-12 mx-auto" >
        <div class="text-center pb-5"> <img src="../images/logo.png"> </div>
        <div class="p-5 bg-white rounded shadow-lg" >
          <h2 class="mb-2 text-center">Gestion de la pharmacie</h2>
          <p class="text-center lead">Connectez vous</p>


          <form method="POST" action="{{ route('login') }}">
            @csrf

            <label class="font-500">E-mail</label>
            <input id="email" type="email" class="form-control form-control-lg mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

          

             <label class="font-500">Mot de passe</label>
             <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

             @error('password')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            

<br>
              <div class="row mb-3">
                
                    <div class="">
                       <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Reste connecté') }}
                        </label>
                    </div>
                
            </div>



            <p class="m-0 py-4">
                  

                  @if (Route::has('password.request'))
                      <a class="text-muted" href="{{ route('password.request') }}">
                          {{ __('Mot de passe oublié?') }}
                      </a>
                  @endif
            </p>
          
            


            <button type="submit" class="btn btn-success btn-lg w-100 shadow-lg">
              {{ __('Se connecter') }}
          </button>
            



          </form>
         <div class="text-center pt-4">
          <p class="m-0">Vous n'avez pas de compte? <a href="register" class="text-dark font-weight-bold">S'inscrire</a></p>
        </div>          
        </div>        
      </div>
    </div>
  </div>
</div>
</section>
 
@endsection 
 