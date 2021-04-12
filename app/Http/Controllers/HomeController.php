<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdHolderJob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = AdHolderJob::where('stage',1)->with('ad.image')->get();
        
        foreach ($jobs as $job) {
            $ad = $job->ad;
            $ad->views++;
            $ad->save(); 
        }


        return view('welcome',[
            'jobs' => $jobs
        ]);
        // return view('home');
    }
}
