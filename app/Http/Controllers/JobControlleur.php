<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Category;
use App\Models\Employe_profile;
use App\Models\Job;
use App\Models\SaveJob;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('job.single', compact('job', 'job_relat', 'saved', 'category'));
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
            $file->move('assets/diplomé/postule/joints/',$cvName);
            $apply_job->cv = $cvName;
        }
        else{
            $apply_job->cv =$employ->cv;
        }
        $apply_job->diplomer_id = Auth::id();
        $apply_job->job_id = $id;
        $apply_job->save();
        return redirect()->back()->with('message', 'Job postulé avec succès!');
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
