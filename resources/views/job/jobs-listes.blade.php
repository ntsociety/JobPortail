@extends('layouts.front')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Jobs | Liste de jobs</h1>
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

        @if ($job->count() >0)
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">{{ $job->count() }} Job Listed</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach ($job as $item)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('single_job',$item->slug) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('assets/job/couverture/'.$item->cover) }}" alt="Free Website Template by Free-Template.co" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2>{{ $item->title }}</h2>
                            <strong>Adidas</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span> {{ $item->region }}
                            </div>

                            <style>
                                @media (min-width:575px)
                                {
                                    .dispo{
                                        text-align:right;
                                    }
                                }
                            </style>
                            <div class="job-listing-meta dispo">
                                @if ($item->type == "Full Time")
                                <span class="badge badge-success">{{ $item->type }}</span>
                                @else
                                <span class="badge badge-danger">{{ $item->type }}</span>
                                @endif
                                @if ($item->is_available)
                                <p><small class="badge badge-info">Disponible</small></p>
                                @else
                                <p><small class="badge badge-warning text-black">Non Disponible</small></p>
                                @endif
                            </div>
                        </div>

                    </li>
                @endforeach

            </ul>

            <div class="row">
                @foreach ($job as $item)
                    <div class="col-md-4 col-sm-6 col-6">
                        <div class="card mb-3 d-inline-block">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <a href="{{ route('single_job',$item->slug) }}"><img src="{{ asset('assets/company/logo/'.$item->user->company->logo) }}" class="img-fluid rounded-start" alt="..."></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-justify">
                                    <a href="{{ route('single_job',$item->slug) }}"><h5 class="card-title mb-0">{{ $item->title }}</h5></a>
                                        <p class="mt-0">{{ $item->user->company->name }}</p>
                                        <div class="job-listing-location mb-3 mb-sm-0">
                                            <span class="icon-room"></span> {{ $item->region }}
                                            @if ($item->type == "Full Time")
                                            <span class="badge badge-success">{{ $item->type }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ $item->type }}</span>
                                            @endif
                                        </div>
                                        <p class="mt-auto">{{ $item->diplome()->count() }} Diplômé Postulé @if($item->diplome->count() > 1) Diplômés Postulés @endif</p>
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



    </div>
  </section>
@endsection

