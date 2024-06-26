@extends('layouts.company')
@section('content')
 <!-- HOME -->


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7 shadow">
            <div class="card p-3 py-4">

                <div class="text-center">
                    <img src="{{ asset('assets/company/logo/'.Auth::user()->company->logo) }}" width="100" height="100" class="rounded-circle" style="object-fit: cover;">
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
                    <h5 class="mt-2 mb-0">{{ Auth::user()->company->name }}</h5>
                    <hr>
                    <div class="row company-row">
                        <div class="col-md-6 my-0">
                            <p><small><b>Agrement : </b>{{ Auth::user()->company->agrement }}</small></p>
                        </div>
                        <div class="col-md-6 my-0">
                            <p class="fonts"><b class="text-bold">Email : </b>{{ Auth::user()->company->company_email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fonts"><b>Téléphone : </b>{{ Auth::user()->company->phone }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fonts"><b>Fax : </b>{{ Auth::user()->company->fax }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fonts"><b>Domaine : </b>{{ Auth::user()->company->domain }}</p>
                        </div>

                    </div>
                    <hr class="text-bolder">
                    <div class="px-4 mt-1 text-justify">
                        <p class="fonts">{{ Auth::user()->company->about }}</p>

                    </div>
                    <hr>
                    <div class="px-4 mt-1 text-justify">
                        <p class="fonts"><b>Adresse : </b>{{ Auth::user()->company->address }}</p>
                    </div>
                    <hr>

                    <div class="px-3">
                        @if (Auth::user()->company->fb_user)
                        <a href="https://www.facebook.com/{{Auth::user()->company->fb_user}}" class="pt-3 pb-3 pr-3 pl-0 underline-none"><span class="icon-facebook"></span></a>
                        @endif
                        @if (Auth::user()->company->insta_user)  
                        <a href="https://www.instagram.com/{{Auth::user()->company->insta_user}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                        @endif
                        @if (Auth::user()->company->link_user)
                        <a href="https://www.linkedin.com/in/{{Auth::user()->company->link_user}}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        @endif
                        @if (Auth::user()->company->site_url)
                        <a href="https://{{Auth::user()->company->site_url}}" class="pt-3 pb-3 pr-3 pl-0"><i class='bx bx-link' ></i></a>
                        @endif
                    </div>



                </div>

                <a href="{{ route('company-update_profil') }}"  name="submit" class="btn btn-block btn-primary btn-md mt-2" value="Save Job">Modifier</a>

            </div>
        </div>
    </div>
</div>



@endsection
