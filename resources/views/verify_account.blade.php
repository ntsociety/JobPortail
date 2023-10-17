@extends('layouts.front')
@section('content')
<div class="container ">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <div class="card verify-container">
                <div class="alert alert-warning">
                    <p><b>Vérifier votre compte !</b> Votre compte n'est pas encore vérifier. Veillez Vérifer votre compte pour continuer</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .verify-container{
        padding: 50px 0  !important;
        border: none !important;
    }
</style>