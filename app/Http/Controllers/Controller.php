<?php

namespace App\Http\Controllers;

use App\Models\Employe_profile;
use App\Models\Job;
use App\Models\SaveJob;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $company = User::where('role', "recruteur")->get();
        $diplome = User::where('role', "user")->get();
        $recent_job = Job::orderBy('created_at', 'desc')->take(10)->get();
        $job = Job::all();
        return view('index', compact('company', 'diplome', 'recent_job', 'job'));
    }
    public function job_liste()
    {
        $job = Job::orderBy('created_at', 'desc')->get();
        return view('jobs-listes', compact('job'));
    }
    public function pdfView()
    {
        // $pdfPath = public_path('assets/diplomé/cv/'.Auth::user()->diplome->cv);
        // dd($pdfPath);
        return view('pdf_view');
    }
    public function candidats()
    {
        $candidats = Employe_profile::where('bio', '!=', null)->get();
        return view('candidats', compact('candidats'));
    }
    public function verify_account()
    {
        if(Auth::user()->email_verified_at == null)
        {
            return view('verify_account');
        }else {
            return redirect()->back();
        }
    }

}
