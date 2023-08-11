@extends('layouts.front')
@section('content')
 <!-- HOME -->
 @include('layouts.inc.banner')

<section class="site-section">
    <div class="container">

        @if ($job->count() > 0)
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
        @else
            <h3>Pas d'offres pour {{ $search_text }}</h3>
        @endif



    </div>
  </section>
@endsection

