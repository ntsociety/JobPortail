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
      <h4> Liste des diplômés postulés
      </h4>
    </div>
    <div class="respon">
      <table class="table text-center shadow table-bordered table-striped">
        <thead class="bg-main text-light">
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Profession</th>
            <th>CV</th>
          </tr>
        </thead>
        <tbody class="bg-light">
            @foreach ($diplome as $item)
            <tr class="align-middle">
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 fw-bold "><a href="{{ route('diplôme_profile',$item->user->diplome->slug) }}">{{ $item->user->diplome->name }}</a></h6>
                        </div>
                    </div>
                </td>
                <td>{{ $item->user->diplome->f_name }}</td>
                <td>{{ $item->user->diplome->phone }}</td>
                <td>{{ $item->user->diplome->domain }}</td>
                <td>cv</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>




@endsection
