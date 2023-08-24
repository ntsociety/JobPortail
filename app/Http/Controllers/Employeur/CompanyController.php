<?php

namespace App\Http\Controllers\Employeur;

use App\Http\Controllers\Controller;
use App\Mail\SendEmailContact;
use App\Models\Apply;
use App\Models\Company;
use App\Models\Company_profile;
use App\Models\Contact;
use App\Models\Employe_profile;
use App\Models\Job;
use App\Models\UserApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $company->slug = Str::slug($data['name']). strval(rand(1111, 9999));
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

        Company::create([
            'user_id' => Auth::id(),
        ]);
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
        $job = Job::where('slug', $slug)->firstOrFail();
        $diplome = UserApply::where('job_id', $job->id)->orderBy('created_at', 'desc')->get();
        return view('company.diplômé_listes', compact('diplome'));

    }
    public function diplome_profile($slug)
    {
        $profile = Employe_profile::where('slug', $slug)->firstOrFail();
        return view('company.diplo_public_profile', compact('profile'));

    }
    public function company_diplomer()
    {
        $diplome = Apply::where('company_id', Auth::id())->get();
        return view('company.diplomés', compact('diplome'));
    }
    public function send_mail_user($slug)
    {
        $diplome = Employe_profile::where('slug', $slug)->firstOrFail();
        return view('company.contact_user', compact('diplome'));
    }
    public function send_mail_user_store(Request $request)
    {
        $data = $request->validate([
           'email' => ['required', 'string', 'email', 'max:255'],
           'sujet' => ['required', 'string', 'max:255'],
           'message' => ['required', 'string'],
        ]);
        $diplomer_email = $data['email'];
        $contact = new Contact();
        $contact->sender_id = Auth::id();
        $contact->sujet = $data['sujet'];
        $contact->message = $data['message'];
        $contact->diplomer_id = $request->input('diplomer_id');
        $contact->save();
        $single_contact = Contact::where('id', $contact->id)->firstOrFail();
        try{
            Mail::to($diplomer_email)->send(new SendEmailContact($single_contact));
            return redirect()->back()->with('message', 'Message envoyé avec succès!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', "Quelques choses s'est mal passé! $e");
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
