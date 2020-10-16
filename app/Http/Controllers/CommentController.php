<?php

namespace App\Http\Controllers;

use App\comment;
use App\post;
use Illuminate\Http\Request;
use App\Http\Requests;
// use App\Http\Resources\Comment as CommentResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = comment::paginate(4);
        
        dd($comment);
        return view('post',compact('comment'));
        // return new CommentResource($comment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment.commnet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request('txt')){
            $data = $request->validate([
                'txt'=>'required',
                'media'=>'nullable|image'
            ]);
            }elseif(request('media')){
                $data = $request->validate([
                    'txt'=>'nullable',
                    'media'=>'required|image'
                ]);
            }
        if(request('media')){
            $path= request('media')->store('','public');
            $path3 = $request->file('media');
            
            if($path3->getClientOriginalExtension() !== 'svg'){
                $path2 = \Image::make(public_path("storage/{$path}"))->fit(1200,1200);
            $path2->save();
            }else{
                \File::copy(public_path("storage/{$path}"),public_path("storage/{$path}") );
            }
            }else{
                $path = '';
            }
    //    $comm =  new comment;
    //    $comm->title = $request->input('title');
    //    $comm->txt = $request->input('txt');
       
    //    $comm->media = $path??'';
       
    //    $comm->save();
           
            
       $data = request()->validate([
           'txt' =>'nullable',
           'media'=>['nullable','image'],
           'post_id'=>'',
           'user_id'=>''
       ]);

       $com = new comment();
       $com->fill($data);
        $com->save();
    //    $com->comments::create([
    //        'txt' => $data['txt'],
    //        'media'=> $path,
    //    ]);
       //comment::create($data);
           return redirect('/profile/'.auth()->user()->id);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($comment)
    {
        $commen = comment::findOrFail($comment);
        
        // return new CommentResource($commen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comment)
    {
        $comm = comment::findOrFail($comment);
       $comm->user_id = auth()->user()->id;
       $comm->txt = $request->input('txt');
       $comm->media = $request->input('media');
       if($comm->save()){
           return new CommentResource($comm);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        $commen = comment::findOrFail($comment);
        if($commen->delete()){
        return new CommentResource($commen);
        }
    }
}
