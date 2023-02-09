@extends('d3r')
@section('body')
<div class="h-14"></div>

@php $array = array();@endphp


    @foreach ($books as $key => $value)
    
    @if (!in_array($value->genre, $array))
    <br>
    <p class="text-black-50  text-3xl p-4 w-full border-l-4 border-indigo-500
    bg-gray-200">
        {{$array[$key] = $value->genre }}
    </p>
    <br>
    <div class="grid md:grid-cols-2 
    and lg:grid-cols-3 gap-7
    grid-books
    
    ">
    
    @foreach ($books as $book)
    
    @if ($book->genre  == $array[$key] )
    
    <div class="container-card shadow-lg bg-slate-100
     
     border-4 border-light-blue-500 border-opacity-25
     rounded
     ">
     <div class="column1-card">
         <div class="category_container">
             <p class="text-center border-r-4 
             border-l-4 border-indigo-200
             bg-slate-200
             ">
             {{ucfirst($book->genre)}}
            </p>       
        </div>
        <div class="img-container">
        <img src="{{env('STORAGE'). 'storage/app/public/images/' . $book->image}}" 
        alt=""
        class="border-double border-4 
        border-lime-800
        rounded-lg"
        >
       </div>

       <a href="{{asset('storage')}}"></a>
    
    <div>
        <b>Rating: <br></b> 
        @php $countRating = array();@endphp
        
        @foreach ($reviews as $review)
        
        @if ($book->id == $review->book_id)
        @php
           array_push($countRating, $review->rating);
        @endphp
        @endif
        @endforeach


<div class="flex justify-around w-4/5">

    @php 
if(!empty($countRating)) {
    
    if(array_sum($countRating)/count($countRating) >= 1 ) {
        echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
    } else {
        if (array_sum($countRating)/count($countRating) >= 0.5) {
            echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
        } else {
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
        }
    }
    
    if(array_sum($countRating)/count($countRating) >= 2 ) {
        echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
    } else {
        if (array_sum($countRating)/count($countRating) >= 1.5) {
            echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
        } else {
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
        }
    }
    
    if(array_sum($countRating)/count($countRating) >= 3 ) {
        echo '<i class="fa-solid fa-star text-yellow-500 star"></i>';
    } else {
        if (array_sum($countRating)/count($countRating) >= 2.5) {
            echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
        } else {
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
        }
    }
    
    if(array_sum($countRating)/count($countRating) >= 4 ) {
        echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
    } else {
        if (array_sum($countRating)/count($countRating) >= 3.5) {
            echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
        } else {
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
        }
    }
    
    if(array_sum($countRating)/count($countRating) >= 5 ) {
        echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
    } else {
        if (array_sum($countRating)/count($countRating) >= 4.5) {
            echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
        } else {
            echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
        }
    }
} else {
    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
    echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
}




@endphp
 </div>
</div>


</div>
<div class="column2-card">
    <h4 class="font-serif underline 
    decoration-solid text-center
    tracking-widest
        text-xl"
        >
        {{
            strlen($book->title) < 25 ? 
            strip_tags($book->title) : 
            strip_tags(substr($book->title, 0, strpos($book->title, ' ', 12))) . '...'
        }}
        </h4>
        
        <p class=""><b>For:</b>
            {{
                strlen($book->instrument) < 23 ? 
                strip_tags($book->instrument) : 
                strip_tags(substr($book->instrument, 0, strpos($book->instrument, ' ', 21))) . '...'
            }}
        </p>
        
        <p><b>Authors: </b> 
            {{
                strlen($book->authors) < 23 ? 
                strip_tags($book->authors) : 
                strip_tags(substr($book->authors, 0, strpos($book->authors, ' ', 21))) . '...'
            }}
        <p>
            
            <p><b>Musical arrangements: </b>
                {{$book->musical_arrangements}}
            </p>
            
            
            <br>
            
            <a
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold 
            py-2 px-4 border border-blue-700 rounded
            w-36
            "
            href="{{env('app_url')}}book?id={{$book->id}}"
            >
            Download
    </a>
    
    
    
</div>
<br>
</div>

@endif
@endforeach

</div>
@endif

@endforeach



@endsection




