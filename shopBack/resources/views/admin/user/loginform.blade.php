@extends('layouts.app')
@section('sidebar')
@parent
@endsection
@section('content')
<div class="flex flex-col justify-center items-center w-full">
<h1 class="text-grey-800 text-4xl text-center font-medium mt-6 mb-6">User Registration</h1>
   <div class="w-3/4"> 
       <form action="{{asset('userReistration')}}" method="POST">
       @if(isset($msg))
       <div class="m-2 text-red-600">{{$msg}}</div>
       @endif
       @csrf
         <div>
             <input  value="{{ old('name') }}" class="placeholder-gray-500 p-3 text-lg w-3/4 h-12 border-2 border-purple-300 rounded-lg hover:border-purple-500 hover:rounded-lg focus:outline-none focus:border-2 focus:border-purple-600 focus:rounded-lg shadow-sm focus:placeholder-opacity-0" type="text" name="name" id="name" placeholder="Type your name"/>
         </div> 
            @error('name')
              <div class="text-red-500 mt-1">{{ $message }}</div>
             @enderror

         <div class="mt-4">
             <input value="{{ old('email') }}" class="placeholder-gray-500 p-3 text-lg w-3/4 h-12 border-2 border-purple-300 rounded-lg hover:border-purple-500 hover:rounded-lg focus:outline-none focus:border-2 focus:border-purple-600 focus:rounded-lg shadow-sm focus:placeholder-opacity-0" type="email" name="email" id="email" placeholder="Type your email"/>
         </div>
            @error('email')
              <div class="text-red-500 mt-1">{{ $message }}</div>
             @enderror
         <div class="mt-4">
             <input  class="placeholder-gray-500 p-3 text-lg w-3/4 h-12 border-2 border-purple-300 rounded-lg hover:border-purple-500 hover:rounded-lg focus:outline-none focus:border-2 focus:border-purple-600 focus:rounded-lg shadow-sm focus:placeholder-opacity-0" type="password" name="password" id="password" placeholder="Type your password"/>
         </div>
            @error('password')
              <div class="text-red-500 mt-1">{{ $message }}</div>
             @enderror
            <button Type="submit" class="p-3 bg-gradient-to-r from-indigo-400 to-indigo-700 mt-4 rounded-lg shadow-md text-xl hover:bg-purple-600 focus:outline-none">Submit</button>
        </form>
   </div>
</div>

@endsection