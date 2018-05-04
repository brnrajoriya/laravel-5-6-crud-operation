<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('businesses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name'], '-').'-'.time();
        Auth::user()->businesses()->create($data);
        //Business::create($request->all());
        return redirect('my-businesses')->with('status', 'Businesses has been created.
            ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $business = Business::whereSlug($slug)->first();
        return view('businesses.show')->with('business', $business);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $business = Business::whereSlug($slug)->first();
        return view('businesses.edit')->with('business', $business);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name'], '-').'-'.time();
        $business = Business::whereSlug($slug)->first();
        $business->update($data);
        return redirect('my-businesses')->with('status', 'Businesses has been updated.
            ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $business = Business::whereSlug($slug)->first();
        $business->delete();
        return redirect('my-businesses')->with('status', 'Businesses has been deleted.
            ');
    }
}
