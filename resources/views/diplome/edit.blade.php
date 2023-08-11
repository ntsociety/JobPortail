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
              <label for="job-title">E-mail</label>
              <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" id="job-title" placeholder="Adresse email">
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

            {{-- <div class="row form-group">
                <div class="col-md-12">
                    <label class="text-black" for="">Expérience</label>
                    <textarea name="experience" id="ckeditor" cols="30" rows="7" class="form-control" placeholder="Parler un peu de votre entreprise..."></textarea>
                </div>
            </div> --}}

              {{-- <div class="form-group">
                <label for="job-type">Estimation salariale</label>
                <select name="salary" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                  <option value="{{ Auth::user()->diplome->salary }}" selected hidden>{{ Auth::user()->diplome->salary }}</option>
                  <option>1 - 100000F</option>
                  <option>150000 - 200000F</option>
                  <option>250000 - 300000F</option>
                  <option>350000 - 500000F</option>
                </select>
              </div> --}}

              {{-- <div class="form-group">
                <label for="job-type">Genre</label>
                <select name="gender" class="selectpicker border rounded" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                  <option value="{{ Auth::user()->diplome->gender }}" selected hidden>{{ Auth::user()->diplome->gender }}</option>
                  <option>Masculain</option>
                  <option>Feminin</option>
                </select>
              </div> --}}

              {{-- <div class="form-group">
                <label for="job-type">Langue 1</label>
                <select name="lang_court" class="selectpicker border rounded" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                    <option value="{{ Auth::user()->diplome->lang_court }}" selected hidden>{{ Auth::user()->diplome->lang_court }}</option>
                    <option>Français</option>
                    <option>Anglais</option>
                </select>
              </div> --}}

              {{-- <div class="form-group">
                <label for="job-type">Langue 2</label>
                <select name="sec_lang" class="selectpicker border rounded" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                    <option value="{{ Auth::user()->diplome->sec_lang }}" selected hidden>{{ Auth::user()->diplome->sec_lang }}</option>
                    <option>Français</option>
                    <option>Anglais</option>
                </select>
              </div> --}}
            <div class="form-group">
                <label for="">Votre CV</label>
                <input name="cv" type="file" class="form-control" id="" placeholder="e.g. 20-12-2022">
            </div>
            <div class="form-group">
                <label for="">Photo profile</label>
                <input name="photo_profil" type="file" class="form-control" id="" placeholder="e.g. 20-12-2022">
            </div>



            <div class="col-lg-4 ml-auto">
                <div class="row">
                  <div class="col-6">
                    <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">Modifier</button>
                  </div>
                </div>
            </div>


          </form>
        </div>


      </div>

    </div>
  </section>
@endsection
