@extends('layouts.company')
@section('content')
 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Jobs | Liste de jobs</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Post a Job</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="site-section">
    <div class="container">

       <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th colspan="2">Nom et Prénom</th>
                    <th>Profession</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diplome as $item)
                <tr>
                    <td>{{ $item->user->id }}</td>
                    <td><a href="{{ route('comp_diplome-public_profile',$item->user->diplome->slug) }}">{{ $item->user->name }}</a></td>
                    <td>{{ $item->user->diplome->f_name }}</td>
                    <td>{{ $item->user->diplome->profession }}</td>
                </tr>
                @endforeach
            </tbody>
       </table>


    </div>
  </section>
@endsection

