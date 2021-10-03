@extends('layouts.app')
@section('content')
<div class="w-full flex justify-center mt-4">
    <div class="w-11/12 bg-gray-200 rounded-lg shadow-sm">
         <div class="w-full flex flex-row h-56  my-4">
            <div class="w-1/4 flex justify-center items-center">
                <img  class="h-52 object-fill"  src="{{asset('storage/avatars/'.$singleProductData->productImageOne)}}" alt="">
            </div>
            <div class="w-1/4  flex justify-center">
                <img  class="h-42 object-fill" src="{{asset('storage/avatars/'.$singleProductData->productImageTwo)}}" alt="">
            </div>
            <div class="w-1/4 flex justify-center">
                <img class="h-52 object-fill"  src="{{asset('storage/avatars/'.$singleProductData->productImageThree)}}" alt="">
            </div>
            <div class="w-1/4 flex justify-center">
                <img class="h-52 object-fill" src="{{asset('storage/avatars/'.$singleProductData->productImageFour)}}" alt="">
            </div>
         </div>

         <div class="flex flex-row">
            <div class="w-1/2">
                <div class="text-lg font-medium py-1 px-4 text-gray-700">Product name : {{$singleProductData->productName}}</div>
                <div class="text-lg font-medium py-1 px-4 text-gray-700">Price        : {{$singleProductData->productPrice}}</div>
                <div class="text-lg font-medium py-1 px-4 text-gray-700">Quantity     : {{$singleProductData->productQuantity}}</div>
            </div>
            <div class="w-1/2">
                <div class="text-lg font-medium py-1 px-4 text-gray-700">Brand        : {{$singleProductData->brandName}}</div>
                <div class="text-lg font-medium py-1 px-4 text-gray-700">Category     : {{$singleProductData->categoryName}}</div>
                <div class="text-lg font-medium py-1 px-4 text-gray-700">Discount     : {{$singleProductData->ProductDiscount}}</div>
            </div>
            
         </div>

        <div class="w-full mb-5">
            <div class="text-xl font-medium text-gray-700 px-4 py-2">Product Description : </div>
            <div class="text-gray-700 px-4 text-base">{{$singleProductData->productDescription}}</div>
        </div>

    </div>
</div>

@endsection