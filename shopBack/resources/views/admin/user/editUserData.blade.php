@extends("layouts.app")
@section('content')
<div class="flex flex-col justify-center items-center w-full">
<h1 class="text-grey-800 text-4xl text-center font-medium mt-6 mb-6">User Update</h1>
   <div class="w-3/4"> 
       <form action="{{asset('userUpdate')}}" method="POST">
       @csrf
       @if(isset($msg))
       <div class="m-2 text-red-600">{{$msg}}</div>
       @endif
      
         <div>
             <input  value="{{ $user->name }}" class="input-style" type="text" name="name" id="name" placeholder="Type your name"/>
         </div> 
            @error('name')
              <div class="text-red-500 mt-1">{{ $message }}</div>
             @enderror

         <div class="mt-4">
             <input value="{{ $user->email }}" class="input-style" type="email" name="email" id="email" placeholder="Type your email"/>
         </div>
            @error('email')
              <div class="text-red-500 mt-1">{{ $message }}</div>
             @enderror
        <input type="hidden" name="userid" value="{{$user->id}}">
         <button Type="submit" class="p-3 bg-gradient-to-r from-indigo-400 to-indigo-700 mt-4 rounded-lg shadow-md text-xl hover:bg-purple-600 focus:outline-none">Submit</button>
        </form>
   </div>
</div>

@endsection