<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            "cover" => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);
        // dd($data);
        $category = new Category();
        if ($request->hasFile('cover'))
        {
            // dd($data['cover']);
            $file = $data['cover'];
            // $ext = $file->getClientOriginalExtension();
            $imageName=date('d-m-Y').'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/category/couverture/',$imageName);
            $category->cover = $imageName;
        }


        $category->name = $data['name'];
        // $job->title = $data['campany'];
        $category->slug = Str::slug($data['name']);
        $category->save();
        return redirect()->route('category.index')->with('message', 'Catégorie ajouté avec succès!');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            "cover" => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ]);
        // dd($data);
        if ($request->hasFile('cover'))
        {
            $path = 'assets/category/couverture/'.$category->cover;
            if($category->cover)
            {
                unlink($path);
            }
            // dd($data['cover']);
            $file = $data['cover'];
            // $ext = $file->getClientOriginalExtension();
            $imageName=date('d-m-Y').'_'.$file->getClientOriginalName();
            // $filename = time().'.'.$ext;
            $file->move('assets/category/couverture/',$imageName);
            $category->cover = $imageName;
        }


        $category->name = $data['name'];
        // $job->title = $data['campany'];
        $category->slug = Str::slug($data['name']);
        $category->update();
        return redirect()->route('category.index')->with('message', 'Catégorie Modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $path = 'assets/category/couverture/'.$category->cover;
        if($category->cover)
        {
            unlink($path);
        }
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Supprimé Modifié avec succès!');
    }
}
