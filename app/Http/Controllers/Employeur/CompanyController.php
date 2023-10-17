<?php

namespace App\Http\Controllers\Employeur;

use App\Http\Controllers\Controller;
use App\Http\Requests\BecomeEmployerRequest;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\PassewordRequest;
use App\Mail\SendEmailContact;
use App\Models\Apply;
use App\Models\Category;
use App\Models\Company;
use App\Models\Company_profile;
use App\Models\Contact;
use App\Models\Employe_profile;
use App\Models\Job;
use App\Models\User;
use App\Models\UserApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        $job = Job::where('user_id', Auth::id())->get();
        $diplomes = Apply::where('company_id', Auth::id())->get();
        $job_active = Job::where('is_available', 1)->where('user_id', Auth::id())->get();
        return view('company.index', compact('job', 'job_active', 'diplomes'));
    }
    public function become()
    {
        $category = Category::where('id', '!=', 1)->get();
       return view('company.become', compact('category'));
    }
    public function store(BecomeEmployerRequest $request)
    {
        // 'identifier' => 'required|regex:/^[a-zA-Z0-9]+$/',
        // 'text_only' => 'required|regex:/^[a-zA-Z]+$/'
        // 'field_name' => 'required|regex:/^[^\/|\\\]+$/',


        $company = Company_profile::find(Auth::id());
        $data = $request->validated();
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
        $company->domain = $data['domain'];
        $company->slug = Str::slug($data['name']). strval(rand(1111, 9999));
        $company->company_email = $data['company_email'];
        $company->phone = $data['phone'];
        $company->address = $data['address'];
        $company->agrement = $data['agrement'];
        $company->about = $data['about'];

        $company->statut = 'en attente';
        $company->update();

        Company::create([
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('company-profile')->with('message', 'Merci pour votre confiance en nous !');
    }
    public function update_profile(BecomeEmployerRequest $request)
    {
        // 'identifier' => 'required|regex:/^[a-zA-Z0-9]+$/',
        // 'text_only' => 'required|regex:/^[a-zA-Z]+$/'
        // 'field_name' => 'required|regex:/^[^\/|\\\]+$/',


        $company = Company_profile::find(Auth::id());
        $data = $request->validated();
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
        $company->domain = $data['domain'];
        $company->slug = Str::slug($data['name']). strval(rand(1111, 9999));
        $company->phone = $data['phone'];
        $company->address = $data['address'];
        $company->about = $data['about'];
        if($data['company_email'] != $company->company_email)
        {
            $company->company_email = $data['company_email'];
        }
        if($data['agrement'] != $company->agrement)
        {
            $company->agrement = $data['agrement'];
        }
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $company->statut = 'en attente';
        }
        if($request->input('fax'))
        {
            $company->fax = $data['fax'];
        }
        if($request->input('facebook'))
        {
            $company->fb_user = $data['facebook'];
        }
        if($request->input('site_url'))
        {
            $company->site_url = $data['site_url'];
        }
        if($request->input('instagram'))
        {
            $company->insta_user = $data['instagram'];
        }
        if($request->input('linkedin'))
        {
            $company->link_user = $data['linkedin'];
        }
        
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
        $profil = Company_profile::where('slug', $slug)->where('statut', 'vérifié')->firstOrFail();
        return view('company.public_profil', compact('profil'));
    }
    // account & sec
    public function account()
    {
        return view('company.securité');
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

}
