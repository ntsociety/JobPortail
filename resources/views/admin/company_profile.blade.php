@extends('layouts.admin')
@section('content')
<style>
    .diplome_profile{
        height: 200px;
        width: 200px;
    }
</style>
 <!-- table -->
<div class="container t-repons mycontent">
    <div class="card-header bg-main text-light rounded-2 px-3 py-3">
      <h4> Profile Entreprise | <i class="text-muted">{{ $profile->name }}</i>
      </h4>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
            <div class="card p-3 py-4 shadow mt-5">

            <div class="text-center">
                <img src="{{ asset('assets/company/logo/'.$profile->logo) }}" class="rounded-circle object-fit-cover img-thumbnail diplome_profile">
            </div>
            <div class="mt-3">
                <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                <h5 class="mt-2 mb-0 text-center">{{ $profile->name }}</h5>
                <hr>
                <div class="row company-row">
                    <div class="col-md-6 my-0">
                        <p><small><b>N° Enregistrement : </b>{{ $profile->register_num }}</small></p>
                    </div>
                    <div class="col-md-6 my-0">
                        <p><small><b>N° NIF : </b>{{ $profile->nif_num }}</small></p>
                    </div>
                    <div class="col-md-6 my-0">
                        <p class="fonts"><b class="text-bold">Email : </b>{{ $profile->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="fonts"><b>Téléphone : </b>{{ $profile->phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="fonts"><b>Fax : </b>{{ $profile->fax }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="fonts"><b>Domaine : </b>{{ $profile->domain }}</p>
                    </div>

                </div>
                <hr class="text-bolder">
                <div class="px-4 mt-1 text-justify">
                    <h5>A propos</h5>
                    <p class="fonts">{{ $profile->about }}</p>

                </div>
                <hr>
                <div class="px-4 mt-1 text-justify">
                    <h5>Adresse</h5>
                    <p class="fonts">{{ $profile->address }}</p>
                </div>
                <hr>

                <div class="px-3">
                    <h5>Liens réseaux sociaux</h5>
                    <a href="https://www.facebook.com/{{ $profile->fb_url }}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                    <a href="https://www.facebook.com/{{ $profile->twit_url }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                    <a href="https://www.facebook.com/{{ $profile->link_url }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
