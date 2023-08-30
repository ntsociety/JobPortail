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

<section class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('update-diplome-profile') }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf

            <div class="form-group">
              <label for="job-title">Nom</label>
              <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" id="job-title" placeholder="Votre nom">
            </div>
            <div class="form-group">
              <label for="job-title">Prénom</label>
              <input type="text" name="f_name" class="form-control" value="{{ Auth::user()->diplome->f_name }}" id="job-title" placeholder="Votre prénom">
            </div>

            <div class="form-group">
              <label for="job-location">Téléphone</label>
              <input name="phone" type="number" class="form-control" value="{{ Auth::user()->diplome->phone }}" id="job-location" placeholder="e.g. 3">
            </div>

            {{-- <div class="form-group">
              <label for="job-location">Date de Naissance</label>
              <input name="birth_day" type="text" class="form-control" value="{{ Auth::user()->diplome->birth_day }}" id="job-location" placeholder="e.g. 01-01-1970">
            </div> --}}

            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Adresse</label>
                  <textarea name="address" id="" cols="30" rows="2" class="form-control" placeholder="Situer votre entreprise...">{{ Auth::user()->diplome->address }}</textarea>
                </div>
            </div>


            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Biographie | Profile</label>
                <textarea name="bio" id="" cols="30" rows="7"  class="form-control" placeholder="Parler un peu de votre entreprise...">{{ Auth::user()->diplome->bio }}</textarea>
              </div>
            </div>

            {{-- <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Education</label>
                <textarea name="education" id="" cols="30" rows="7" class="form-control">
                    @if (Auth::user()->diplome->education )
                    {!! Auth::user()->diplome->education !!}
                    @endif
                </textarea>
              </div>
            </div> --}}

            <div class="form-group">
                <label for="job-location">Profession</label>
                <input name="domain" type="text" class="form-control" value="{{ Auth::user()->diplome->domain }}" id="job-location" placeholder="e.g. 01-01-1970">
            </div>

            <div class="form-group">
                <label for="job-location">Année d'experience</label>
                <input name="experience_years" type="number" class="form-control" value="{{ Auth::user()->diplome->experience_years }}" id="job-location" placeholder="Années d'expériences">
            </div>

            
            <div class="form-group">
                <label for="">Votre CV</label>
                <input name="cv" type="file" class="form-control" id="" placeholder="e.g. 20-12-2022">
            </div>
            <div class="form-group">
                <label for="">Photo profile</label>
                <input name="photo_profil" type="file" class="form-control" id="" placeholder="e.g. 20-12-2022">
            </div>

             {{-- social account --}}
             <h4>Comptes réseaux sociaux </h4>
             {{-- social account --}}
            <h4>Comptes réseaux sociaux </h4>
            <div class="row mb-3 g-3">
                <div class="col-md-6 form-group">
                    <label for="job-title">Facebook</label>
                    <div class="input-group">
                        <span class="input-group-text">https://</span>
                        <input type="text" name="facebook" value="{{ Auth::user()->company->fb_url }}" class="form-control @error('facebook') is-invalid @enderror" id="job-title" placeholder="Non utilisateur">
                    </div>
                    @error('facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="job-title">Linkedin</label>
                    <div class="input-group">
                        <span class="input-group-text">https://</span>
                        <input type="text" name="linkedin" value="{{ Auth::user()->company->link_url }}" class="form-control @error('linkedin') is-invalid @enderror" id="job-title" placeholder="Non utilisateur">
                    </div>
                    @error('linkedin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="job-title">Twitter</label>
                    <div class="input-group">
                        <span class="input-group-text">https://</span>
                        <input type="text" name="twitter" value="{{ Auth::user()->company->twit_url }}" class="form-control @error('twitter') is-invalid @enderror" id="job-title" placeholder="Non utilisateur">
                    </div>
                    @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Save Job">Modifier</button>
                  

          </form>
        </div>


      </div>

    </div>
  </section>
@endsection
