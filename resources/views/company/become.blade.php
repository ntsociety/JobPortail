@extends('layouts.front')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Devenir Employeur</h1>
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
          <form class="p-4 p-md-5 border rounded" action="{{ route('become-company-store') }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf
            <div class="row">

            <div class="col-md-6 form-group">
                <label for="job-title">Nom d'entreprise</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="job-title" value="{{ old('name') }}" placeholder="Nom d'entreprise">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-6 form-group">
                  <label for="job-title">Domain d'activité</label>
                  <input type="text" name="domain" value="{{ old('domain') }}" class="form-control @error('domain') is-invalid @enderror" id="job-title" placeholder="Domain d'activité">
                  @error('domain')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
              <div class="col-md-6 form-group">
                <label for="job-title">Email d'entreprise</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="job-title" placeholder="Email d'entreprise">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="col-md-6 form-group">
                <label for="job-location">Téléphone</label>
                <input name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="job-location" placeholder="Téléphone">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-6 form-group">
                  <label for="job-location">Fax</label>
                  <input name="fax" type="number" class="form-control @error('fax') is-invalid @enderror" value="{{ old('fax') }}" id="job-location" placeholder="Fax">
                  @error('fax')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
              <div class="col-md-6 form-group">
                <label for="job-location">Agrement</label>
                <input name="register_num" type="text" class="form-control @error('register_num') is-invalid @enderror" value="{{ old('register_num') }}" id="job-location" placeholder="Agrement">
                @error('register_num')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

            </div>
            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Adresse de l'entreprise</label>
                  <textarea name="address" id="" cols="30" rows="2" class="form-control @error('address') is-invalid @enderror" placeholder="Situer votre entreprise...">{{ old('address') }}</textarea>
                  @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">A propos de vous</label>
                <textarea name="about" id="" cols="30" rows="7" class="form-control @error('about') is-invalid @enderror" placeholder="Parler un peu de votre entreprise...">{{ old('about') }}</textarea>
                @error('about')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>


            <div class="form-group">
                <label for="">Logo</label>
                <input name="logo" type="file" class="form-control" id="" placeholder="e.g. 20-12-2022">
            </div>
            <!--company details-->


            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Save Job">Envoyer</button>



          </form>
        </div>


      </div>

    </div>
  </section>
@endsection
