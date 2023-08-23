@extends('layouts.front')
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

      <div class="row align-items-center mb-5">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Offre | Postulé
                <a href="{{ route('diplome-profile-edit') }}" class="btn btn-info btn-sm">Votre profile</a >
              </h2>
            </div>
          </div>
        </div>

      </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('apply_job',$job->id) }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf
            <div class="form-group">
                <label for="job-title">Offre</label>
                <input type="text" name="name" readonly class="form-control" value="{{ $job->title }}" id="job-title" placeholder="Votre nom">
            </div>

            <div class="form-group">
              <label for="job-title">Nom</label>
              <input type="text" name="name" readonly class="form-control" value="{{ Auth::user()->name }}" id="job-title" placeholder="Votre nom">
            </div>
            <div class="form-group">
              <label for="job-title">Prénom</label>
              <input type="text" name="f_name" readonly class="form-control" value="{{ Auth::user()->diplome->f_name }}" id="job-title" placeholder="Votre prénom">
            </div>
            <div class="form-group">
              <label for="job-title">E-mail</label>
              <input type="email" name="email" readonly class="form-control" value="{{ Auth::user()->email }}" id="job-title" placeholder="Adresse email">
            </div>

            <div class="form-group">
                @if(Auth::user()->diplome->cv)
                {{-- <p>Votre CV actuel<a href="{{ asset('assets/diplomé/cv/'.Auth::user()->diplome->cv )}}"> Cliquer ICI</a></p> --}}
                {{-- <embed src="{{ asset('assets/diplomé/cv/'.Auth::user()->diplome->cv )}}" height="500" width="1000"> --}}
                {{-- <iframe src="{{ asset('assets/diplomé/cv/'.Auth::user()->diplome->cv )}}" width="100%" height="600px"></iframe> --}}

                @endif
                <label for="">Changer</label>
                <input name="cv" type="file"
                @if(!Auth::user()->diplome->cv)
                required
                @endif
                class="form-control" id="" placeholder="e.g. 20-12-2022">
            </div>

            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md"  value="Save Job">Postuler</button>



          </form>
        </div>


      </div>

    </div>
  </section>
@endsection
