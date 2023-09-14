@extends('layouts.admin')
@section('content')


<div class="overview-boxes">
    <div class="box">
      <div class="right-side">
        <div class="box-topic">Utilisateurs</div>
        <div class="number">{{ $users->count()}}</div>
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
        <div class="number">{{ $company->count()}}</div>
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
  <div class="container t-repons mycontent">
    <div class="card-header bg-main text-light rounded-2 px-3 py-3">
      <h4> Liste Produits
        <a href="" class="float-end btn btn-success">Ajouter</a>
      </h4>
    </div>
    <div class="respon">
      <table class="table text-center shadow table-bordered table-striped">
        <thead class="bg-main text-light">
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="bg-light">
          <tr class="align-middle">
            <td>1</td>
            <td>
              <div class="d-flex px-2 py-1">
                <div>
                  <img src="assets/images/2023-08-03_a3.png" class=" me-1 prod-img" alt="user">
                </div>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 fw-bold ">Google Pixel 4</h6>
                  <p class="text-xs text-main mb-0">Electronique</p>
                </div>
              </div>
            </td>
            <td>Vente du meilleur phone</td>
            <td>40000 FCFA</td>
            <td class="">
              <a href="" class="btn btn-sm bg-main text-light mx-1"><i class='bx bx-edit' ></i></a>
              <button class="btn btn-sm bg-danger text-light  mx-1"><i class='bx bx-trash'></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

            <!-- produit -->
  <div class="container mycontent">
    <div class="card border-0 shadow">
      <div class="card-header bg-main text-light py-3">
        <h4>Ajouter Produit
          <a href="" class="float-end btn btn-danger">Retour</a>
        </h4>
      </div>
      <div class="card-body text-dark">
          <div class="row">
          <div class="col">
              <form action="" method="POST" enctype="multipart/form-data" class="mb-3">
                  <div class="mb-3">
                      <label for="" class="form-label">Catégories </label>
                      <select name="cate_id" id="" class="form-control bg-main text-white" required="required">
                        <option value="0" class="" hidden disabled selected>Selectionner la catégorie</option>
                        <option value="" >Electronique</option>
                      </select>
                    </div>
                  <div class="mb-3">
                      <label for="" class="form-label">Nom </label>
                      <input type="text" class="form-control" id="" placeholder="Nom du produit" name="name">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Description</label>
                      <textarea class="form-control" id="" rows="3"  placeholder="Description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Prix </label>
                      <input type="number" class="form-control" id="" placeholder="Prix" name="prix">
                    </div>
                    <div class="mb-3">
                      <img src="assets/images/2023-08-03_a3.png" alt="" class="bg-main rounded-3 object-fit-cover img-fluid h-25 w-25">
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Image du produit </label>
                      <input type="file" class="form-control" id="" placeholder="image" name="image">
                    </div>
                    <button type="submit" class="btn text-light bg-main w-100  mt-4">Enregistrer</button>
              </form>
          </div>
          </div>
      </div>
    </div>
  </div>




@endsection
