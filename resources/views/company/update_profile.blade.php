@extends('layouts.company')
@section('content')




<section class="site-section">
    <div class="container">
        <div class="card-header bg-main text-light p-3">
            <h4>Modifier votre profile
                <a href="{{ route('company-profile') }}" class="float-end btn btn-danger">Retour</a>
            </h4>
        </div>
      <div class="row my-5 justify-content-center">
        <div class="col-lg-8">
          <form class="p-4 p-md-5 border rounded" action="{{ route('become-company-store') }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf

           <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="job-title">Nom d'entreprise</label>
                    <input type="text" name="name" value="{{ Auth::user()->company->name }}" class="form-control @error('name') is-invalid @enderror" id="job-title" placeholder="Nom de la société">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="job-title">Domain d'activité</label>
                    <input type="text" name="domain" value="{{ Auth::user()->company->domain }}" class="form-control @error('domain') is-invalid @enderror" id="job-title" placeholder="Domaine d'activité">
                    @error('domain')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
              <label for="job-title">Email d'entreprise</label>
              <input type="email" name="company_email" value="{{ Auth::user()->company->company_email }}" class="form-control @error('company_email') is-invalid @enderror" id="job-title" placeholder="Product Designer">
              @error('company_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="job-location">Téléphone</label>
                    <input name="phone" type="number" value="{{ Auth::user()->company->phone }}" class="form-control @error('phone') is-invalid @enderror" id="job-location" placeholder="Numéro">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <div class="col-md-6 form-group">
                      <label for="job-location">Fax</label>
                      <input name="fax" type="number" value="{{ Auth::user()->company->fax }}" class="form-control @error('fax') is-invalid @enderror" id="job-location" placeholder="Fax">
                      @error('fax')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
            </div>
           <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label for="job-location">Agrement</label>
                    <input name="agrement" type="text" value="{{ Auth::user()->company->agrement }}" class="form-control @error('agrement') is-invalid @enderror" id="job-location" placeholder="N°">
                    @error('agrement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
           </div>


            <div class="row mb-3 form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Adresse de l'entreprise</label>
                  <textarea name="address" id="" cols="30" rows="2" class="form-control @error('address') is-invalid @enderror" placeholder="Situer votre entreprise...">{{ Auth::user()->company->address }}</textarea>
                  @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>


            <div class="row mb-3 form-group">
              <div class="col-md-12">
                    <label class="text-black" for="">A propos de vous</label>
                    <textarea name="about" id="" cols="30" rows="7" class="form-control @error('about') is-invalid @enderror">{{ Auth::user()->company->about }}</textarea>
                    @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group mb-3">
                <label for="">Logo</label>
                <input name="logo" type="file" class="form-control @error('logo') is-invalid @enderror" id="" placeholder="e.g. 20-12-2022">
                @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
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
                <div class="col-md-6 form-group">
                    <label for="job-title">Site web</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">https://</span>
                        <input type="text" name="site_url" value="{{ Auth::user()->company->site_url }}" class="form-control @error('site_url') is-invalid @enderror" id="job-title" placeholder="Non de domaine">
                    </div>
                    
                    @error('site_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md w-100" value="Save Job">Modifier</button>



          </form>

        </div>


      </div>

    </div>
  </section>
@endsection
