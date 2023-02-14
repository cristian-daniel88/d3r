<div class="column2-book   bg-white border border-gray-200 rounded-lg shadow-md 
    dark:bg-gray-800 dark:border-gray-700 
    ">

    <div class="font-normal text-gray-700 
    dark:text-gray-400 flex  w-52">
    <b>Rating:</b>
    <div class="flex justify-around w-2/5 items-center ">
     @php
        
     @endphp
        @php
    if(!empty($avg)) {
        
        if($avg >= 1 ) {
    echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
    } else {
    if ($avg >= 0.5) {
        echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
    } else {
        echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
    }
    }

    if($avg >= 2 ) {
    echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
   } else {
    if ($avg >= 1.5) {
        echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
    } else {
        echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
    }
}

if($avg >= 3 ) {
    echo '<i class="fa-solid fa-star text-yellow-500 star"></i>';
} else {
    if ($avg >= 2.5) {
        echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
    } else {
        echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
    }
}

if($avg >= 4 ) {
    echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
} else {
    if ($avg >= 3.5) {
        echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
    } else {
        echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
    }
}

if($avg >= 5 ) {
    echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
} else {
    if ($avg >= 4.5) {
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

<div class="">
<b>Reviews: </b>
<div class="overflow-y-auto h-52">
<div>

    @foreach ($reviews as $review)
       <div >

           <div class="p-3">
               <div class="bg-slate-200 float-left px-3 rounded"> {{$review->user}} </div>:
               <i>{{$review->review}}</i>
            <div class="flex">
                Rating: &nbsp;
                <div class="rating-user">
                    @php
                        if(!empty($review->rating)) {
                            if($review->rating >= 1 ) {
                         echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
                        } else {
                            if ($review->rating >= 0.5) {
                                echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                       } else {
                        echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                        }
                      }
                      
                      if($review->rating >= 2 ) {
                          echo '<i class="fa-solid fa-star text-yellow-500 star"></i>';
                        } else {
                            if ($review->rating >= 1.5) {
                                echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                            } else {
                                echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                            }
                        }
                        
                        if($review->rating >= 3 ) {
                            echo '<i class="fa-solid fa-star text-yellow-500 star"></i>';
                        } else {
                            if ($review->rating >= 2.5) {
                                echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                            } else {
                                echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
                            }
                        }

                        if($review->rating >= 4 ) {
                            echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
                        } else {
                            if ($review->rating >= 3.5) {
                                echo '<i class="fa-solid fa-star-half-stroke text-yellow-500 star"></i>';
                            } else {
                                echo '<i class="fa-regular fa-star text-yellow-500 star"></i>';
            }
            } 

            if($review->rating >= 5 ) {
                echo ' <i class="fa-solid fa-star text-yellow-500 star"></i>';
            } else {
                if ($review->rating >= 4.5) {
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
        @if ($review->user_id == $_SESSION["id"])
        <div class="w-10 flex justify-around">



<!-- Main modal -->
<div id="defaultModal{{$review->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
  <div class="relative w-full h-full max-w-2xl md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Edit review 
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal{{$review->id}}">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>

          <form method="POST" action="{{env("APP_URL")}}book"
            class="review-edit bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
             
            @csrf
            <input type="hidden" value="{{$review->id}}" name="id">


            <textarea name="textarea" 
            cols="30" rows="10"
            class="shadow appearance-none border rounded w-full 
            py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            
            
            >{{$review->review}}</textarea>
            <br>
            <select name="rating" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="1" {{$review->rating == 1 ? 'selected' : ''}}>&#9733;</option>
                <option value="2" {{$review->rating == 2 ? 'selected' : ''}}>&#9733;&#9733;</option>
                <option value="3" {{$review->rating == 3 ? 'selected' : ''}}>&#9733;&#9733;&#9733;</option>
                <option value="4" {{$review->rating == 4 ? 'selected' : ''}}>&#9733;&#9733;&#9733;&#9733;</option>
                <option value="5" {{$review->rating == 5 ? 'selected' : ''}}>&#9733;&#9733;&#9733;&#9733;&#9733;</option>
            </select>
              
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button 
                 class="text-white bg-blue-700 
                  hover:bg-blue-800 focus:ring-4 focus:outline-none 
                  focus:ring-blue-300 font-medium rounded-lg text-sm px-5 
                  py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
                  dark:focus:ring-blue-800"  type="submit">I accept</button>
                  <button data-modal-hide="defaultModal{{$review->id}}" 
                  type="button" class="text-gray-500 bg-white 
                  hover:bg-gray-100 focus:ring-4 
                  focus:outline-none focus:ring-blue-300 
                  rounded-lg border border-gray-200 
                  text-sm font-medium px-5 py-2.5 
                  hover:text-gray-900 focus:z-10 
                  dark:bg-gray-700 dark:text-gray-300 
                  dark:border-gray-500 dark:hover:text-white 
                  dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                  
                  >Decline
                </button>
              </div>
            </form>
      </div>
  </div>
</div>

<button data-modal-target="defaultModal{{$review->id}}" 
    
             data-modal-toggle="defaultModal{{$review->id}}" 
             type="button" class="mx-6">
            <i class="fas fa-edit"></i>
            </button>

            
            

             <!-- Main modal -->
            <div id="deleteReview" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden 
             w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-2xl md:h-auto">
             <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
           <!-- Modal header -->
          <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Do you want delete review?
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deleteReview">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
       
       
         
          
          <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
              <form action="{{env('app_url')}}delete/review" method="POST">
                @csrf 
                <input type="hidden" value="{{$review->id}}" name="reviewId">
                 <button type="submit" 
                 class="text-white bg-blue-700 hover:bg-blue-800 
                 focus:ring-4 focus:outline-none focus:ring-blue-300 
                 font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                 value="2">I accept</button>
              </form>
              <button data-modal-hide="deleteReview" type="button" class="text-gray-500 bg-white 
              hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg 
              border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 
              dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white 
              dark:hover:bg-gray-600 dark:focus:ring-gray-600">
              Decline
              </button>
          </div>
          </div>
          </div>
          </div>
          {{--  --}}
         
            <button data-modal-target="deleteReview" data-modal-toggle="deleteReview" type="button">
                <i class="fas fa-trash cursor-pointer"></i>
            </button>
    
        </div>
        @endif
        
    </div>
    
    <hr class="w-48 h-1 mx-auto  bg-gray-200 border-0 rounded dark:bg-gray-700">
    
    </div>
    @endforeach
</div>
</div>
<br>



</div>  
<form >

<div>
   
    <label  class="block mb-2 text-sm 
    font-medium text-gray-900 dark:text-white">
        New review:
    </label>
    <textarea cols="100" rows="3"  wire:model.defer="review" id="textareaReview"
    class="bg-gray-50 border border-gray-300 
    text-gray-900 text-sm rounded-lg 
    focus:ring-blue-500 focus:border-blue-500 
    block w-full p-2.5 dark:bg-gray-700 
    dark:border-gray-600 dark:placeholder-gray-400 
    dark:text-white dark:focus:ring-blue-500 
    dark:focus:border-blue-500"></textarea>
    <br>
    <label  class="block mb-2 text-sm font-medium 
    text-gray-900 dark:text-white">
    Rating:
    </label>
    <span class="text-red-700" id="ratingValueSpan"></span>
    <select id="ratingSelect"  class="bg-gray-50 border border-gray-300 text-gray-900 
    text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block 
    w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    wire:model.defer="rating"

    >
        <option value="" selected>--</option>
        <option value="1">&#9733;</option>
        <option value="2">&#9733;&#9733;</option>
        <option value="3">&#9733;&#9733;&#9733;</option>
        <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
        <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
    </select>
    <br>
    
    <button 
    type="button"
   
    class="bg-blue-500  hover:bg-blue-700 text-white 
    font-bold py-2 px-4 border border-blue-700 rounded"     id="sentReview1">
    Send
    
    </button>

    <input type="hidden"  wire:click.prevent="store()" id="sentReview2">

   
</div>
</form>
<script>
    console.log(document.getElementById('textareaReview').value);

    
    
    document.getElementById('sentReview1').addEventListener('click', (e) => {
        
         if($("#ratingSelect").val() == "") 
         {
            document.getElementById("ratingValueSpan").innerHTML = "Please choose a value"
            return
         }
       
        document.getElementById('sentReview2').click();

     
        
    })

    document.getElementById("ratingSelect").addEventListener("click" , () => {
        document.getElementById("ratingValueSpan").innerHTML = ""
    })

    window.addEventListener('refresh', event => {
        
        //alert(event.detail.message);
        toastr.success(event.detail.message)

        setTimeout(() => {
            location.reload();
            
        }, 1000);

    })

    document.getElementById("")
</script>
</div>
