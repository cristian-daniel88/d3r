@extends('d3r')
@section('body')
<div class="h-28"></div>
<h2 class="text-center uppercase 
text-inherit text-xl

tracking-wider
"
>Add Backing Track</h2>
<br>

@if (!empty($failed))
    <p class='p-alert' style='color:red; text-align:center'> {{$failed}}</p>
@else
<p class='p-alert' style='color:red; text-align:center'></p>
@endif

<div class="w-full max-w-xl m-auto my-auto ">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    method="POST" action="{{env('app_url')}}addaudio" enctype="multipart/form-data"
    >
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
          Title:
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="title" id="title" type="text" placeholder="Title">
        <p class="text-red-500 text-xs italic"></p>
    </div>
    
   
 
 
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="genre">
          Genre:
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="genre" 
        id="genre" type="text" placeholder="Genre">
        <p class="text-red-500 text-xs italic"></p>
    </div>



    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="audio">
          Audio: <p style="display: inline" class="text-xs italic">(Only Wav file)</p>
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="audio" 
        id="audio" type="file" >
        <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="flex items-center justify-between">
        <button class="bg-gray-500 hover:bg-slate-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
          Send
        </button>
    </div>

    </form>

  </div>

  <script>
    
    for (let index = 0; index < document.getElementsByTagName('input').length; index++) {
      document.getElementsByTagName('input')[index].addEventListener("click" , () => {
       
          document.getElementsByClassName('p-alert')[0].innerHTML = "";
          
        
      })
      
    }
  </script>

@endsection
