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
        return view('offres.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('id', '!=', 1)->orderBy('created_at', 'desc')->get();
        return view('offres.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OffreRequest $request)
    {
        /*

        g('slug');
        g('title');
        g('campany')->nullable
        g('region')->nullable(
        g('type')->nullable();
        g('vacancy')->nullable
        g('experience')->nulla
        g('salary')->nullable(
        g('gender')->nullable(
        g('apps_deadline')->nu
        'description')->nullab
        'responsibilities')->n
        'education_experience'
        'other_benifits')->nul
        g('cover')->nullable()
        an('is_available')->de
        an('is_verify')->defau

        */
        $data = $request->validated();
        // dd($data);
        $job = new Job();
        $job->user_id = Auth::id();


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
        $job->responsibilities = $data['responsibilities'];
        $job->education_experience = $data['education_experience'];
        $job->other_benifits = $data['other_benifits'];
        $job->save();
        return redirect()->route('offres.index')->with('message', 'Emploi ajouté avec succès!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
