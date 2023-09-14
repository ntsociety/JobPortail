@extends('layouts.front')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Emploi | Liste d'Emploi</h1>
          <div class="custom-breadcrumbs">
            <a href="{{url('/')}}">Accueil</a> <span class="mx-2 slash">/</span>
            <a href="{{route('category')}}">Catégories</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>{{$category->name}}</strong></span>
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

        @else
            <h3>Pas de job</h3>
        @endif



    </div>
  </section>
@endsection

