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
            @foreach ($company as $item)
            <tr class="align-middle">
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 fw-bold "><a href="{{ route('company_prof',$item->slug) }}">{{ $item->name }}</a></h6>
                        </div>
                    </div>
                </td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->domain }}</td>
                <td>{{ $item->register_num }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>




@endsection
