@extends('layouts.app')
@section('content')
<div class="w-full flex justify-center">
 <div class="w-4/5 bg-gray-50 h-48 rounded-lg mt-3">
    <div class="text-center text-2xl font-medium m-4 ">Update Brand Name</div>
    <div class="pl-6 m-4 text-center">
           @error("brandName")
             <div class="text-red-600">{{$message}}</div>
           @enderror
            <form action="{{asset('updatebrand')}}" method="POST">
            @csrf
                <input value="{{$brand->BrandName}}" type="text" class="input-style" name="brandName">
                <input type="hidden" name="brandId" value="{{$brand->id}}">
                <input type="submit" class="btn">
            </form>
    </div>
 </div>
</div>
@endsection