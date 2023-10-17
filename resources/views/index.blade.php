@extends('layouts.front')
@section('content')
{{-- banner --}}
@include('layouts.inc.banner')

    <div class="container my-5">
      {{-- offres récents --}}
      @if ($recent_job->count() >0)
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">
              @if ($recent_job->count()>1)
              {{ $recent_job->count() }} Offres récements ajoutés
              @else
              {{ $recent_job->count() }} Offre récement ajouté
              @endif
            </h2>
            </div>
        </div>
        <div class="row g-5 job_card">
            @foreach ($recent_job as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="p-relative">
                            @if ($item->cover)
                            <a href="{{ route('single_job',$item->slug) }}"><img src="{{ asset('assets/job/couverture/'.$item->cover) }}" class="img-fluid rounded-start img-thumbnail job_img" alt="..."></a>
                            @else
                            <a href="{{ route('single_job',$item->slug) }}"><img src="{{ asset('assets/category/couverture/'.$item->category->cover) }}" class="img-fluid rounded-start img-thumbnail job_img" alt="..."></a>
                            @endif
                            {{-- company --}}
                            <a class="text-black" href="{{route('company_public_profile',$item->user->company->slug)}}">
                                <img src="{{asset('assets/company/logo/'.$item->user->company->logo)}}" class="img-fluid logo_img_compan" alt="">
                            </a>
                            <a class="text-black company_name" href="{{route('company_public_profile',$item->user->company->slug)}}"><p class="job-card-campany-name">{{ $item->user->company->name }}</p></a>
                        </div>
                        <div class="ps-2">
                            <a href="{{ route('single_job',$item->slug) }}"><h5 class="job-card-title mt-2">{{ $item->title }}</h5></a>
                            
                            <div class="d-flex align-items-center mb-1">
                                <div class="">
                                    <span class="icon-room"></span> {{ $item->region }}
                                </div>
                                <div class="ms-auto pe-2">
                                    @if ($item->type == "Full Time")
                                    <span class="badge badge-success">{{ $item->type }}</span>
                                    @else
                                    <span class="badge badge-danger">{{ $item->type }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1">
                                <div class="">
                                  <span class="text-small">@if($item->diplome->count() > 1) Diplômés Postulés @else {{ $item->diplome->count() }} Diplômé Postulé @endif</span>
                                </div>
                                <div class="ms-auto pe-2">
                                    <a href="{{route('post_job',$item->slug)}}" class="btn btn-sm btn-success">{{ _("Postuler") }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

      @else
        <h3>Pas de job</h3>
      @endif
      {{-- find --}}
    </div>
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
