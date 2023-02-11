@extends('d3r')
@section('body')

<br>
<br>
<br>
<br>

@if ($book == 'null')
<div>null</div>
<a class="nav-link" href="{{env('app_url')}}/"><b>Library</b></a>
@else

@endif
@php
@endphp

<!-- delete book Modal -->
<div id="deleteBook" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
<div class="relative w-full h-full max-w-2xl md:h-auto">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Do you want delete this book?
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deleteBook">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
      
        <!-- Modal footer -->
        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
            <form action="{{env('app_url')}}delete/book" method="post">
                @csrf
                <input type="hidden" name="bookId" value="{{$book->id}}"> 
                <button data-modal-hide="deleteBook" 
                type="submit" class="text-white bg-blue-700 
                hover:bg-blue-800 focus:ring-4 focus:outline-none 
                focus:ring-blue-300 font-medium rounded-lg text-sm 
                px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
                dark:focus:ring-blue-800">
                I accept
               </button>
            </form>
            <button data-modal-hide="deleteBook" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
        </div>
    </div>
</div>
</div>





<div class="book-container">

    <div class="column1-book max-w-sm bg-white border border-gray-200 rounded-lg shadow-md 
    dark:bg-gray-800 dark:border-gray-700
    ">
    <!-- Modal toggle -->
<div id="buttonDeleteBook" >

<button data-modal-target="deleteBook" data-modal-toggle="deleteBook" 

type="button">
<i class="fas fa-trash cursor-pointer"></i>
</button>

</div>
<br>
       <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        {{$book->title}}
       </h5>
       <img class="rounded-t-lg m-auto " 
         src="{{env('STORAGE').'storage/app/public/images/' . $book->image}}" 
         alt="" 
         width="70%"/>
       <br>
       <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
       <b>Authors:</b> {{$book->authors}}
       </p>
       <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
       <b>Genre:</b>  {{$otherTables[0]->name}}
       </p>
       <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
       <b>For:</b>    {{$otherTables[1]->name}}
       </p>
       <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
       <b>Musical arrangements:</b> {{$book->musical_arrangements}}
       </p>
       <div class="image-book_container">

        <a href="{{env('STORAGE').'storage/app/public/files/'  . $book->file}}" 
        class="
        px-3 py-2 text-sm font-medium text-center 
        text-white bg-blue-700 rounded-lg 
        hover:bg-blue-800 focus:ring-4 
        focus:outline-none focus:ring-blue-300 
        dark:bg-blue-600 dark:hover:bg-blue-700
        dark:focus:ring-blue-800
        "
        download="{{$book->file}}">
        Download
        </a>
       </div>

    
    
    


    </div>
    
    


    {{--  --}}

    
@livewire('reviews-for-book')
         
@livewireScripts 

</div>








{{-- @livewire('reviews-for-book')
         
@livewireScripts --}}

@endsection







