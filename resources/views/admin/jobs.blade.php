@extends('layouts.admin')
@section('content')
<style>
    a{
        text-decoration: none;
        color: inherit;
    }
    .is_available{
        cursor: default;
    }
</style>
 <!-- table -->
 <div class="container t-repons mycontent">
    <div class="card-header bg-main text-light rounded-2 px-3 py-3">
      <h4> Liste des offres d'emplois | <span class="badge badge-danger">{{ $job->count() }}</span>
      </h4>
    </div>
    <div class="respon">
      <table class="table text-center shadow table-bordered table-striped">
        <thead class="bg-main text-light">
          <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Type</th>
            <th>Date limite</th>
            <th>Candidat</th>
            <th>Valable ?</th>
          </tr>
        </thead>
        <tbody class="bg-light">
          @if ($job->count() > 0)
            @foreach ($job as $item)
            <tr class="align-middle">
                <td>{{ $item->id }}</td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 fw-bold "><a href="{{ route('view_job',$item->slug) }}">{{ $item->title }}</a></h6>
                            <small class="mb-0">{{ $item->category->name }}</small>
                        </div>
                    </div>
                </td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->apps_deadline }}</td>
                <td>
                    @if ($item->diplome->count() > 0)
                        <a href="{{ route('view_job',$item->slug) }}">{{ $item->diplome->count() }} Postulé@if($item->diplome->count() > 1)s @endif</a>
                    @else
                    pas encore postulé
                    @endif
                </td>
                <td>
                    @if ($item->is_available)
                        <h6 class="btn btn-success btn-sm is_available">Oui</h6>
                    @else
                    <h6 class="btn btn-danger btn-sm is_available">Non</h6>
                    @endif
                </td>
            </tr>
            @endforeach
          @else
              <tr>
                <td colspan="5" class="text-center">Pas d'offres <span><a href="{{ route('emplois.create') }}"></a></span></td>
              </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>




@endsection
