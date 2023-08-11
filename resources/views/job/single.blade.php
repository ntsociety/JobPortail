@extends('layouts.front')
@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">{{ $job->title }}</h1>
              <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <a href="#">Job</a> <span class="mx-2 slash">/</span>
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
                    <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{ $job->user->company->name }}</span>
                    <span class="m-2"><span class="icon-room mr-2"></span>{{ $job->region }}</span>
                    <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">{{ $job->type }}</span></span>
                </div>
                </div>
            </div>
            </div>

        <div class="row">
            <div class="col-lg-8">
            <div class="mb-5">
                <figure class="mb-5"><img src="{{ asset('assets/category/couverture/'.$job->category->cover) }}" alt="Image" class="img-fluid rounded"></figure>
                <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job Description</h3>
                <p>{{ $job->description }}</p>
            </div>
            <div class="mb-5">
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
            </div>

            <div class="row mb-5">
                <div class="col-6">
                    @if ($saved)
                    <button class="btn btn-block btn-light btn-md" disabled type="submit"><i class="icon-heart"></i>Déjà enregistré</button>
                    @else
                    <form action="{{ route('save_job',$job->id) }}" method="post">
                        @csrf
                        <button class="btn btn-block btn-light btn-md" type="submit"><i class="icon-heart"></i>enregistré</button>
                    </form>
                    @endif
                <!--add text-danger to it to make it read-->
                </div>
                <div class="col-6">
                <a href="{{ route('post_job',$job->slug) }}" class="btn btn-block btn-primary btn-md">Apply Now</a href="{{ route('post_job',$job) }}">
                </div>
            </div>

            </div>
            <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Published on :</strong> {{ $job->created_at }}</li>
                <li class="mb-2"><strong class="text-black">Vacancy :</strong> {{ $job->vacancy }}</li>
                <li class="mb-2"><strong class="text-black">Employment Status :</strong> {{ $job->type }}</li>
                <li class="mb-2"><strong class="text-black">Experience :</strong> {{ $job->experience }}</li>
                <li class="mb-2"><strong class="text-black">Job Location :</strong> {{ $job->region }}</li>
                <li class="mb-2"><strong class="text-black">Salary :</strong> {{ $job->salary }}</li>
                <li class="mb-2"><strong class="text-black">Gender :</strong> {{ $job->gender }}</li>
                <li class="mb-2"><strong class="text-black">Application Deadline :</strong> {{ $job->apps_deadline }}</li>
                <li class="mb-2"><strong class="text-black">Déjà postulé :</strong> {{ $job->diplome->count() }} Diplômé@if($job->diplome->count() > 1)s @endif
                </li>
                </ul>
            </div>

            <div class="bg-light p-3 border rounded">
                <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
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
                <h2 class="section-title mb-2">{{ $job_relat->count() }} Related Jobs</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach ($job_relat as $item)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('single_job',$item->slug) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('assets/job/couverture/'.$item->cover) }}" alt="Image" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                            <h2>{{ $item->title }}</h2>
                            <strong>{{ $item->company }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                            <span class="icon-room"></span> {{ $item->region }}
                            <style>
                                @media (min-width:575px)
                                {
                                    .dispo{
                                        text-align:right;
                                    }
                                }
                            </style>
                            </div>
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

