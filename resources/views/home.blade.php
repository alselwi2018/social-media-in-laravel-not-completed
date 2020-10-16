@extends('layouts.app')
<style>
.wraptocenter img {
  margin-left: auto;
  margin-right: auto;
  display: block;
}
body{
    background-color: gray;
}
</style>
@section('content')

   
        {{-- <div class="col-sm-4 border-right"> --}}
           
        @include('side')
        
        <div class="col-sm-12" >
            
            <div class=" mx-auto px-6 md:px-0 d-flex pl-4" >
            
            
            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
               
                            <div class="col-sm-12 bg-gray">
                                   <div class="row " >
                                       
                                       @foreach($user->posts as $post)

                                       
                                     {{--This is a coment--}}
                                       <div class="col-sm-12 container rounded p-1 bg-white border ">
                                           
                                               <div class="flex">
                                           <div class="col-sm-3">
                                            <img src={{ (url('/images/thumbs/thm_'.Auth::user()->picture))??'' }} width="80px" class="rounded-circle" />
                                           </div>
                                           <div class="col-sm-9">
                                            <a href="/post/{{$post->id}}">
                                        <div class="col-sm-12" >
                                            <div class="p-3" >
                                            {{$post->post}}
                                            </div>
                                        </div>
                                        @if($post->media)
                                        <div class=" responsive-image text-center pb-2 ">
                                         <a href="/post/{{$post->id}}"><img src="/storage/{{$post->media}}" style="border-radius: 8px;display: block;
                                        margin-left: auto;
                                        margin-right: auto;
                                        width: 50%;height:400px;" alt=""   />
                                        </div>

                                        @endif
                                            </a>
                                           </div>
                                               </div>
                                          
                                        <div class="wraptocenter col-sm-12 text-center " style="border-radius: 8px;display: block;
                                        margin-left: auto;
                                        margin-right: auto;
                                        ">
                                        <div class="flex">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-4">
                                       <a href="/post/comment/{{$post->id}}">
                                        <img src="/images/com2.png" data-toggle="modal" data-target="#myModal" width="35px" />
                                       </a>
                                            </div>
                                            <div class="col-sm-4"></div>
                                        </div>
                                    
                                        </div>
                                        
                                     
                                           
                                        
                                          
                                           {{-- <p>
                                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                              Link with href
                                            </a>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                              Button with data-target
                                            </button>
                                          </p>
                                          <div class="collapse" id="collapseExample">
                                            <div class="card card-body">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                            </div>
                                          </div> --}}
                                        
                                        
                                       
                                       
                                       
                                       </div>
                                      
                                       
                                       {{-- <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                    <div class=" mx-auto px-6 md:px-0 d-flex pt-3" style="background-color: white;">
                                        <div class="col-sm-8 offset-2">
                                            <h1>Comment</h1>
                                        <form class="w-full p-6"  action="/comment" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="flex flex-wrap mb-6">
                                                <label for="txt" class="block text-gray-700 text-sm font-bold mb-2">
                                                    {{ __('Comment') }}:
                                                </label>
                                
                                                <textarea id="post" class="form-input w-full @error('txt')  border-red-500 @enderror" name="txt" value="{{ old('txt') }}" autocomplete="txt" autofocus></textarea>
                                
                                                @error('txt')
                                                    <p class="text-red-500 text-xs italic mt-4">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            <div class="flex flex-wrap mb-6">
                                                <label for="media" class="block text-gray-700 text-sm font-bold mb-2">
                                                    {{ __('file/Image') }}:
                                                </label>
                                
                                                <input id="media" type="file" class="form-input w-full @error('media')  border-red-500 @enderror" name="media" value="{{ old('media') }}"  autocomplete="media" autofocus>
                                
                                                @error('media')
                                                    <p class="text-red-500 text-xs italic mt-4">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        
                                        <div class="flex flex-wrap mb-6">
                                                
                                                <button class="btn btn-primary" type="submit" >Send</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                          </div>
                                        </div>
                                    </div> --}}
                                        @endforeach
                                        
                                   </div>
                                  
                            </div>
                        </div>
                  
             
    </div>
    
    
@endsection
