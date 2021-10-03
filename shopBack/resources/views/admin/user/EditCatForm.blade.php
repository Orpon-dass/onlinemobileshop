@extends('layouts.app')
@section("content")
<div class="text-2xl text-gray-800 font-medium text-center mt-3">Update category</div>
<div class="flex justify-center mt-3">
  <div class="w-8/12">  
    <form action="{{asset('updateCategory')}}" method="post">
    @csrf
    <input value="{{$editData->categoryName}}" class="input-style " name="categoryName" type="text" placeholder="Add new category">
     <input type="hidden" value="{{$editData->id}}" name="catUpId">
    <input type="submit" class="btn ml-3"> 
    @error('categoryName')
       <div class="text-lg text-red-600 mt-2">{{$message}}</div>
     @enderror
    </form>
  </div>  
</div>
@endsection