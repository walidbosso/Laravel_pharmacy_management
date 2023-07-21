@extends('layouts/authen')

@section('title')
Gestion de Pharmacie: S'inscrire
@endsection



@section('icon')
handshake
@endsection

@section('content')

<section class="vh-100 bg-image"
style="border-radius: 15px; background-image: url('../images/cap.jpg');">
  
  <div class="mask d-flex align-items-center h-100 gradient-custom-3" style="opacity: 0.9;">
    <div class="container h-100" >
      <div class="row d-flex justify-content-center align-items-center h-100" >
         
        <div class="col-12 col-md-9 col-lg-7 col-xl-6" >
          <div class="card " style="border-radius: 15px; background-image: url('../images/cap.jpg');">
            <div class="card-body p-5" >
              <h2 class="mb-2 text-center">Gestion de la pharmacie</h2>
              <p class="text-center lead">Inscrivez vous</p>
              <div class="text-center pb-5"> 
                <img class="rounded-circle"  alt="User Image" src="../images/logo.png"> </div>
              <form method="POST" action="{{ route('register') }}">
               @csrf

                <div class="form-outline mb-4">
                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  
                  <label class="form-label" for="name">Votre Nom:</label>
                </div>

                <div class="form-outline mb-4">
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  
                  <label class="form-label" for="email">Votre E-mail:</label>
                </div>

                <div class="form-outline mb-4">
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  
                  <label class="form-label" for="password">Votre Mot de passe:</label>
                </div>

                <div class="form-outline mb-4">
                  <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                  
                  <label class="form-label" for="password-confirm">Répetez votre mot de passe</label>
                </div>

                

                <div class="d-flex justify-content-center">

                  
                    
                  <button type="submit"
                    class="btn btn-success btn-lg w-100 shadow-lg">S'inscrire</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Vous avez déjà un compte? <a href="login"
                    class="fw-bold text-body"><u>Se connecter ici</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 
@endsection 
 