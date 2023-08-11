@extends('layouts.front')
@section('content')
     <!-- HOME -->
     <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Post A Job</h1>
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

      <div class="row align-items-center mb-5">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Post A Job</h2>
            </div>
          </div>
        </div>

      </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('offres.store') }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="job-title">Job Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="job-title" placeholder="Titre de l'offre">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="job-region">Catégorie</label>
                    <select name="cate_id" value="{{ old('cate_id') }}" class="selectpicker border rounded @error('cate_id') is-invalid @enderror" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                        <option value="1" selected>Sélectionner la catégorie</option>
                        @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('cate_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="job-region">Job Region</label>
                    <select name="region" class="selectpicker border rounded @error('region') is-invalid @enderror" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Sélectionner la région">
                        <option selected hidden disabled>Sélectionner la région</option>
                        <option>Lomé</option>
                        <option>Kpalimé</option>
                        <option>Tsévie</option>
                        <option>Atakpamé</option>
                        <option>Kara</option>
                        <option>Dapaong</option>
                    </select>
                    @error('region')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="job-type">Job Type</label>
                    <select name="type" class="selectpicker border rounded @error('type') is-invalid @enderror" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                        <option>A temps partiel</option>
                        <option>A temps plein</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="job-location">Nombre de Poste</label>
                    <input name="vacancy" type="text" value="{{ old('vacancy') }}" class="form-control @error('vacancy') is-invalid @enderror" id="job-location" placeholder="e.g. 3">
                    @error('vacancy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="job-type">Experience</label>
                    <select name="experience" class="selectpicker border rounded @error('experience') is-invalid @enderror" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                        <option>1-3 années</option>
                        <option>3-6 années</option>
                        <option>6-9 années</option>
                    </select>
                    @error('experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

           <div class="row">
                <div class="col-md-6 form-group">
                    <label for="job-type">Salaire</label>
                    <select name="salary" class="selectpicker border rounded @error('salary') is-invalid @enderror" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                        <option>50.000 - 100.000F</option>
                        <option>150.000 - 200.000F</option>
                        <option>250.000 - 300.000F</option>
                        <option>350.000 - 500.000F</option>
                        <option>550.000F - et plus</option>
                    </select>
                    @error('salary')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="job-type">Sexe</label>
                    <select name="gender" class="selectpicker border rounded @error('gender') is-invalid @enderror" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                        <option>Masculin</option>
                        <option>Feminin</option>
                        <option>tout</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
           </div>

            <div class="form-group">
                <label for="job-location">Date limite de dépôt</label>
                <input name="apps_deadline" value="{{ old('apps_deadline') }}" type="text" class="form-control @error('apps_deadline') is-invalid @enderror" id="" placeholder="e.g. 20-12-2022">
                @error('apps_deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <label class="text-black" for="">Job Description</label>
                    <textarea name="description" id="" cols="30" rows="7" class="form-control @error('description') is-invalid @enderror" placeholder="Description de l'offre">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <label class="text-black" for="">Responsibilités</label>
                    <textarea name="responsibilities" id="" cols="30" rows="7" class="form-control @error('responsibilities') is-invalid @enderror" placeholder="Responsibilités...">{{ old('responsibilities') }}</textarea>
                    @error('responsibilities')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <label class="text-black" for="">Education & Experience</label>
                    <textarea name="education_experience" id="" cols="30" rows="7" class="form-control @error('education_experience') is-invalid @enderror" placeholder="Education & Experience...">{{ old('education_experience') }}</textarea>
                    @error('education_experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12">
                    <label class="text-black" for="">Autres Benifices</label>
                    <textarea name="other_benifits" id="" cols="30" rows="7" class="form-control @error('other_benifits') is-invalid @enderror" placeholder="Autres Benifices...">{{ old('other_benifits') }}</textarea>
                    @error('other_benifits')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!--company details-->

            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Save Job">Ajouter</button>

          </form>
        </div>


      </div>

    </div>
  </section>
@endsection
