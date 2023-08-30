@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="card-header bg-main text-light p-3">
            <h4>Créer un offre
                <a href="{{ route('emplois.index') }}" class="float-end btn btn-danger">Retour</a>
            </h4>
        </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form class="p-4 p-md-5 border rounded" action="{{ route('company_role_store',$company->id) }}" method="post" enctype="multipart/form-data">

            <!--job details-->
            @csrf
                <div class="col-md-6 form-group mb-3">
                    <label for="job-type" class="mb-1">Rôle</label>
                    <select name="role" class="form-select border rounded @error('role') is-invalid @enderror" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                        <option selected hidden value="{{$user->role}}">{{$user->role}}</option>
                        <option value="recruteur">Recruteur</option>
                        <option value="rejeté">Rejeté</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" name="submit" class="btn btn-primary btn-sm mt-3" value="Save Job">Modifier</button>
                </div>
          </form>
        </div>


      </div>

    </div>
@endsection
