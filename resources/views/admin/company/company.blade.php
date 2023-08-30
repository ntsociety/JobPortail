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

{{-- profiles en attentes --}}
<div class="container t-repons mycontent">
  <div class="card-header bg-main text-light rounded-2 px-3 py-3">
    <h4> Liste de profiles en attentes de vérification | <span >{{ $company_att->count() }}</span>
    </h4>
  </div>
  <div class="respon">
    <table class="table text-center shadow table-bordered table-striped">
      <thead class="bg-main text-light">
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>Rôle</th>
          <th>Téléphone</th>
          <th>Domaine</th>
          <th>Agrement</th>
        </tr>
      </thead>
      <tbody class="bg-light">
          @if ($company_att->count() >0)
          @foreach ($company_att as $item)
          <tr class="align-middle">
              <td>
                  <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 fw-bold "><a href="{{ route('company_prof',$item->slug) }}">{{ $item->name }}</a></h6>
                      </div>
                  </div>
              </td>
              <td>{{ $item->email }}</td>
              <td>
                <a href="{{route('company_role',$item->slug)}}">En Attente</a>
              </td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->domain }}</td>
              <td>{{ $item->agrement }}</td>
          </tr>
          @endforeach
          @else
            <tr>
              <td colspan="6" class="text-center">Pas de données</td>
            </tr>
          @endif
      </tbody>
    </table>
  </div>
</div>

 {{-- liste de profiles validés --}}
 <div class="container t-repons mycontent">
    <div class="card-header bg-main text-light rounded-2 px-3 py-3">
      <h4> Liste des Entreprises | <span >{{ $company->count() }}</span>
      </h4>
    </div>
    <div class="respon">
      <table class="table text-center shadow table-bordered table-striped">
        <thead class="bg-main text-light">
          <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Domaine</th>
            <th>Agrement</th>
          </tr>
        </thead>
        <tbody class="bg-light">
            @if ($company->count() >0)
            @foreach ($company as $item)
            <tr class="align-middle">
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 fw-bold "><a href="{{ route('company_prof',$item->company->slug) }}">{{ $item->company->name }}</a></h6>
                        </div>
                    </div>
                </td>
                <td>{{ $item->company->email }}</td>
                <td>{{ $item->company->phone }}</td>
                <td>{{ $item->company->domain }}</td>
                <td>{{ $item->company->agrement }}</td>
            </tr>
            @endforeach
            @else
              <tr>
                <td colspan="5" class="text-center">Pas de données</td>
              </tr>
            @endif
        </tbody>
      </table>
    </div>
  </div>




@endsection
