@extends('layouts.front')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Diplômé | Modifier Votre profile</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Post a Job</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>
<style>
    .card{
        border: none !important;
    }
</style>
<section class="site-section">
    <div class="container">
      <div class="row mb-5">
        {{-- <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('update-diplome-profile') }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf

            <div class="form-group">
              <label for="job-title">E-mail</label>
              <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" id="job-title" placeholder="Adresse email">
            </div>

            <div class="col-lg-4 ml-auto">
                <div class="row">
                  <div class="col-6">
                    <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">Modifier</button>
                  </div>
                </div>
            </div>


          </form>
        </div> --}}
        <div class="user-content col-md-8 ms-auto me-auto">
            <div class="card shadow">
                <div class="card-header w-100 text-center bg-light">
                    <h4>Compte</h4>
                    <p>Modifiez vos paramètres de compte et votre mot de passe.</p>
                </div>
                <div class="card-body">
                    <h6>E-mail :</h6>
                    <p class="user-email w-100">Votre adresse e-mail est <b>{{ Auth::user()->email }}</b></p>
                    <h6>Changer votre E-mail</h6>
                    <div class="email mb-5">
                        <form action="{{ route('employe-update_account_email') }}" method="POST">
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
                    <form action="{{ route('employe-update_account_pass') }}" method="POST" enctype="multipart/form-data">
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


      </div>

    </div>
  </section>
@endsection
