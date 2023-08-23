<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Category;
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
        $job = Job::where('slug', $slug)->firstOrFail();
        $diplome = UserApply::where('job_id', $job->id)->orderBy('created_at', 'desc')->get();
        return view('admin.diplo_post', compact('diplome'));

    }
    public function diplomer()
    {
        $diplome = UserApply::orderBy('created_at', 'desc')->get();
        return view('admin.diplomés', compact('diplome'));
    }
    public function diplôme_profile($slug)
    {
         $profile = Employe_profile::where('slug', $slug)->firstOrFail();
        return view('admin.diplome_profile', compact('profile'));

    }
    public function company()
    {
        $company = Company_profile::where('is_verify', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.company', compact('company'));
    }
    public function company_prof($slug)
    {
        $profile = Company_profile::where('slug', $slug)->firstOrFail();
        return view('admin.company_profile', compact('profile'));

    }
    public function view_apply($slug)
    {
        $apply = Apply::where('app_num', $slug)->firstOrFail();
        // dd($apply->diplome->name);
        return view('email.postule_email', compact('apply'));

    }
    public function jobs()
    {
        $job = Job::orderBy('created_at', 'desc')->get();
        return view('admin.jobs', compact('job'));
    }
    public function single_job($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        $category = Category::orderBy('created_at', 'desc')->where('id', '!=', 1)->get();
        return view('admin.single_job', compact('job', 'category'));
    }

}
