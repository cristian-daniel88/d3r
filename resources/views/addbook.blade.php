@extends('d3r')
@section('body')
<div class="h-28"></div>
<h2 class="text-center uppercase 
text-inherit text-xl

tracking-wider
"
>Add Book</h2>
<br>


@if (!empty($failed))
    <p class='p-alert' style='color:red; text-align:center'> {{$failed}}</p>
@else
<p class='p-alert' style='color:red; text-align:center'></p>
@endif

<div class="w-full max-w-xl m-auto my-auto ">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    method="POST" action="{{env('app_url')}}addbook" enctype="multipart/form-data"
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
          <label class="block text-gray-700 text-sm font-bold mb-2" 
          for="genre">
           Genre:
          </label>
          <select class="shadow appearance-none border rounded w-full py-2 px-3 
          text-gray-700 leading-tight focus:outline-none 
          focus:shadow-outline" name="genre" id="genre">   
          <option selected class="text-gray-500" 
           value="">
          --Please choose an option--
          </option>
            @foreach ($genres as $item)
            <option value="<?php echo $item['id'] ?>" >
                <?php echo $item['name']; ?>
            </option>
            @endforeach
          </select>
          <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" 
      for="instrument">
       Instrument/Orquesta:
      </label>
      <select class="shadow appearance-none border rounded w-full py-2 px-3 
      text-gray-700 leading-tight focus:outline-none 
      focus:shadow-outline" name="instrument" id="instrument">   
      <option selected class="text-gray-500" 
       value="">
      --Please choose an option--
      </option>
        @foreach ($instruments as $item)
        <option value="<?php echo $item['id'] ?>" >
            <?php echo $item['name']; ?>
        </option>
        @endforeach
      </select>
      <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="authors">
          Authors:
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="authors" 
        id="authors" type="text" placeholder="Authors">
        <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="arrangements">
        Musical arrangements
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 
      text-gray-700 leading-tight focus:outline-none 
      focus:shadow-outline" name="arrangements" 
      id="arrangements" type="text" placeholder="Musical arrangements">
      <p class="text-red-500 text-xs italic"></p>
    </div>


    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
          Photo:  <p style="display: inline" class="text-xs italic">(Only jpg or png file)</p>
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="image" 
        id="image" type="file" >
        <p class="text-red-500 text-xs italic"></p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
          File: <p style="display: inline" class="text-xs italic">(Only pdf file)</p>
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 
        text-gray-700 leading-tight focus:outline-none 
        focus:shadow-outline" name="file" 
        id="file" type="file" >
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
    console.log(document.getElementsByTagName('input').length)

    for (let index = 0; index < document.getElementsByTagName('input').length; index++) {
      document.getElementsByTagName('input')[index].addEventListener("click" , () => {
       
          document.getElementsByClassName('p-alert')[0].innerHTML = "";
          
        
      })
      
    }

    for (let index = 0; index < document.getElementsByTagName('select').length; index++) {
      document.getElementsByTagName('select')[index].addEventListener("click" , () => {
      
          document.getElementsByClassName('p-alert')[0].innerHTML = "";
          
        
      })
      
    }

  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
  }
      
  </script>
@endsection