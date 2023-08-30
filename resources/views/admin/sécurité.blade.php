@extends('layouts.admin')
@section('content')




<section class="site-section">
    <div class="container">
        <div class="card-header bg-main text-light p-3">
            <h4>Compte et Sécurité
                <a href="{{ route('company-profile') }}" class="float-end btn btn-danger">Retour</a>
            </h4>
        </div>
      <div class="row my-5 justify-content-center">
        <div class="col-lg-8 shadow p-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-warning">
                    {{ session()->get('error') }}
                </div>
            @endif
            <h6>E-mail :</h6>
            <p class="user-email w-100">Votre adresse e-mail est <b>{{ Auth::user()->email }}</b></p>
            <h6>Changer votre E-mail</h6>
            <div class="email mb-5">
                <form action="{{ route('admin-update_account_email') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control mb-2 w-100 @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="hidden" name="profil_id" value="{{ Auth::user()->id }}" id="">
                    <button class="btn btn-primary mt-2" type="submit">Savegarder</button>
                </form>
            </div>
            <hr class="bg-black w-100 fw-bolder">
            <h6>Mot de passe</h6>
            <div class="passeword">
            <form action="{{ route('admin-update_account_pass') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- nom --}}
                @if(Auth::user()->password)
                <div class="form-group mb-3">
                    <input id="password" type="password" class="form-control pwstrength @error('current_password') is-invalid @enderror" data-indicator="pwindicator" name="current_password" required autocomplete="new-password" placeholder="Mot de passe Actuel">
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @endif
                <div class="form-group mb-3">
                    <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" required autocomplete="new-password" placeholder="Nouvel Mot de passe">
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <input id="password2" type="password" class="form-control" placeholder="Confirmer mot de passe" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <input type="hidden" name="profil_id" value="{{ Auth::user()->id }}" id="">
                <button class="btn btn-primary mt-2" type="submit">Savegarder</button>
            </form>
        </div>


      </div>

    </div>
  </section>
@endsection
