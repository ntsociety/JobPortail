@extends('layouts.front')
@section('content')
<style>
    hr{
        background-color: black;
    }
</style>
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
                            @if ($diplome->fb_user)
                            <a href="https://www.facebook.com/{{$diplome->fb_user}}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                            @endif
                            @if ($diplome->insta_user)  
                            <a href="https://www.instagram.com/{{$diplome->insta_user}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-instagram"></span></a>
                            @endif
                            @if ($diplome->link_user)
                            <a href="https://www.linkedin.com/in/{{$diplome->link_user}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            @endif
                        </div>
                        <hr class="bg-black ">
                        <div class="col-lg-12 shadow text-justify">
                            <h3 class="py-3">Me Contacter</h3>
                            <form class="p-4 p-md-5 border rounded" action="{{ route('send_mail_user_store') }}" method="post" enctype="multipart/form-data">
                
                            <!--job details-->
                            @csrf
                                <div class="col-md-12 form-group mb-3">
                                    <label for="">Adresse Email</label>
                                    <input type="email" readonly name="email" value="{{ $diplome->email }}" class="form-control @error('title') is-invalid @enderror" id="job-title" placeholder="Titre de l'offre">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                
                                <input type="hidden"name="diplomer_id" value="{{ $diplome->id }}">
                                <div class="col-md-12 form-group mb-3">
                                    <label for="">Objet</label>
                                    <input type="text" name="sujet" value="{{ old('sujet') }}" class="form-control @error('sujet') is-invalid @enderror" id="job-title" placeholder="Sujet">
                                    @error('sujet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-md-12">
                                        <label class="text-black" for="">Message</label>
                                        <textarea name="message" id="" cols="30" rows="7" class="form-control @error('message') is-invalid @enderror" placeholder="Message...">{{ old('message') }}</textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            <!--company details-->
                
                            <button type="submit" name="submit" class="btn btn-block btn-primary btn-md" value="Save Job">Envoyer</button>
                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
