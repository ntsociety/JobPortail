@extends('layouts.admin')
@section('content')
    <!-- table -->
  <div class="container t-repons mycontent">
    <div class="card-header bg-main text-light rounded-2 px-3 py-3">
      <h4> Liste de Catégories
        <a href="{{ route('category.create') }}" class="float-end btn btn-success">Ajouter</a>
      </h4>
    </div>
    <div class="respon">
      <table class="table text-center shadow table-bordered table-striped">
        <thead class="bg-main text-light">
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="bg-light">
          @if ($category->count() > 0)
            @foreach ($category as $item)
            <tr class="align-middle">
                <td>{{ $item->id }}</td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                            <img src="{{ asset('assets/category/couverture/'.$item->cover) }}" class=" me-1 prod-img" alt="user">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 fw-bold ">{{ $item->name }}</h6>
                        </div>
                    </div>
                </td>
                <td class="">
                    <form action="{{ route('category.destroy',$item->id) }}">
                        @csrf
                        @method('delete')
                        <a href="{{ route('category.edit',$item->id) }}" class="btn btn-sm bg-main text-light mx-1"><i class='bx bx-edit' ></i></a>
                        <button class="btn btn-sm bg-danger text-light  mx-1" type="submit" onclick="return confirm('Voulez-vous supprimer cette catégorie?')"><i class='bx bx-trash'></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
          @else
              <tr>
                <td colspan="5" class="text-center">Pas de catégorie</td>
              </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
