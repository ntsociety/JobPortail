  <!-- HOME -->
  <section class="home-section section-hero overlay bg-image" style="background-image: url('{{ asset('frontend/images/hero_1.jpg') }}');" id="home-section">

    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
          <div class="mb-5 text-center">
            <h1 class="text-white font-weight-bold">Le moyen le plus simple d'obtenir l'emploi de vos rêves</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
          </div>
          <form action="{{ route('search') }}" method="get" class="search-jobs-form" >
            <div class="row mb-5">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <input type="text" name="search" class="form-control form-control-lg" value="{{ Request::get('search') ? $search_text : '' }}" placeholder="Job title, Company...">
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <select class="selectpicker" name="region" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
                    <option value="all" {{ Request::get('region') == 'all' ? 'selected' : ''  }}>Toutes</option>
                  <option value="Lomé "{{ Request::get('region') == 'Lomé' ? 'selected' : ''  }}>Lomé</option>
                  <option value="Kpalimé "{{ Request::get('region') == 'Kpalimé' ? 'selected' : ''  }}>Kpalimé</option>
                  <option value="Tsevie"{{ Request::get('region') == 'Tsevie' ? 'Tsevie' : ''  }}>Tsevie</option>
                  <option value="Atakpamé" {{ Request::get('region') == 'Atakpamé' ? 'selected' : ''  }}>Atakpamé</option>
                  <option value="Kara" {{ Request::get('region') == 'Kara' ? 'selected' : ''  }}>Kara</option>
                </select>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <select class="selectpicker" data-style="btn-white btn-lg" name="type" data-width="100%" data-live-search="true" title="Select Job Type">
                  <option value="Temps partiel"{{ Request::get('type') == 'Temps partiel' ? 'selected' : ''  }}>Temps partiel</option>
                  <option value="Temps plein"{{ Request::get('type') == 'Temps plein' ? 'selected' : ''  }}>Temps plein</option>
                </select>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 popular-keywords">
                <h3>Trending Keywords:</h3>
                <ul class="keywords list-unstyled m-0 p-0">
                  <li><a href="#" class="">UI Designer</a></li>
                  <li><a href="#" class="">Python</a></li>
                  <li><a href="#" class="">Developer</a></li>
                </ul>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <a href="#next" class="scroll-button smoothscroll">
      <span class=" icon-keyboard_arrow_down"></span>
    </a>

  </section>
