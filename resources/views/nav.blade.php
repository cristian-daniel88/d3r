<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="inline-flex items-center justify-center
           rounded-md p-2 text-gray-400 hover:bg-gray-700 
           hover:text-white focus:outline-none focus:ring-2 
           focus:ring-inset focus:ring-white" 
           aria-controls="mobile-menu" aria-expanded="false"
           id="menuButton"
           >
            <span class="sr-only">Open main menu</span>
  
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
  
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
             <h1>Search Books</h1>
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
  
  
              <a href="{{env('app_url')}}home" class="
                        text-gray-300 hover:bg-gray-700 
                        hover:text-white px-3 
                        py-2 rounded-md 
                        text-sm font-medium
                        {{request()->is('/') ? 'text-white px-3 bg-gray-700' : ''}}
                        ">Books</a>
             
              <a href="{{env('app_url')}}addbook" class="
              text-gray-300 hover:bg-gray-700 
              hover:text-white px-3 
              py-2 rounded-md 
              text-sm font-medium
              {{request()->is('addbook') ? 'text-white px-3 bg-gray-700' : ''}}
              ">Add book</a>
  
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Backing tracks</a>
  
              <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Add backing track</a>
  
  
            </div>
          </div>
          <form method="GET" action="" class="form-search_lg">
            <select name="filter" id="">
            <option value="all">All</option>
            <option value="genres">Genre</option>
            <option value="">Author</option>
            <option value="">Instruments</option>
            </select>
            <input type="text" class="input-search_lg">
            <button type="submit" class="button-search_lg">
              <i class="fa-solid fa-magnifying-glass"></i>  
            </button>     
          </form>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
       
  
          <div class="relative ml-3"  >
            <div>
              <button 
              
              type="button" class="flex rounded-full 
              bg-gray-800 text-sm 
              
              focus:ring-white focus:ring-offset-2 
              focus:ring-offset-gray-800" 
              id="user-menu-button" 
              aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="{{asset('images/user.png')}}" alt="">   
                
                
              </button>
  
            </div>
  
  
            <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none "
            role="menu" 
            aria-orientation="vertical" 
            aria-labelledby="user-menu-button" 
            tabindex="-1"
            id="profileMenu"
            >
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 aProfile" role="menuitem" tabindex="-1" id="user-menu-item-0"><?php echo $_SESSION["username"]; ?></a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 aProfile" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
              <a href="{{env('app_url')}}"  class="block px-4 py-2 text-sm text-gray-700 aProfile" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  
  </nav>
  {{-- Mobile Menu --}}
  <div class="" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3" >
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="{{env('app_url')}}home" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium " aria-current="page">Books</a>
  
      <a href="{{env('app_url')}}addbook" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Add Book</a>
  
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Backing tracks</a>
  
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Add backing track</a>
    </div>
  </div>