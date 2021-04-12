<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdHolder;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdRequest;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ads.index',[
            'ads' => Ad::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create',[
            'holders' => AdHolder::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdRequest $request)
    {
        $date_from = new \DateTime($request->date_from);
        $date_to = new \DateTime($request->date_to);
        $current_date = new \DateTime("now");

        if($date_from < $current_date and $date_to > $current_date){
            $request->merge([
                'published' => 1
            ]);    
        }else{
            $request->merge([
                'published' => 0
            ]);
        }

        // unify frequency types to be minutes
        if($request->frequency_type == "h"){
            $request->merge([
                'frequency' => $request->frequency * 60
            ]);
        }


        $ad = Ad::create($request->all());
        $ad->set_image($request->image);

        return redirect()->route('admin.ads.index')->with('status','the new ad is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
