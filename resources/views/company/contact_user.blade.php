@extends('layouts.company')
@section('content')
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="container">
        <div class="card-header bg-main text-light p-3">
            <h4>Créer un offre
                <a href="{{ route('offres.index') }}" class="float-end btn btn-danger">Retour</a>
            </h4>
        </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('send_mail_user_store') }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf

            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="job-title">Adresse Email</label>
                    <input type="email" readonly name="email" value="{{ $diplome->email }}" class="form-control @error('title') is-invalid @enderror" id="job-title" placeholder="Titre de l'offre">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="hidden"name="diplomer_id" value="{{ $diplome->id }}">
            </div>
            <div class="row">
                <div class="col-md-6 form-group mb-3">
                    <label for="job-title">Adresse Email</label>
                    <input type="text" name="sujet" value="{{ old('sujet') }}" class="form-control @error('sujet') is-invalid @enderror" id="job-title" placeholder="Sujet">
                    @error('sujet')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row form-group mb-3">
                <div class="col-md-12">
                    <label class="text-black" for="">Message</label>
                    <textarea name="message" id="" cols="30" rows="7" class="form-control @error('message') is-invalid @enderror" placeholder="Message...">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!--company details-->

            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Save Job">Envoyer</button>

          </form>
        </div>


      </div>

    </div>
@endsection
