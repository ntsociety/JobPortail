<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\PassewordRequest;
use App\Models\Apply;
use App\Models\Category;
use App\Models\Company_profile;
use App\Models\Employe_profile;
use App\Models\Job;
use App\Models\User;
use App\Models\UserApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $company = User::where('role', 'recruteur')->where('is_admin', 0)->orderBy('created_at', 'desc')->get();
        $company_att = Company_profile::where('statut', 'en attente')->orderBy('created_at', 'desc')->get();
        return view('admin.company.company', compact('company', 'company_att'));
    }
    public function company_role($slug)
    {
        
        $company = Company_profile::where('slug', $slug)->firstOrFail();
        $user = User::findOrFail($company->id);
        return view('admin.company.edit_role', compact('company', 'user'));
    }
    public function company_role_store(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $company = Company_profile::findOrFail($id);
        $data = $request->validate([
            "role" => ['required', 'string', 'max:255'],
        ]);
        if($data['role'] == "rejeté")
        {
            $company->statut = $data['role'];
            $user->role = "user";
        }
        if($data['role'] == "recruteur")
        {
            $user->role = $data['role'];
            $company->statut = "vérifié";
        }
        $company->update();
        $user->update();
        return redirect()->route('company')->with('message', 'Rôle Modifié avec succès!');
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

    // profile
    public function profile()
    {
        return view('admin.profile');
    }
    // account & sec
    public function account()
    {
        return view('admin.sécurité');
    }
    public function update_account_email(EmailRequest $request)
    {
        $user = User::find(Auth::id());
        $data = $request->validated();
        $user->email = $data['email'];
        $user->update();
        return redirect()->back()->with('message', 'E-mail modifier avec succès');
    }
    public function update_account_pass(PassewordRequest $request)
    {
        $data = $request->validated();
        if($request->input('current_password'))
        {
            $currentPasswordStatus = Hash::check($data['current_password'], Auth::user()->password);
            if($currentPasswordStatus)
            {
                $user = User::findOrFail(Auth::user()->id);
                $user->password = Hash::make($data['password']);
                $user->update();
                return redirect()->back()->with('message', 'Mot de passe modifié avec succès !');
            }
            else{
            return redirect()->back()->with('error', 'Mot de passe actuel ne correspond pas');
            }
        }
        else{
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($data['password']);
            $user->update();
            return redirect()->back()->with('message', 'Mot de passe modifié avec succès !');
        }
    }
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.users', compact('users'));
    }
   

}
