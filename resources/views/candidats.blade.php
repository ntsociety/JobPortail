@extends('layouts.front')
@section('content')
<style>
    .card{
        border: none !important;
    }
    .cand_photo{
        height: 150px;
        width: 150px;
        object-fit: cover;
        border-radius: 100%;
    }
</style>
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Candidats | Liste de Candidats</h1>
          <div class="custom-breadcrumbs">
            <a href="{{url('/')}}">Accueil</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Cadidats</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="site-section">
    <div class="container">
        <div class="row g-4">
            @foreach ($candidats as $item)
            <div class="col-md-6 col-lg-3 shadow">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/diplomé/photo-profile/'.$item->photo_profil) }}" class="img-fluid img-thumbnail cand_photo" alt="">
                        <a href="{{route('diplome-profil_public',$item->slug)}}" class="mt-2"><h4>{{$item->name}} {{$item->f_name}}</h4></a>
                        <p class="text-muted">{{$item->domain}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection