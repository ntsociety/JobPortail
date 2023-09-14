<?php

namespace App\Http\Controllers\Employeur;

use App\Http\Controllers\Controller;
use App\Http\Requests\OffreRequest;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offre = Job::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('company.offres.index', compact('offre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('id', '!=', 1)->orderBy('created_at', 'desc')->get();
        return view('company.offres.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OffreRequest $request)
    {
        
        $data = $request->validated();
        // dd($data);
        $job = new Job();
        $job->user_id = Auth::id();
        if ($request->hasFile('cover'))
        {
            // dd($data['cover']);
            $file = $data['cover'];
            // $ext = $file->getClientOriginalExtension();
            $imageName=date('d-m-Y').'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/job/couverture/',$imageName);
            $job->cover = $imageName;
        }
        if(Category::where('id', $data['cate_id'])->exists())
        {
            $job->cate_id = $data['cate_id'];
        }
        $job->title = $data['title'];
        // $job->title = $data['campany'];
        $job->slug = Str::slug($data['title']);
        $job->region = $data['region'];
        $job->type = $data['type'];
        $job->vacancy = $data['vacancy'];
        $job->experience = $data['experience'];
        $job->salary = $data['salary'];
        $job->gender = $data['gender'];
        $job->apps_deadline = $data['apps_deadline'];
        $job->description = $data['description'];
        // $job->responsibilities = $data['responsibilities'];
        // $job->education_experience = $data['education_experience'];
        // $job->other_benifits = $data['other_benifits'];
        $job->save();
        return redirect()->route('offres.index')->with('message', 'offre ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $job = Job::where('slug', $slug)->where('user_id', Auth::id())->firstOrFail();
        $category = Category::orderBy('created_at', 'desc')->where('id', '!=', 1)->get();
        return view('company.offres.edit', compact('job', 'category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OffreRequest $request, $slug)
    {
        $job = Job::where('slug', $slug)->where('user_id', Auth::id())->firstOrFail();
        if($job->user_id == Auth::id())
        {
            $data = $request->validated();
            // dd($data);
            if ($request->hasFile('cover'))
            {
                if($job->cover)
                {
                    $path = "assets/job/couverture/".$job->cover;
                    unlink($path);
                }
                // dd($data['cover']);
                $file = $data['cover'];
                // $ext = $file->getClientOriginalExtension();
                $imageName=date('d-m-Y').'_'.$file->getClientOriginalName();
                // $filename = time().'.'.$ext;
                $file->move('assets/job/couverture/',$imageName);
                $job->cover = $imageName;
            }

            $job->title = $data['title'];
            if(Category::where('id', $data['cate_id'])->exists())
            {
                $job->cate_id = $data['cate_id'];
            }
            // $job->title = $data['campany'];
            $job->slug = Str::slug($data['title']);
            $job->region = $data['region'];
            $job->type = $data['type'];
            $job->vacancy = $data['vacancy'];
            $job->experience = $data['experience'];
            $job->salary = $data['salary'];
            $job->gender = $data['gender'];
            $job->apps_deadline = $data['apps_deadline'];
            $job->description = $data['description'];
            // $job->responsibilities = $data['responsibilities'];
            // $job->education_experience = $data['education_experience'];
            // $job->other_benifits = $data['other_benifits'];
            $job->is_available = $request->input('is_available') == True ? '1':'0';
            $job->update();
            return redirect()->route('offres.index')->with('message', 'offre Modifié avec succès!');
        }else{
            return redirect()->back()->with('status', "action non autorisée");
        }
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
