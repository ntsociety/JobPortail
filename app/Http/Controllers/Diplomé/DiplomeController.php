<?php

namespace App\Http\Controllers\Diplomé;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Employe_profile;
use App\Models\User;
use App\Models\UserApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function update(Request $request)
    {
        $employ = Employe_profile::find(Auth::id());
        $data = $request->all();
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

}
