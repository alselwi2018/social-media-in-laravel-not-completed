{{-- @include('side') --}}
<div class="container">
    <div class="col-sm-12">
<div class=" mx-auto px-6 md:px-0 d-flex pl-4" style="background-color: #f5f5f5;">


@if (session('status'))
    <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="d-flex" id="wrapper">
       
        <div id="page-content-wrapper ">
            <div class="row">
                <div class="col-sm-12">
                       <div class="row">
                           @foreach($user->posts as $post)
                           <div class="col-sm-12 pt-3 pr-4 rounded">
                            <div class="col-sm-12 bg-white">
                                <div class="p-3">
                                <a href="/post/{{$post->id}}">{{$post->post}}</a>
                                </div>
                            </div>
                            @if($post->media)
                            <div class=" responsive-image text-center bg-white pb-2">
                            <a href="/post/{{$post->id}}"><img src="/storage/{{$post->media}}" style="border-radius: 8px;display: block;
                            margin-left: auto;
                            margin-right: auto;
                            width: 50%;height:400px;" alt=""   /></a>
                            </div>
                            @endif
                            <a href="/comment.create"><img src="/images/com2.png" width="50px" ></a>
                        <hr>
                        <div class="col-sm-12">
                            <div>
                                
                            </div>
                            </div>   
                        </div>
                            @endforeach
                            <br>
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>