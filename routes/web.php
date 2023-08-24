<?php

use App\Http\Controllers\Admin\AdminControlleur;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmploisController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Diplomé\DiplomeController;
use App\Http\Controllers\Employeur\CompanyController;
use App\Http\Controllers\Employeur\OffreControlleur;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobControlleur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


// admin
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::get('/', [AdminControlleur::class, 'index'])->name('admin-dashboard');
        // category
        Route::resource('category', CategoryController::class);
        // emplois
        Route::resource('emplois', EmploisController::class);
        // diplômés
        Route::get('diplômé-postulés/{slug}', [AdminControlleur::class, 'diplo_post'])->name('admin-diplo_post');
        Route::get('diplômés', [AdminControlleur::class, 'diplomer'])->name('diplomer');
        Route::get('profile-diplômé/{slug}', [AdminControlleur::class, 'diplôme_profile'])->name('diplôme_profile');
        // company
        Route::get('entreprises', [AdminControlleur::class, 'company'])->name('company');
        Route::get('entreprise/{slug}/profile', [AdminControlleur::class, 'company_prof'])->name('company_prof');
        // all job
        Route::get('offres-des-emplois', [AdminControlleur::class, 'jobs'])->name('jobs');
        Route::get('offre-d-emploi/{slug}', [AdminControlleur::class, 'single_job'])->name('view_job');


    });
     // send email
     Route::get('send_email/{slug}/candidat', [AdminControlleur::class, 'view_apply'])->name('view_apply');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('home');

Route::get('/offres-emploies', [JobControlleur::class, 'job_liste'])->name('job_liste');
Route::get('/offres-emploie/{slug}', [JobControlleur::class, 'single_job'])->name('single_job');
Route::get('offres/search', [JobControlleur::class, 'search'])->name('search');
Route::get('catégorie/{slug}', [JobControlleur::class, 'viewcategory'])->name('viewcategory');


// job
Route::resource('job', JobController::class);



// save and apply
Route::middleware(['auth'])->group(function(){
    // devenir employeur
    Route::get('devenir-employeur', [CompanyController::class, 'become'])->name('become-company');
    Route::post('devenir-employeur-store', [CompanyController::class, 'store'])->name('become-company-store');

    Route::post('/save_job/{id}', [JobControlleur::class, 'save_job'])->name('save_job');
    Route::get('/postulé-job/{slug}', [JobControlleur::class, 'post_job'])->name('post_job');
    Route::post('/apply_job/{id}', [JobControlleur::class, 'apply_job'])->name('apply_job');
    // pdf view
    Route::get('pdf_view', [App\Http\Controllers\Controller::class, 'pdfView'])->name('pdf_view');


});





// company
Route::middleware(['auth', 'isCompany'])->group(function(){
    // profil
    Route::prefix('company')->group(function(){
        Route::get('/', [CompanyController::class, 'index'])->name('company-dashboard');
        Route::get('profile', [CompanyController::class, 'profile'])->name('company-profile');
        Route::get('mettre-à-jour-profile', [CompanyController::class, 'update_profil'])->name('company-update_profil');

        // company offres
        Route::get('mes-offres', [CompanyController::class, 'offres'])->name('company-offres');

        // offres user applied
        Route::get('offres-job/{slug}/diplômé-postulés', [CompanyController::class, 'user_applied'])->name('job_user_applied');
        Route::get('diplomés/{slug}/profile', [CompanyController::class, 'diplome_profile'])->name('camp_diplôme_profile');
        Route::get('company-diplomés/', [CompanyController::class, 'company_diplomer'])->name('company_diplomer');
        Route::get('send-mail-to-user/{slug}', [CompanyController::class, 'send_mail_user'])->name('send_mail_user');
        Route::post('send-mail-to-user_store', [CompanyController::class, 'send_mail_user_store'])->name('send_mail_user_store');

        // offres
        Route::resource('offres', OffreControlleur::class);

    });

    // diplômé profile public

    Route::get('profile-public/{slug}/', [CompanyController::class, 'public_profile'])->name('comp_diplome-public_profile');
});

// diplomé
Route::middleware(['auth'])->group(function(){
    // profil
    Route::prefix('diplomé')->group(function(){
        Route::get('profile', [DiplomeController::class, 'profile'])->name('diplome-profile');
        Route::get('mettre-à-jour-profile', [DiplomeController::class, 'edit'])->name('diplome-profile-edit');
        Route::post('profile-update', [DiplomeController::class, 'update'])->name('update-diplome-profile');
        Route::get('offres-postulés', [DiplomeController::class, 'applied'])->name('diplome-applied');
        Route::get('{slug}/profile-public/', [DiplomeController::class, 'public_profile'])->name('diplome-profil_public');

        Route::get('edit-account', [DiplomeController::class, 'account'])->name('employe-account');
        Route::put('update-account_pass', [DiplomeController::class, 'update_account_pass'])->name('employe-update_account_pass');
        Route::put('update-account_email', [DiplomeController::class, 'update_account_email'])->name('employe-update_account_email');

    });
});

// company profil public
Route::middleware(['auth'])->group(function(){
    // profil
    Route::get('{slug}/profile-public', [CompanyController::class, 'prof_public'])->name('company_public_profile');

});


// google login
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login_google');
Route::get('google/callback', [LoginController::class, 'handleGoogleCallback']);

// facebook login
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login_facebook');
Route::get('facebook/callback', [LoginController::class, 'handleFacebookCallback']);
