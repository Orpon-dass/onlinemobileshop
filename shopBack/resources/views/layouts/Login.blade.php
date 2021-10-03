<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <title>Shop</title>
</head>
<body>
    <div class="flex flex-wrap content-center justify-center w-full h-screen ">
        <div class="w-2/5   bg-gray-200 border-2 border-gray-900 rounded-lg shadow-lg">
           <div class="text-center text-3xl mb-7 mt-7 font-medium text-gray-700">
             <h1>Online shop management</h1>
             
             <div class="ml-6 mt-2 text-red-600 text-lg">{{session()->get('msg')}}</div>
          
           </div>
           
           <form action="{{asset('userlogin')}}" method="post">
           @csrf
           <div class="m-4">
              <input value="{{ old('email') }}"   class="placeholder-gray-500 p-3 text-lg w-full h-12 border-2 border-purple-300 rounded-lg hover:border-purple-500 hover:rounded-lg focus:outline-none focus:border-2 focus:border-purple-600 focus:rounded-lg shadow-sm focus:placeholder-opacity-0" type="email" name="email" id="email" placeholder="Email address.."/>
            </div> 
            @error('email')
              <div class="text-gray-700 ml-4">{{ $message }}</div>
             @enderror
            <div class="m-4">
              <input   class="placeholder-gray-500 p-3 text-lg w-full h-12 border-2 border-purple-300 rounded-lg hover:border-purple-500 hover:rounded-lg focus:outline-none focus:border-2 focus:border-purple-600 focus:rounded-lg shadow-sm focus:placeholder-opacity-0" type="password" name="password" id="password" placeholder="password.."/>
            </div> 
            @error('password')
              <div class="text-gray-700 ml-4 mb-4">{{ $message }}</div>
             @enderror
            <button Type="submit" class="p-3 ml-4 mb-4 bg-gradient-to-r from-indigo-400 to-indigo-700  rounded-lg shadow-md text-xl hover:bg-purple-600 focus:outline-none  text-purple-100">Login</button>
            
           </form>
        </div>
     </div>
</body>
</html>