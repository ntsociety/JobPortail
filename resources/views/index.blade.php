@extends('layouts.front')
@section('content')
{{-- banner --}}
@include('layouts.inc.banner')


    {{-- JobBoard Site Stats --}}

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');">
        <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
            <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
            <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde officiis recusandae sequi excepturi corrupti.</p>
            </div>
        </div>
        <div class="row pb-0 block__19738 section-counter">

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
                <strong class="number" data-number="{{ $diplome->count() }}">0</strong>
            </div>
            <span class="caption">Candidates</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
                <strong class="number" data-number="{{ $job->count() }}">0</strong>
            </div>
            <span class="caption">Jobs Postés</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
                <strong class="number" data-number="5">0</strong>
            </div>
            <span class="caption">Jobs Filled</span>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
            <div class="d-flex align-items-center justify-content-center mb-2">
                <strong class="number" data-number="{{ $company->count() }}">0</strong>
            </div>
            <span class="caption">Entreprises</span>
            </div>


        </div>
        </div>
    </section>


  {{-- Get The Mobile Apps --}}
  <section class="pt-5 bg-image overlay-primary fixed overlay" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center text-center text-md-left mb-5 mb-md-0">
          <h2 class="text-white">Get The Mobile Apps</h2>
          <p class="mb-5 lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit tempora adipisci impedit.</p>
          <p class="mb-0">
            <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-apple mr-3"></span>App Store</a>
            <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span class="icon-android mr-3"></span>Play Store</a>
          </p>
        </div>
        <div class="col-md-6 ml-auto align-self-end">
          <img src="{{ asset('frontend/images/apps.png') }}" alt="Free Website Template by Free-Template.co" class="img-fluid">
        </div>
      </div>
    </div>
  </section>
@endsection
