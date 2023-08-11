<?php

namespace App\Http\Controllers\Employeur;

use App\Http\Controllers\Controller;
use App\Models\Company_profile;
use App\Models\Employe_profile;
use App\Models\Job;
use App\Models\UserApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }
    public function become()
    {
       return view('company.become');
    }
    public function store(Request $request)
    {
        $company = Company_profile::find(Auth::id());
        $data = $request->all();
        if ($request->hasFile('logo'))
        {
            if($company->logo)
            {
                $path = 'assets/company/logo/'.$company->logo;
                unlink($path);
            }
            // dd($data['cover']);
            $file = $request->file('logo');
            // $ext = $file->getClientOriginalExtension();
            $imageName=date('d-m-Y').'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/company/logo/',$imageName);
            $company->logo = $imageName;
        }
        $company->name = $data['name'];
        $company->slug = Str::slug($data['name']);
        $company->email = $data['email'];
        $company->phone = $data['phone'];
        $company->fax = $data['fax'];
        $company->address = $data['address'];
        $company->register_num = $data['register_num'];
        $company->about = $data['about'];
        $company->fb_url = $data['facebook'];
        $company->link_url = $data['linkedin'];
        $company->twit_url = $data['twitter'];
        $company->update();
        return redirect()->route('company-profile')->with('message', 'Merci pour votre confiance en nous !');
    }
    public function profile()
    {
        return view('company.profile');
    }
    public function offres()
    {
        $job = Job::where('user_id', Auth::id())->get();
        return view('company.offres', compact('job'));
    }
    public function update_profil()
    {
        return view('company.update_profile');
    }
    public function user_applied($slug)
    {
        if(Job::where('slug', $slug)->exists())
        {
            $job = Job::where('slug', $slug)->first();
            $diplome = UserApply::where('job_id', $job->id)->orderBy('created_at', 'desc')->get();
            return view('company.diplômé_listes', compact('diplome'));
        }
        else
        {
            return redirect('/')->with('status', "slug n'existe pas");
        }

    }
    public function public_profile($slug)
    {
        if(Employe_profile::where('slug', $slug)->exists())
        {
            $diplome = Employe_profile::where('slug', $slug)->first();
            return view('company.diplo_public_profile', compact('diplome', ));
        }
        else
        {
            return redirect('/')->with('status', "slug n'existe pas");
        }
    }
    public function prof_public($slug)
    {
        if(Company_profile::where('slug', $slug)->exists())
        {
            $profil = Company_profile::where('slug', $slug)->first();
            return view('company.public_profil', compact('profil', ));
        }
        else
        {
            return redirect('/')->with('status', "slug n'existe pas");
        }

    }

}
