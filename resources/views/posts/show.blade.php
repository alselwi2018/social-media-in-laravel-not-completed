@extends('layouts.app')

@section('content')

@include('side')
<br>
    <div class="container mx-auto px-6 md:px-0 d-flex pt-4" style="background-color: white;">
        <div class="row">
       <div class="col-sm-12">
            {{$post->post}}
       </div>
       @if($post->media)
       <div class="col-sm-8 text-center">
       <img src="/storage/{{$post->media}}" class="p-5 w-100" style="left: 30%;" alt="">
       </div>
       @endif
        </div>
    </div>
    @foreach ($post->comments as $comment)
    <div class="row">
        <div class="col-sm-12">
    <div class="flex">
        <div class="col-sm-4">
            
            <img src={{ (url('/images/thumbs/thm_'.$comment->user->picture))??'' }} width="80px" class="rounded-circle" />
         </div>
        <div class="col-sm-8">
        <p>{{($comment->txt)}}</p>
        @if($comment->media)
        <div class="col-sm-12">
           <img src="{{$comment->media}}" alt="" class="w-100">
        </div>
        @endif
     </div>
    </div>
        </div>
    </div>
    @endforeach
    {{-- <div class="col-sm-12">
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
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        
        <div class="flex flex-wrap mb-6">
                
                <button class="btn btn-primary" type="submit" >Send</button>
            </div>
        </form>
    </div> --}}
@endsection
