@extends('layouts.front')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Emplois | Liste d'emplois</h1>
          <div class="custom-breadcrumbs">
            <a href="{{url('/')}}">Accueil</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Emplois</strong></span>
          </div>
        </div>
      </div>
      {{-- search --}}
      <form action="{{ route('search') }}" method="get" class="search-jobs-form" >
        <div class="row mb-5">
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <input type="text" name="search" class="form-control form-control-lg" required value="{{ Request::get('search') ? $search_text : '' }}" placeholder="Job title, Company...">
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <select class="selectpicker bg-white rounded-2" name="region" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
                <option value="all" {{ Request::get('region') == 'all' ? 'selected' : ''  }}>Toutes</option>
              <option value="Lomé "{{ Request::get('region') == 'Lomé' ? 'selected' : ''  }}>Lomé</option>
              <option value="Kpalimé "{{ Request::get('region') == 'Kpalimé' ? 'selected' : ''  }}>Kpalimé</option>
              <option value="Tsevie"{{ Request::get('region') == 'Tsevie' ? 'Tsevie' : ''  }}>Tsevie</option>
              <option value="Atakpamé" {{ Request::get('region') == 'Atakpamé' ? 'selected' : ''  }}>Atakpamé</option>
              <option value="Kara" {{ Request::get('region') == 'Kara' ? 'selected' : ''  }}>Kara</option>
            </select>
          </div>
          
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <select class="selectpicker bg-white rounded-2" data-style="btn-white btn-lg" name="type" data-width="100%" data-live-search="true" title="Select Job Type" aria-valuetext="tout">
              <option value="Temps partiel"{{ Request::get('type') == 'Temps partiel' ? 'selected' : ''  }}>Temps partiel</option>
              <option value="Temps plein"{{ Request::get('type') == 'Temps plein' ? 'selected' : ''  }}>Temps plein</option>
            </select>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 popular-keywords">
            <h3>Trending Keywords:</h3>
            <ul class="keywords list-unstyled m-0 p-0">
              <li><a href="#" class="">UI Designer</a></li>
              <li><a href="#" class="">Python</a></li>
              <li><a href="#" class="">Developer</a></li>
            </ul>
          </div>
        </div>
      </form>
    </div>
  </section>

<section class="site-section">
    <div class="container">
        @if ($job->count() >0)
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">
                    @if ($job->count()>1)
                    {{ $job->count() }} Emplois répertoriés
                    @else
                    {{ $job->count() }} Emploi répertorié
                    @endif
                </h2>
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
                                <a class="text-black company_name" href="{{route('company_public_profile',$item->user->company->slug)}}"><p class="job-card-company-name">{{ $item->user->company->name }}</p></a>
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



    </div>
  </section>
@endsection

