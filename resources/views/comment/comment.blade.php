@extends('layouts.app')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>

<script>
   function getMessage() {
      $.ajax({
         type:'POST',
         url:'/post',
         data:'_token = <?php echo csrf_token() ?>',
         success:function(data) {
            $("#msgpost").html(data.msg);
         }
      });
   }
</script>
@section('content')
@include('side')
<br><br>
    <div class="container mx-auto px-6 md:px-0 d-flex pt-3" style="background-color: white;">
        <div class="col-sm-8 offset-2">
            <h1>Comment</h1>
        <form class="w-full p-6"  action="comment.create" method="POST" enctype="multipart/form-data">
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
            <div class="flex flex-wrap mb-6">
                
                <button class="btn btn-primary" type="submit" >Send</button>
            </div>
        </form>
        </div>
    </div>
@endsection
