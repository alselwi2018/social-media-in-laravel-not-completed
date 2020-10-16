<?php

namespace App\Http\Controllers;

use App\Profile;
use App\comment;
use App\User;
use Illuminate\Http\Request;
use \Image;
class ProfilesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\App\User $user)
    {
        //$user = User::findOrFail($id);
        //$com = comment::where('id', $post->id)->orderBy('created_at','desc')->get();
        
        // $com = \App\comment::where('post_id',$user->posts->id);
        // dd($com);
       $comment = comment::all();
       
        return view('home',compact('user'));
       
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
     * @param  \App\Profile  $profiles
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profiles)
    {
        $user = User::findOrFail($id);
        //$com = comment::where('id', $post->id)->orderBy('created_at','desc')->get();
        
       dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profiles
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profiles)
    {
        //
    }
    public function user_picture(){
        $user = \Auth::user();
     
    	return view('user.picture')->with('user',$user);
    }
    public function update_avatar(Request $request){

        if($request->hasFile('picture')){
            // $avatar = $request->file('picture');
            // $filename = time() . '.' . $avatar->getClientOriginalExtension();
            // Image::make($avatar)->resize(300, 300)->save( '/images/' . $filename  );
            $image = $request->file('picture');
            // $img = time().'.'.$image->getClientOriginalExtension();
            $imageName = date("dHis-").preg_replace("/[^a-zA-Z0-9.]/","",$image->getClientOriginalName());  
            // $watermark = Image::make($image);
            // $destinationPath = public_path('/images');
            // Image::make($image->getRealPath())->resize(300, 365, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->insert($watermark, 'center')->save($destinationPath.'/'.$img);            
            $uploadPath = public_path('/images/');
            $image->move($uploadPath,$imageName);
            //Thumbnail Creation
            $thumbPath = $uploadPath.'/thumbs/';
            \File::isDirectory($thumbPath) or \File::makeDirectory($thumbPath,0775,true,true);
            if($image->getClientOriginalExtension() != 'svg'){
                $imageThmb = Image::make($uploadPath.'/'.$imageName);
                $imageThmb->fit(300,300,function($constraint){$constraint->upsize();})->save($uploadPath.'/thumbs/thm_'.$imageName,80);
            }else{
                \File::copy($uploadPath.'/'.$imageName,$uploadPath.'/thumbs/thm_'.$imageName);
            }
            $user = \Auth::user();
            $user->picture = $imageName;
            $user->save();
        }

        return back()
        ->with('success','You have successfully upload image.');

}
}
