<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        
        <script src="{{ asset('js/tailwind.js')}} "></script>
        +<script src="{{asset('js/fontawesome.js')}}"></script>
        <link href="{{ asset('css/flowbite.css')}}" rel="stylesheet" />
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
    </head>
    
<body class="bg-black">
    <div class="w-full max-w-xs m-auto">
        <br>
        <br>
        <br>
        <br>
        <form class="bg-white shadow-md 
         rounded px-8 pt-6 pb-8 mb-4"
        method="POST" action={{env('app_url')}}
        >
        @csrf
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" 
            for="username">
              Username
            </label>
            <input class="shadow appearance-none border 
            rounded w-full py-2 px-3 text-gray-700 
            leading-tight focus:outline-none focus:shadow-outline" 
            id="username" type="text" placeholder="Username" name="username">
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input class="shadow appearance-none 
            border  rounded w-full py-2 px-3 
            text-gray-700 mb-3 leading-tight 
            focus:outline-none focus:shadow-outline" 
            id="password" type="password"
            placeholder="******************"
            name="password" 
             >
            <p class="text-red-500 text-xs italic" id="error1">

                @php
                    if(!empty($error)) {
                        echo $error;
                    }
                @endphp
            </p>
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold 
            py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
            type="submit">
              Sign In
            </button>

          </div>
        </form>
            
      </div>
      <script>
        document.getElementById('username').addEventListener('click', 
         () => {
            document.getElementById('error1').innerHTML = '';
         }
        )

        document.getElementById('password').addEventListener('click', 
         () => {
            document.getElementById('error1').innerHTML = '';
         }
        )
      </script>
</body>
</html>