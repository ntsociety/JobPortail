@extends('layouts.front')
@section('content')
<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="{{ asset('assets/diplomé/photo-profile/'.Auth::user()->diplome->photo_profil) }}" width="100" height="100" class="rounded-circle" style="object-fit: cover;">
                    </div>

                    <div class="text-center mt-3">
                        <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                        <h5 class="mt-2 mb-0">{{ Auth::user()->name }} {{ Auth::user()->diplome->f_name }}</h5>
                        <span>{{ Auth::user()->diplome->domain }}</span>
                        <p><small>{{ Auth::user()->diplome->experience_years }}</small></p>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts">{{ Auth::user()->diplome->bio }}</p>

                        </div>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts"><b class="text-bold">Email : </b>{{ Auth::user()->email }}</p>
                        </div>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts"><b>Téléphone : </b>{{ Auth::user()->diplome->phone }}</p>
                        </div>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts"><b>Adresse : </b>{{ Auth::user()->diplome->address }}</p>
                        </div>
                        <hr>

                        <div class="px-3">
                            @if (Auth::user()->diplome->fb_user)
                            <a href="https://www.facebook.com/{{Auth::user()->diplome->fb_user}}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                            @endif
                            @if (Auth::user()->diplome->insta_user)  
                            <a href="https://www.instagram.com/{{Auth::user()->diplome->insta_user}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-instagram"></span></a>
                            @endif
                            @if (Auth::user()->diplome->link_user)
                            <a href="https://www.linkedin.com/in/{{Auth::user()->diplome->link_user}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            @endif
                        </div>



                    </div>

                    <a href="{{ route('diplome-profile-edit') }}"  name="submit" class="btn btn-block btn-primary btn-md mt-2" value="Save Job">Modifier</a>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
