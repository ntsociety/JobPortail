@extends('layouts.company')
@section('content')

    <div class="container">
        <div class="card-header bg-main text-light p-3">
            <h4>Modifier l'offre
                <a href="{{ route('offres.index') }}" class="float-end btn btn-danger">Retour</a>
            </h4>
        </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('offres.update',$job->id) }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="job-title">Job Title</label>
                    <input type="text" name="title" value="{{ $job->title }}" class="form-control @error('title') is-invalid @enderror" id="job-title" placeholder="Titre de l'offre">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="job-region">Catégorie</label>
                    <select name="cate_id" value="{{ old('cate_id') }}" class="form-select border rounded @error('cate_id') is-invalid @enderror" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                        <option value="{{ $job->category->id }}" selected>{{ $job->category->name }}</option>
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
                <div class="col-md-6 form-group mb-3">
                    <label for="job-region">Job Region</label>
                    <select name="region" class="form-select border rounded @error('region') is-invalid @enderror" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Sélectionner la région">
                        <option selected>{{ $job->region }}</option>
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

                <div class="col-md-6 form-group mb-3">
                    <label for="job-type">Job Type</label>
                    <select name="type" class="form-select border rounded @error('type') is-invalid @enderror" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                        <option selected>{{ $job->type }}</option>
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
                <div class="col-md-6 form-group mb-3">
                    <label for="job-location">Nombre de Poste</label>
                    <input name="vacancy" type="text" value="{{ $job->vacancy }}" class="form-control @error('vacancy') is-invalid @enderror" id="job-location" placeholder="e.g. 3">
                    @error('vacancy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="job-type">Experience</label>
                    <select name="experience" class="form-select border rounded @error('experience') is-invalid @enderror" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                        <option selected>{{ $job->experience }}</option>
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
                <div class="col-md-6 form-group mb-3">
                    <label for="job-type">Salaire</label>
                    <select name="salary" class="form-select border rounded @error('salary') is-invalid @enderror" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                        <option selected>{{ $job->salary }}</option>
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

                <div class="col-md-6 form-group mb-3">
                    <label for="job-type">Sexe</label>
                    <select name="gender" class="form-select border rounded @error('gender') is-invalid @enderror" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                        <option selected>{{ $job->gender }}</option>
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

            <div class="form-group mb-3">
                <label for="job-location">Date limite de dépôt</label>
                <input name="apps_deadline" value="{{ $job->apps_deadline }}" type="text" class="form-control @error('apps_deadline') is-invalid @enderror" id="" placeholder="e.g. 20-12-2022">
                @error('apps_deadline')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row form-group mb-3">
                <div class="col-md-12">
                    <label class="text-black" for="">Job Description</label>
                    <textarea name="description" id="" cols="30" rows="7" class="form-control @error('description') is-invalid @enderror" placeholder="Description de l'offre">{{ $job->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row form-group mb-3">
                <div class="col-md-12">
                    <label class="text-black" for="">Responsibilités</label>
                    <textarea name="responsibilities" id="" cols="30" rows="7" class="form-control @error('responsibilities') is-invalid @enderror" placeholder="Responsibilités...">{{ $job->responsibilities }}</textarea>
                    @error('responsibilities')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row form-group mb-3">
                <div class="col-md-12">
                    <label class="text-black" for="">Education & Experience</label>
                    <textarea name="education_experience" id="" cols="30" rows="7" class="form-control @error('education_experience') is-invalid @enderror" placeholder="Education & Experience...">{{ $job->education_experience }}</textarea>
                    @error('education_experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row form-group mb-3">
                <div class="col-md-12">
                    <label class="text-black" for="">Autres Benifices</label>
                    <textarea name="other_benifits" id="" cols="30" rows="7" class="form-control @error('other_benifits') is-invalid @enderror" placeholder="Autres Benifices...">{{ $job->other_benifits }}</textarea>
                    @error('other_benifits')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col-md-12">
                    <label for="special" class="fw-bold">Cet Offre est toujours Valable ?</label>
                    <input type="checkbox" name="is_available" class="form-check"  {{ $job->is_available ? 'checked':'' }}>
                </div>

            </div>
            <!--company details-->

            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Save Job">Modifier</button>

          </form>
        </div>


      </div>

    </div>
@endsection
