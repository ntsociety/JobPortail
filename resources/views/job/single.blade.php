@extends('layouts.front')
@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">{{ $job->title }}</h1>
              <div class="custom-breadcrumbs">
                <a href="{{url('/')}}">Accueil</a> <span class="mx-2 slash">/</span>
                <a href="{{route('job_liste')}}">Emplois</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>{{ $job->title }}</strong></span>
              </div>
            </div>
          </div>
        </div>
    </section>


    <div class="container">
        @if (\Session::has('message'))
            <div class="alert alert-success">
                <p>{!! \Session::get('message') !!}</p>
            </div>
        @endif
    </div>

    <section class="site-section">
        <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
                <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="{{ asset('assets/company/logo/'.$job->user->company->logo) }}" alt="Image">
                </div>
                <div>
                <h2>{{ $job->title }}</h2>
                <div>
                    <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><a href="{{route('company_public_profile',$job->user->company->slug)}}">{{ $job->user->company->name }}</a></span>
                    <span class="m-2"><span class="icon-room mr-2"></span>{{ $job->region }}</span>
                    <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">{{ $job->type }}</span></span>
                </div>
                </div>
            </div>
            </div>

        <div class="row">
            <div class="col-lg-8">
            <div class="mb-5">
                @if ($job->cover)
                <figure class="mb-5"><img src="{{ asset('assets/job/couverture/'.$job->cover) }}" alt="Image" class="img-fluid rounded"></figure>
                @else
                <figure class="mb-5"><img src="{{ asset('assets/category/couverture/'.$job->category->cover) }}" alt="Image" class="img-fluid rounded"></figure>
                @endif
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
                <p>{!! $job->description !!}</p>
            </div>
            {{-- <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
                <p>{{ $job->responsibilities }}</p>
            </div>

            <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
                <p>{{ $job->education_experience }}</p>
            </div>

            <div class="mb-5">
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
                <p>{{ $job->other_benifits }}</p>
            </div> --}}

            <div class="row mb-5">
                @if ($applied)
                <div class="col-12">
                    <a href="" class="btn btn-block btn-primary btn-md disabled">Déjà Postulé</a href="{{ route('post_job',$job) }}">
                </div>
                @else
                <div class="col-6">
                    <a href="{{ route('post_job',$job->slug) }}" class="btn btn-block btn-primary btn-md">Postulé maintenant</a href="{{ route('post_job',$job) }}">
                </div>
                @endif
            </div>

            </div>
            <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Résumé du poste</h3>
                <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Publié le :</strong> {{ $job->created_at }}</li>
                <li class="mb-2"><strong class="text-black">Nombre de postes :</strong> {{ $job->vacancy }}</li>
                <li class="mb-2"><strong class="text-black">Statut d'emploi :</strong> {{ $job->type }}</li>
                <li class="mb-2"><strong class="text-black">Expérience :</strong> {{ $job->experience }}</li>
                <li class="mb-2"><strong class="text-black">lieu de travail :</strong> {{ $job->region }}</li>
                <li class="mb-2"><strong class="text-black">Salaire :</strong> {{ $job->salary }}</li>
                <li class="mb-2"><strong class="text-black">Genre :</strong> {{ $job->gender }}</li>
                <li class="mb-2"><strong class="text-black">Date limite d'inscription :</strong> {{ $job->apps_deadline }}</li>
                <li class="mb-2"><strong class="text-black">Déjà postulé :</strong> {{ $job->diplome->count() }} Diplômé@if($job->diplome->count() > 1)s @endif
                </li>
                </ul>
            </div>

            <div class="bg-light p-3 border rounded">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Partager</h3>
                <div class="px-3">
                    {{-- <a href="https://www.facebook.com/sharer/sharer.php?u=#url" target="_blank">
                        Share
                    </a> --}}
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('single_job',$job->slug) }}&quote={{ $job->title }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="https://www.twitter.com/intent/tweet?text={{ $job->title }}&url={{ route('single_job',$job->slug) }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ route('single_job',$job->slug) }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                </div>
            </div>
            <div class="bg-light p-3 border rounded mb-4 mt-4">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Catégories</h3>
                <ul class="list-unstyled pl-3 mb-0">
                    @foreach($category as $item)
                        <li class="mb-2"><a href="{{ route('viewcategory',$item->slug) }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            </div>
        </div>
        </div>
    </section>

    {{-- vérifier voir les offres cimilaire --}}
    @if ($job_relat)
        <section class="site-section" id="next">
            <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">
                    @if ($job_relat->count() > 1)
                    {{ $job_relat->count() }} Emplois similaires
                    @else
                    {{ $job_relat->count() }} Emploi similaire
                    @endif
                </h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                <div class="row g-5 job_card">
                    @foreach ($job_relat as $item)
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



            </div>
        </section>
    @endif


    <section class="bg-light pt-5 testimony-full">

        <div class="owl-carousel single-carousel">


            <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                    <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                    <p><cite> &mdash; Corey Woods, @Dribbble</cite></p>
                </blockquote>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/person_transparent_2.png" alt="Image" class="img-fluid mb-0">
                </div>
            </div>
            </div>

            <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center text-center text-lg-left">
                <blockquote>
                    <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                    <p><cite> &mdash; Chris Peters, @Google</cite></p>
                </blockquote>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-right">
                <img src="images/person_transparent.png" alt="Image" class="img-fluid mb-0">
                </div>
            </div>
            </div>

        </div>

    </section>
@endsection

