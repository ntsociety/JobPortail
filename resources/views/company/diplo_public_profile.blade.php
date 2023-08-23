@extends('layouts.company')
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
      <h4> Profile diplômé | <i class="text-muted">{{ $profile->name }}</i>
      </h4>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
            <div class="card p-3 py-4 shadow mt-5">

            <div class="text-center">
                <img src="{{ asset('assets/diplomé/photo-profile/'.$profile->photo_profil) }}" class="rounded-circle object-fit-cover img-thumbnail diplome_profile">
            </div>

            <div class="mt-3">
                <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                <div class="text-center">
                    <h5 class="mt-2 mb-0 "><span class="text-uppercase">{{ $profile->name }}</span> <span class="text-capitalize">{{ $profile->f_name }}</span></h5>
                    <span>{{ $profile->domain }} | <b>{{ $profile->experience_years }}</b> d'expériences</span>
                </div>

                <div class="row company-row mt-1">
                    <div class="col-md-6 my-0">
                        <p><b>Email : </b>{{ $profile->email }}</p>
                    </div>
                    <div class="col-md-6 my-0">
                        <p><b>Téléphone : </b>{{ $profile->phone }}</p>
                    </div>
                    <div class="col-md-6 my-0">
                        <p><b class="">Parler bien : </b>{{ $profile->lang_court }}</p>
                    </div>
                    <div class="col-md-6 my-0">
                        <p><b class="">Parler un peu : </b>{{ $profile->sec_lang }}</p>
                    </div>

                </div>
                <hr>
                <div class="px-4 mt-1">
                    <h5>Bio</h5>
                    <p class="fonts">{{ $profile->bio }}</p>

                </div>
                <hr>
                <div class="px-4 mt-1">
                    <h5>Education</h5>
                    <p class="fonts">{!! $profile->education !!}</p>

                </div>
                <div class="px-4 mt-1">
                    <h5>Expériences</h5>
                    <p class="fonts">{!! $profile->experience !!}</p>

                </div>
                <hr>
                <div class="px-3">
                    <a href="https://www.facebook.com/{{ $profile->fb_url }}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                    <a href="https://www.facebook.com/{{ $profile->twit_url }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                    <a href="https://www.facebook.com/{{ $profile->link_url }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                </div>
                <a href="{{ route('send_mail_user',$profile->slug) }}" class="btn btn-primary">Envoyer lui un message</a>
            </div>
        </div>
    </div>
</div>




@endsection
