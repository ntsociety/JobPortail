@extends('layouts.company')
@section('content')

<div class="overview-boxes">
  <div class="box">
    <div class="right-side">
      <div class="box-topic">Utilisateurs</div>
      <div class="number"></div>
      <div class="indicator">
        <i class="bx bx-up-arrow-alt"></i>
        <span class="text">Up from yesterday</span>
      </div>
    </div>
    <i class="bx bx-cart-alt cart"></i>
  </div>
  <div class="box">
    <div class="right-side">
      <div class="box-topic">Entreprises</div>
      <div class="number"></div>
      <div class="indicator">
        <i class="bx bx-up-arrow-alt"></i>
        <span class="text">Up from yesterday</span>
      </div>
    </div>
    <i class="bx bxs-cart-add cart two"></i>
  </div>
  <div class="box">
    <div class="right-side">
      <div class="box-topic">Diplômés</div>
      <div class="number">{{ $diplomes->count()}}</div>
      <div class="indicator">
        <i class="bx bx-up-arrow-alt"></i>
        <span class="text">Up from yesterday</span>
      </div>
    </div>
    <i class="bx bx-cart cart three"></i>
  </div>
  <div class="box">
    <div class="right-side">
      <div class="box-topic">Jobs</div>
      <div class="number">{{ $job->count()}}</div>
      <div class="indicator">
        <i class="bx bx-down-arrow-alt down"></i>
        <span class="text">Down From Today</span>
      </div>
    </div>
    <i class="bx bxs-cart-download cart four"></i>
  </div>
</div>
<!-- table -->





@endsection
