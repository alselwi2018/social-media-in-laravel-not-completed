<?php

namespace App\Http\Controllers;

use App\side;
use Illuminate\Http\Request;

class SideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = App\User::findOrFail($id);
        
        dd($user);
        return view('side',['user'=>$user]);
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
     * @param  \App\side  $side
     * @return \Illuminate\Http\Response
     */
    public function show(side $side)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\side  $side
     * @return \Illuminate\Http\Response
     */
    public function edit(side $side)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\side  $side
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, side $side)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\side  $side
     * @return \Illuminate\Http\Response
     */
    public function destroy(side $side)
    {
        //
    }
}
