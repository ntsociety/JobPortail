@extends('layouts.admin')
@section('content')

<div class="container mycontent">
    <div class="card border-0 shadow col-md-8 me-auto ms-auto">
      <div class="card-header bg-main text-light py-3">
        <h4>Ajouter Catégorie
          <a href="{{ route('category.index') }}" class="float-end btn btn-danger">Retour</a>
        </h4>
      </div>
      <div class="card-body text-dark">
          <div class="row">
          <div class="col">
              <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                @csrf
                @method('put')
                  <div class="mb-3">
                      <label for="" class="form-label">Nom </label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="" value="{{ $category->name }}" placeholder="Nom de la catégorie" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   @if($category->cover)
                    <div class="mb-3">
                        <img src="{{ asset('assets/category/couverture/'.$category->cover) }}" alt="" class="bg-main rounded-3 object-fit-cover img-fluid h-25 w-25">
                    </div>
                   @endif
                    <div class="mb-3">
                      <label for="image" class="form-label">Image </label>
                      <input type="file" class="form-control @error('cover') is-invalid @enderror" id="" placeholder="image" name="cover">
                        @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn text-light bg-main w-100  mt-4">Modifier</button>
              </form>
          </div>
          </div>
      </div>
    </div>
  </div>

  @endsection
