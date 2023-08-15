<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company_profile;
use App\Models\Employe_profile;
use App\Models\Job;
use App\Models\UserApply;
use Illuminate\Http\Request;

class AdminControlleur extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function diplo_post($slug)
    {
        if(Job::where('slug', $slug)->exists())
        {
            $job = Job::where('slug', $slug)->first();
            $diplome = UserApply::where('job_id', $job->id)->orderBy('created_at', 'desc')->get();
            return view('admin.diplo_post', compact('diplome'));
        } else
        {
            return redirect()->back()->with('status', "slug n'existe pas");
        }
    }
    public function diplomer()
    {
        $diplome = UserApply::orderBy('created_at', 'desc')->get();
        return view('admin.diplomés', compact('diplome'));
    }
    public function diplôme_profile($slug)
    {
        if(Employe_profile::where('slug', $slug)->exists())
        {
            $profile = Employe_profile::where('slug', $slug)->first();
            return view('admin.diplome_profile', compact('profile'));
        } else
        {
            return redirect()->back()->with('status', "slug n'existe pas");
        }
    }
    public function company()
    {
        $company = Company_profile::where('is_verify', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.company', compact('company'));
    }
    public function company_prof($slug)
    {
        if(Company_profile::where('slug', $slug)->exists())
        {
            $profile = Company_profile::where('slug', $slug)->first();
            return view('admin.company_profile', compact('profile'));
        } else
        {
            return redirect()->back()->with('status', "slug n'existe pas");
        }
    }

}
