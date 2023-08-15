@extends('layouts.company')
@section('content')




<section class="site-section">
    <div class="container">
        <div class="card-header bg-main text-light p-3">
            <h4>Modifier votre profile
                <a href="{{ route('company-profile') }}" class="float-end btn btn-danger">Retour</a>
            </h4>
        </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('become-company-store') }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf

           <div class="row">
                <div class="col-md-6 form-group">
                    <label for="job-title">Nom d'entreprise</label>
                    <input type="text" name="name" value="{{ Auth::user()->company->name }}" class="form-control" id="job-title" placeholder="Nom de la société">
                </div>
                <div class="col-md-6 form-group">
                    <label for="job-title">Domain d'activité</label>
                    <input type="text" name="domain" value="{{ Auth::user()->company->domain }}" class="form-control" id="job-title" placeholder="Domaine d'activité">
                </div>
            </div>
            <div class="form-group">
              <label for="job-title">Email d'entreprise</label>
              <input type="email" name="email" value="{{ Auth::user()->company->email }}" class="form-control" id="job-title" placeholder="Product Designer">
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="job-location">Téléphone</label>
                    <input name="phone" type="number" value="{{ Auth::user()->company->phone }}" class="form-control" id="job-location" placeholder="Numéro">
                  </div>
                  <div class="col-md-6 form-group">
                      <label for="job-location">Fax</label>
                      <input name="fax" type="number" value="{{ Auth::user()->company->fax }}" class="form-control" id="job-location" placeholder="Fax">
                  </div>
            </div>
           <div class="row">
                <div class="col-md-6 form-group">
                    <label for="job-location">Numero d'enregistrement</label>
                    <input name="register_num" type="text" value="{{ Auth::user()->company->register_num }}" class="form-control" id="job-location" placeholder="N°">
                </div>
                <div class="col-md-6 form-group">
                    <label for="job-location">NIF</label>
                    <input name="nif_num" type="text" value="{{ Auth::user()->company->nif_num }}" class="form-control" id="job-location" placeholder="Nif">
                </div>
           </div>


            <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="">Adresse de l'entreprise</label>
                  <textarea name="address" id="" cols="30" rows="2" class="form-control" placeholder="Situer votre entreprise...">{{ Auth::user()->company->address }}</textarea>
                </div>
            </div>


            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">A propos de vous</label>
                <textarea name="about" id="" cols="30" rows="7" class="form-control">{{ Auth::user()->company->about }}</textarea>
              </div>
            </div>


            <div class="form-group">
                <label for="">Logo</label>
                <input name="logo" type="file" class="form-control" id="" placeholder="e.g. 20-12-2022">
            </div>
            {{-- social account --}}
            <h4>Comptes réseaux sociaux </h4>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="job-title">Facebook</label>
                    <input type="text" name="facebook" value="{{ Auth::user()->company->fb_url }}" class="form-control" id="job-title" placeholder="Non utilisateur">
                </div>
                <div class="col-md-4 form-group">
                    <label for="job-title">Linkedin</label>
                    <input type="text" name="linkedin" value="{{ Auth::user()->company->link_url }}" class="form-control" id="job-title" placeholder="Non utilisateur">
                </div>
                <div class="col-md-4 form-group">
                    <label for="job-title">Twitter</label>
                    <input type="text" name="twitter" value="{{ Auth::user()->company->twit_url }}" class="form-control" id="job-title" placeholder="Non utilisateur">
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Save Job">Modifier</button>



          </form>
        </div>


      </div>

    </div>
  </section>
@endsection
