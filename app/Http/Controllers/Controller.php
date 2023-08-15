<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\SaveJob;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        return view('index');
    }
    public function job_liste()
    {
        $job = Job::orderBy('created_at', 'desc')->get();
        return view('jobs-listes', compact('job'));
    }
    public function pdfView()
    {
        // $pdfPath = public_path('assets/diplomé/cv/'.Auth::user()->diplome->cv);
        // dd($pdfPath);
        return view('pdf_view');
    }

}
