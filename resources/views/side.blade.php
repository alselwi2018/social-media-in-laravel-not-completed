{{-- <div class=" border-right side-sticky" id="sidebar"  >
    @if(auth()->user())
    <div class="d-flex">
        <div class="row">
        <div class="col-sm-6 ">
    <img src="images/s.png" class="rounded-circle pt-4"/>
        </div>
        <div class="col-sm-6 text-center">
            <br>
        <div class="pt-5">{{ $user->username??'' }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 pt-4">
        
        <small>
        <div class="d-flex">
        <div class="d-flex"><b>
           
           {{ App\User\posts()->count()??'' }}
           
            </b> <div class="pl-1 pr-2">posts</div></div>
        <div class="d-flex"><b>13k</b> <div class="pr-2">followers</div></div>
        <div class="d-flex"><b>10k</b> <div class="">following</div></div>
        </div>
        </small>
        <div class="pt-3">
            {{$user->profile->discription??''}}
        <div><a href="{{$user->profile->url??''}}">{{$user->profile->url??'N/A'}}</a></div>
        </div>
        <a href="/post/create" class="btn btn-primary">Add Post</a>
    </div>
    @endif
</div> --}}

{{-- @if(Auth::user())
        
           
        <div class="col-sm-12 border-right side-sticky" id="sidebar"  >
            <div class="d-flex">
                <div class="row">
                <div class="col-sm-6 ">
            <img src="/images/s.png" class="rounded-circle pt-4"/>
                </div>
                <div class="col-sm-6 text-center">
                    <br>
                <div class="pt-5">{{ Auth::user()->username??'' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 pt-4">
                
                <small>
                <div class="d-flex">
                <div class="d-flex"><b>{{
                    Auth::user()->posts->count()??''
                    }}</b> <div class="pl-1 pr-2">posts</div></div>
                <div class="d-flex"><b>13k</b> <div class="pr-2">followers</div></div>
                <div class="d-flex"><b>10k</b> <div class="">following</div></div>
                </div>
                </small>
                <div class="pt-3">
                    {{$user->profile->discription??''}}
                <div><a href="{{$user->profile->url??''}}">{{$user->profile->url??'N/A'}}</a></div>
                </div>
                <a href="/post/create" class="btn btn-primary">Add Post</a>
            </div>
            <div class="flex-1" style="position : absolute;
            bottom   : 40px">
                @guest
                    <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="text-blue-300 text-sm pr-4 nav-link dropdown-toggle" 
                    href="#" data-toggle="dropdown">{{ Auth::user()->username }} <span class="caret"></span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline text-black-300 text-sm p-3 drop-item"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    </div>
                @endguest
            </div>
        
        @endif --}}
        
        <div id="wrapper" class="toggled">
            
            <div id="sidebar-wrapper">
              
        @if(Auth::user())
        
                <div class="sidebar-nav">

                <div class="sidebar-brand">
                    
                    <div class="col-sm-12">
            <div class="d-flex justify-content-center pt-3">
                <div class="">
                    <a  href="/p/Picture">
                <img src={{ (url('/images/thumbs/thm_'.Auth::user()->picture))??'' }} width="80px" class="rounded-circle" />
                    </a>    
                </div >
                <div class="ml-4">{{ Auth::user()->username??'' }}</div>
                    
   
            </div>
                    </div>
            <div class="col-sm-12 pt-4">
                
                <small>
                <div class="d-flex">
                <div class="d-flex"><b>{{
                    Auth::user()->posts->count()??'None'
                    }}</b> <div class="pl-1 pr-2">posts</div></div>
                <div class="d-flex"><b>13k</b> <div class="pr-2">followers</div></div>
                <div class="d-flex"><b>10k</b> <div class="">following</div></div>
                </div>
                </small>
                
                <a href="#" class="close" data-dismiss="toggle">&times;</a>
                <div class="pt-3">
                    {{$user->profile->discription??''}}
                <div><a href="{{$user->profile->url??''}}">{{$user->profile->url??'N/A'}}</a></div>
                </div>
                <a href="/post/create" class="btn btn-primary">Add Post</a>
            </div>
            <div class="flex-1" style="position : absolute;
            bottom   : -300px">
                @guest
                    <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="text-blue-300 text-sm pr-1 nav-link dropdown-toggle" 
                    href="#" data-toggle="dropdown">{{ Auth::user()->username }} <span class="caret"></span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline text-blue-300 text-sm p-3 drop-item"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="color: black;"><span class="fa fa-sign-out" style="font-size: 34px;"></span>{{ __('Logout') }}</a></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    </div>
                @endguest
            </div>
                </div>
                </div>
   
    @endif
    
    
</div>
    </div>
   