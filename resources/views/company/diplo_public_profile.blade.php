@extends('layouts.company')
@section('content')
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="{{ asset('assets/diplomé/photo-profile/'.$diplome->photo_profil) }}" width="100" height="100" class="rounded-circle" style="object-fit: cover;">
                    </div>

                    <div class="text-center mt-3">
                        <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                        <h5 class="mt-2 mb-0">{{ $diplome->name }} {{ $diplome->f_name }}</h5>
                        <span>{{ $diplome->domain }}</span>
                        <p><small>{{ $diplome->experience_years }}</small></p>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts">{{ $diplome->bio }}</p>

                        </div>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts"><b class="text-bold">Email : </b>{{ $diplome->email }}</p>
                        </div>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts"><b>Téléphone : </b>{{ $diplome->phone }}</p>
                        </div>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts"><b>Adresse : </b>{{ $diplome->address }}</p>
                        </div>
                        <hr>

                        <div class="px-3">
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>


                        <a href=""  name="submit" class="btn btn-block btn-primary btn-md mt-2" value="Save Job">Envoyer lui un message</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
