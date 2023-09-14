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

</style>
<section class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-9 mx-auto">
          <form class="p-4 p-md-5 border rounded" action="{{ route('update-diplome-profile') }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf

            <div class="form-group">
              <label for="job-title">Nom</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" id="job-title" placeholder="Votre nom">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="job-title">Prénom</label>
              <input type="text" name="f_name" class="form-control @error('f_name') is-invalid @enderror" value="{{ Auth::user()->diplome->f_name }}" id="job-title" placeholder="Votre prénom">
              @error('f_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="job-location">Téléphone</label>
              <input name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ Auth::user()->diplome->phone }}" id="job-location" placeholder="e.g. 99000000">
              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Adresse</label>
                  <textarea name="address" id="" cols="30" rows="2" class="form-control @error('address') is-invalid @enderror" placeholder="Votre Adresse...">{{ Auth::user()->diplome->address }}</textarea>
                  @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
            </div>


            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Biographie | Profile</label>
                <textarea name="bio" id="" cols="30" rows="5"  class="form-control @error('bio') is-invalid @enderror" placeholder="Parler un peu de vous...">{{ Auth::user()->diplome->bio }}</textarea>
                @error('bio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
                <label for="job-location">Profession</label>
                <input name="domain" type="text" class="form-control @error('domain') is-invalid @enderror" value="{{ Auth::user()->diplome->domain }}" id="job-location" placeholder="Votre Profile">
                @error('domain')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                    <label for="job-type">Année d'experience</label>
                    <select name="experience_years" class="form-select border rounded @error('experience_years') is-invalid @enderror" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                       
                        @if (Auth::user()->diplome->experience_years)
                        <option selected hidden value="{{Auth::user()->diplome->experience_years}}">{{Auth::user()->diplome->experience_years}}</option>
                        @else
                        <option selected hidden>Sélectionner l'année</option>
                        @endif
                        <option>1-3 années</option>
                        <option>3-6 années</option>
                        <option>6-9 années</option>
                    </select>
                    @error('experience_years')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
            <div class="form-group">
                <label for="">Votre CV</label>
                <input name="cv" type="file" class="form-control @error('cv') is-invalid @enderror" id="" placeholder="e.g. 20-12-2022">
                @error('cv')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Photo profile</label>
                <input name="photo_profil" type="file" class="form-control @error('photo_profil') is-invalid @enderror" id="" placeholder="e.g. 20-12-2022">
                @error('photo_profil')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

             {{-- social account --}}
            <h4>Comptes réseaux sociaux </h4>
            <div class="row mb-3 g-2">
                <div class="col-md-4 form-group">
                    <label for="job-title">Facebook</label>
                    <div class="input-group">
                        <span class="input-group-text">https://</span>
                        <input type="text" name="facebook" value="{{ Auth::user()->diplome->fb_user }}" class="form-control @error('facebook') is-invalid @enderror" id="job-title" placeholder="Non utilisateur">
                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="job-title">Linkedin</label>
                    <div class="input-group">
                        <span class="input-group-text">https://</span>
                        <input type="text" name="linkedin" value="{{ Auth::user()->diplome->link_user }}" class="form-control @error('linkedin') is-invalid @enderror" id="job-title" placeholder="Non utilisateur">
                        @error('linkedin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="job-title">Instagram</label>
                    <div class="input-group">
                        <span class="input-group-text">https://</span>
                        <input type="text" name="instagram" value="{{ Auth::user()->diplome->insta_user }}" class="form-control @error('instagram') is-invalid @enderror" id="job-title" placeholder="Non utilisateur">
                        @error('instagram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Save Job">Mettre à jour</button>
                  

          </form>
        </div>


      </div>

    </div>
  </section>
@endsection
