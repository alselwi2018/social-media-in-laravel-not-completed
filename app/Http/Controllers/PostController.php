<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{

    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }
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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request('post')){
        $data = $request->validate([
            'post'=>'required',
            'media'=>'nullable|image'
        ]);
        }elseif(request('media')){
            $data = $request->validate([
                'post'=>'nullable',
                'media'=>'required|image'
            ]);
        }
        if(request('media')){
        $path= request('media')->store('','public');
        $path3 = $request->file('media');
        
        if($path3->getClientOriginalExtension() !== 'svg'){
            $path2 = Image::make(public_path("storage/{$path}"))->fit(1200,1200);
        $path2->save();
        }else{
            \File::copy(public_path("storage/{$path}"),public_path("storage/{$path}") );
        }
        }else{
            $path = '';
        }
        
        auth()->user()->posts()->create([
            'post' => $data['post'],
            'media' => $path
        ]);
       
        return \redirect('profile/'.auth()->user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(\App\post $post)
    {
        

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }

    public function comment(\App\post $post){
        return view('posts.comment',compact('post'));
    }
}
