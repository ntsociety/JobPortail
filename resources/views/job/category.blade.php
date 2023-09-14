@extends('layouts.front')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Jobs | Liste de jobs</h1>
          <div class="custom-breadcrumbs">
            <a href="{{url('/')}}">Accueil</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Catégories</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="site-section">
    <div class="container">
        @include('layouts.inc.search')
        @if ($category->count() >0)
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                <h2 class="section-title mb-2">{{ $category->count() }} Catégories répertorié</h2>
                </div>
            </div>
            <div class="row g-5 job_card">
                @foreach ($category as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="p-relative">
                                @if ($item->cover)
                                <a href="{{ route('viewcategory',$item->slug) }}"><img src="{{ asset('assets/category/couverture/'.$item->cover) }}" class="img-fluid rounded-start img-thumbnail job_img" alt="..."></a>
                              
                                @endif
                               
                            </div>
                            <div class="ps-2">
                                <a href="{{ route('viewcategory',$item->slug) }}"><h5 class="card-title mt-2">{{ $item->name }}</h5></a>
                                <span class="text-small">{{ $item->jobs->count() }} Emploi @if($item->jobs->count() > 1)s @endif</span>
                                <div class="d-flex align-items-center mb-1">
                                    <div class="">
                                        <span class=""></span> {{ $item->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        @else
            <h3>Pas de Catégorie</h3>
        @endif



    </div>
  </section>
@endsection

