@extends('layouts.front')
@section('content')
 <!-- HOME -->


<section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="{{ asset('assets/company/logo/'.$profil->logo) }}" width="100" height="100" class="rounded-circle" style="object-fit: cover;">
                    </div>
                    <style>
                        .company-row div{
                            border-bottom: 2px solid #777;
                        }
                        .company-row p{
                            margin-bottom: 0px;
                        }
                        hr{
                            background-color: #777;
                        }
                    </style>
                    <div class="text-center mt-3">
                        <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                        <h5 class="mt-2 mb-0">{{ $profil->name }}</h5>
                        <hr>
                        <div class="row company-row">
                            <div class="col-md-6 my-0">
                                <p><small><b>Agrement : </b>{{ $profil->agrement }}</small></p>
                            </div>
                            <div class="col-md-6 my-0">
                                <p class="fonts"><b class="text-bold">Email : </b>{{ $profil->company_email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fonts"><b>Téléphone : </b>{{ $profil->phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fonts"><b>Fax : </b>{{ $profil->fax }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="fonts"><b>Domaine : </b>{{ $profil->domain }}</p>
                            </div>

                        </div>
                        <hr class="text-bolder">
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts">{{ $profil->about }}</p>

                        </div>
                        <hr>
                        <div class="px-4 mt-1 text-justify">
                            <p class="fonts"><b>Adresse : </b>{{ $profil->address }}</p>
                        </div>
                        <hr>

                        <div class="px-3">
                            <a href="https://www.facebook.com/{{ $profil->fb_url }}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                            <a href="https://www.facebook.com/{{ $profil->twit_url }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="https://www.facebook.com/{{ $profil->link_url }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
