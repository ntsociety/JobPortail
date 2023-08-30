<?php

namespace App\Http\Controllers\Diplomé;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiplomerRequest;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\PassewordRequest;
use App\Models\Apply;
use App\Models\Employe_profile;
use App\Models\User;
use App\Models\UserApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DiplomeController extends Controller
{
    public function profile()
    {
        return view('diplome.profile');
    }
    public function edit()
    {
        return view('diplome.edit');
    }
    public function update(DiplomerRequest $request)
    {
        $employ = Employe_profile::find(Auth::id());
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'f_name' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'numeric', 'digits:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employe_profiles'],
            'address'=>['nullable', 'string', 'max:255'],
            'bio'=>['nullable', 'string'],
            'domain'=>['nullable', 'string', 'max:255'],
            'experience_years'=>['nullable', 'string', 'max:255'],
            'fb_user'=>['nullable', 'string', 'max:255'],
            'twit_user'=>['nullable', 'string', 'max:255'],
            'link_user'=>['nullable', 'string', 'max:255'],
            "photo_profil" => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            "cv" => ['nullable', 'file', 'mimes:pdf', 'max:5000'],
        ]);
        if ($request->hasFile('photo_profil'))
        {
            // supprimé l'ancienne photo profile
            $path = 'assets/diplomé/photo-profile/'.$employ->photo_profil;
            if($employ->cv)
            {
                unlink($path);
            }

            // dd($data['cover']);
            $file = $request->file('photo_profil');
            // $ext = $file->getClientOriginalExtension();

            $imageName=date('d-m-Y').'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/diplomé/photo-profile/',$imageName);
            $employ->photo_profil = $imageName;
        }
        if ($request->hasFile('cv'))
        {
            // supprimé l'ancienne cv
            $path = 'assets/diplomé/cv/'.$employ->cv;
            if($employ->cv)
            {
                unlink($path);
            }

            // dd($data['cover']);
            $file = $request->file('cv');
            // $ext = $file->getClientOriginalExtension();
            $cvName=date('d-m-Y').'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/diplomé/cv/',$cvName);
            $employ->cv = $cvName;
        }
        // update user info
        $user = User::find(Auth::id());
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->update();

        $employ->f_name = $data['f_name'];
        $employ->slug = Str::slug($data['name']);
        $employ->phone = $data['phone'];
        $employ->address = $data['address'];
        $employ->bio = $data['bio'];
        $employ->domain = $data['domain'];
        $employ->experience_years = $data['experience_years'];
        $employ->fb_user = $data['facebook'];
        $employ->twit_user = $data['twitter'];
        $employ->link_user = $data['linkedin'];
        $employ->update();
        return redirect()->route('diplome-profile')->with('message', 'Merci pour votre confiance en nous !');
    }
    public function applied()
    {
        $job = UserApply::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        // dd($job);
        return view('diplome.applied', compact('job'));
    }
    public function public_profile($slug)
    {
        if(Employe_profile::where('slug', $slug)->exists())
        {
            $diplome = Employe_profile::where('slug', $slug)->first();
            return view('diplome.profil_public', compact('diplome', ));
        }
        else
        {
            return redirect('/')->with('status', "slug n'existe pas");
        }
    }
    public function account()
    {
        return view('diplome.compte_sec');
    }
    public function update_account_email(EmailRequest $request)
    {
        $user = User::find(Auth::id());
        $user_profil = Employe_profile::find(Auth::id());
        $data = $request->validated();
        $user->email = $data['email'];
        $user_profil->email = $data['email'];
        $user->update();
        $user_profil->update();
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
