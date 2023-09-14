@extends('layouts.front')
@section('content')
 <!-- HOME -->
 @include('layouts.inc.banner')

<section class="site-section">
    <div class="container">

        @if ($job->count() > 0)
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">{{ $job->count() }} Emploi répertorié</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                <div class="row g-5 job_card">
                    @foreach ($job as $item)
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
                                    <a class="text-black company_name" href="{{route('company_public_profile',$item->user->company->slug)}}"><p class="">{{ $item->user->company->name }}</p></a>
                                </div>
                                <div class="ps-2">
                                    <a href="{{ route('single_job',$item->slug) }}"><h5 class="card-title mt-2">{{ $item->title }}</h5></a>
                                    <span class="text-small">{{ $item->diplome()->count() }} Diplômé Postulé @if($item->diplome->count() > 1) Diplômés Postulés @endif</span>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </ul>
        @else
            <h3>Pas d'offres pour {{ $search_text }}</h3>
        @endif



    </div>
  </section>
@endsection

