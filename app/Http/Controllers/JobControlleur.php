<?php

namespace App\Http\Controllers;

use App\Mail\OffrePostuleEmail;
use App\Models\Apply;
use App\Models\Category;
use App\Models\Employe_profile;
use App\Models\Job;
use App\Models\SaveJob;
use App\Models\Search;
use App\Models\UserApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobControlleur extends Controller
{
    public function job_liste()
    {
        $job = Job::orderBy('created_at', 'desc')->get();
        return view('job.jobs-listes', compact('job'));
    }
    public function single_job($slug)
    {
        if(Job::where('slug', $slug)->exists())
        {
            $category = Category::where('id', '!=', 1)->orderBy('created_at', 'desc')->get();
            $job = Job::where('slug', $slug)->first();
            $job_relat = Job::where('cate_id', $job->cate_id)->where('id', '!=', $job->id)->orderBy('created_at', 'desc')->take(5)->get();
            $saved = SaveJob::where('job_id', $job->id)->where('user_id', Auth::id())->first();
            $applied = Apply::where('job_id', $job->id)->where('diplomer_id', Auth::id())->first();
            return view('job.single', compact('job', 'job_relat', 'saved', 'category', 'applied'));
        }
        else
        {
            return redirect('/')->with('status', "slug n'existe pas");
        }

    }
    public function save_job($id)
    {
        $save_job = new SaveJob();
        $save_job->user_id = Auth::id();
        $save_job->job_id = $id;
        $save_job->save();
        return redirect()->back()->with('message', 'Job enregistré avec succès!');
    }
    public function post_job($slug)
    {
        if(Job::where('slug', $slug)->exists())
        {
            $job = Job::where('slug', $slug)->first();
            return view('diplome.apply', compact('job'));
        }
        else
        {
            return redirect('/')->with('status', "slug n'existe pas");
        }
    }
    public function apply_job(Request $request, $id)
    {
        $employ = Employe_profile::find(Auth::id());
        $job = Job::find($id);

        $apply_job = new Apply();
        $apply_job->company_id = $job->user_id;
        if($employ->cv)
        {
            $data = $request->validate([
                'cv' => ['nullable'],
            ]);
        }
        else{
            $data = $request->validate([
                'cv' => ['required'],
            ]);
        }
        if ($request->hasFile('cv'))
        {
            // dd($data['cover']);
            $file = $data['cv'];
            // $ext = $file->getClientOriginalExtension();
            $cvName=date('d-m-Y').'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;

            // $file->move('assets/diplomé/cv/',$cvName);
            $file->move('assets/diplomé/cv/',$cvName);
            $apply_job->cv = $cvName;

        }
        else{
            $apply_job->cv =$employ->cv;

        }

        // dd($cv_path);



        $apply_job->diplomer_id = Auth::id();
        $apply_job->job_id = $id;
        $apply_job->app_num = rand(1111, 9999);
        $apply_job->save();

        // user apply info
        $apply = Apply::where('app_num', $apply_job->app_num)->first();
        $company_email = $job->user->company->email;
        $file_path =  'assets/diplomé/cv/'.$apply->cv;
        // dd($company_email);
        // dd($cv_path);
        $data = [
            'company_name' => $apply->company->name,
            'diplomer_name' => $apply->diplomer->name,
            'diplomer_f_name' => $apply->diplomer->f_name,
            'diplomer_exp_years' => $apply->diplomer->experience_years,
            'diplomer_bio' => $apply->diplomer->bio,
            'diplomer_slug' => $apply->diplomer->slug,
        ];
        // dd($data);

        // send mail
        $files = [
            public_path('assets/diplomé/cv/'.$apply->cv),
        ];



        try{
            Mail::to("$company_email")->send(new OffrePostuleEmail($apply, $file_path));
            // Mail::send('email.postule_email', $data, function($message)use($company_email, $file_path) {
            //     $message->to($company_email)
            //             ->subject('Nouveau Candidat');

            //         $message->attach($file_path);
            //     // foreach ($files as $file){
            //     //     $message->attach($file);
            //     // }
            // });
            return redirect()->back()->with('message', 'Job postulé avec succès!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', "Quelques choses s'est mal passé! $e");
        }

    }
    public function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $job = Job::where('cate_id', $category->id)->get();
            return view('job.job_category', compact('job', 'category'));
        }
        else
        {
            return redirect('/')->with('status', "slug n'existe pas");
        }
    }
    public function search()
    {
        $search_text = $_GET['search'];
        $region = $_GET['region'];
        $type = $_GET['type'];
        $job = Job::where('title', 'LIKE', '%'.$search_text.'%')
        ->orWhere('company', 'LIKE', '%'.$search_text.'%')
        ->orWhere('region', 'LIKE', '%'.$region.'%')
        ->orWhere('type', 'LIKE', '%'.$type.'%')->orderBy('created_at', 'desc')->get();

        // search trend
        $keyword = new Search();
        $keyword->keyword = $search_text . '_'. $region;
        if($job->count() == 0)
        {
            $keyword->result = 0;
        }
        $keyword->save();
        return view('job.search', compact('job', 'search_text'));
    }
}
