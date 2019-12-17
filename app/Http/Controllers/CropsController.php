<?php

namespace App\Http\Controllers;

use App\Crops;
use Illuminate\Http\Request;

class CropsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crops  $crops
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $crop = Crops::all();
       dd($crop);
        return view ('crops.show', array('crops'=> $crop));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crops  $crops
     * @return \Illuminate\Http\Response
     */
    public function edit(Crops $crops)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crops  $crops
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crops $crops)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crops  $crops
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crops $crops)
    {
        //
    }
}
