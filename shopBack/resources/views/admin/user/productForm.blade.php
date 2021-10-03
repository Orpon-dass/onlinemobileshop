@extends('layouts.app')
@section('content')
<div class="">
<div class="text-3xl text-gray-800 text-center font-medium m-5">Add new product</div>
<div class="flex justify-center w-full">
    <div class="w-3/4 bg-gray-100 rounded-lg shadow-lg pt-3 pb-3" >
            <form action="{{asset('productCreate')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="m-2  flex flex-col justify-center items-center">
                    <label class="text-left w-3/4 text-lg font-medium text-gray-700" for="name">Product Name</label>
                    <input value="{{old('pName')}}" name="pName" class="input-style mt-2" id="name" type="text" placeholder="Product Name">
                    @error('pName')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                </div>
        
                <div class="m-2  flex flex-col justify-center items-center">
                    <label class="text-left w-3/4 text-lg font-medium text-gray-700" for="brand">Brand Name</label>
                    <select name="pBrand"  class="w-3/4 border-2 border-purple-300 rounded-lg hover:border-purple-700 focus:border-purple-700 h-12 text-lg font-normal leading-normal text-gray-700 mt-2" id="brand" type="text" placeholder="Product Name">
                     <option value="">Select brand name</option>
                     @foreach($brand as $brandName)
                      @if(old('pBrand')==$brandName->BrandName)
                       <option selected value="{{$brandName->BrandName}}">{{$brandName->BrandName}}</option>
                       @else
                       <option  value="{{$brandName->BrandName}}">{{$brandName->BrandName}}</option>
                       @endif
                     @endforeach
                    </select>
                    @error('pBrand')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                </div>
                
                <div class="m-2  flex flex-col justify-center items-center">
                    <label class="text-left w-3/4 text-lg font-medium text-gray-700" for="category">Category Name</label>
                    <select name="pCategory" class="w-3/4 border-2 border-purple-300 rounded-lg hover:border-purple-700 focus:border-purple-700 h-12 text-lg font-normal text-gray-700 leading-normal mt-2" id="category" type="text" placeholder="Product Name">
                     <option value="">Select category name</option>
                     @foreach($category as $categoryName)
                     @if(old('pCategory')==$categoryName->categoryName)
                     <option selected value="{{$categoryName->categoryName}}">{{$categoryName->categoryName}}</option>
                     @else
                     <option value="{{$categoryName->categoryName}}">{{$categoryName->categoryName}}</option>
                     @endif
                     @endforeach
                    </select>
                    @error('pCategory')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                </div>
                
                <div class="m-2 flex flex-col justify-center items-center">
                    <label class="text-left w-3/4 text-lg font-medium text-gray-700" for="price">Product Price</label>
                    <input value="{{old('pPrice')}}" name="pPrice" class="input-style mt-2" id="price" type="text" placeholder="Product Price">
                    @error('pPrice')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                </div>
               
                <div class="m-2 flex flex-col justify-center items-center">
                    <label class="text-left w-3/4 text-lg font-medium text-gray-700" for="quantity">Product Quantity</label>
                    <input value="{{old('pQuantity')}}" name="pQuantity" class="input-style mt-2" id="quantity" type="text" placeholder="Product quantity">
                    @error('pQuantity')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                </div>
                
                <div class="m-2 flex flex-col justify-center items-center">
                    <label class="text-left w-3/4 text-lg font-medium text-gray-700" for="discount">Discount</label>
                    <input  value="{{old('pDiscount')}}" name="pDiscount" class="input-style mt-2" id="discount" type="text" placeholder="Discount">
                    @error('pDiscount')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                </div>
                
                <div class="m-2 flex flex-col justify-center items-center">
                   <div class="text-left w-3/4 text-lg font-medium text-gray-700">Product Image</div>
                </div>

                <div class="m-2 flex flex-col justify-center items-center">
                   <div class="w-3/4 flex justify-start items-center">
                        <div class="bg-gray-100 rounded-lg ml-1">
                                <label class="flex flex-col justify-center items-center px-2 py-1 rounded-lg border-2 border-purple-300 hover:border-purple-700">
                                    <svg class="w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <span class="text-base leading-normal font-medium text-gray-700">Image One</span>
                                    <input  value="{{old('imageOne')}}" name="imageOne" type="file" class="hidden" />
                                </label>
                        </div>
                        <div class="bg-gray-100 rounded-lg ml-3">
                                <label class="flex flex-col justify-center items-center px-2 py-1 rounded-lg border-2 border-purple-300 hover:border-purple-700">
                                    <svg class="w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <span class="text-base leading-normal font-medium text-gray-700">Image two</span>
                                    <input  value="{{old('imageTwo')}}" name="imageTwo" type="file" class="hidden" />
                                </label>
                        </div>
                        <div class="bg-gray-100 rounded-lg ml-3">
                                <label class="flex flex-col justify-center items-center px-2 py-1 rounded-lg border-2 border-purple-300 hover:border-purple-700">
                                    <svg class="w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <span class="text-base leading-normal font-medium text-gray-700">Image three</span>
                                    <input  value="{{old('imageThree')}}" name="imageThree" type="file" class="hidden" />
                                </label>
                        </div>
                        <div class="bg-gray-100 rounded-lg ml-3">
                                <label class="flex flex-col justify-center items-center px-2 py-1 rounded-lg border-2 border-purple-300 hover:border-purple-700">
                                    <svg class="w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <span class="text-base leading-normal font-medium text-gray-700">Image four</span>
                                    <input  value="{{old('imageFour')}}" name="imageFour" type="file" class="hidden" />
                                </label>
                        </div>
                   </div> 
                    @error('imageOne')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror    
                     @error('imageTwo')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                     @error('imageThree')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                     @error('imageFour')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror           
                </div>
                
                <div class="m-2 flex flex-col justify-center items-center">
                    <label class="text-left w-3/4 text-lg font-medium text-gray-700" for="description">Description</label>
                   <textarea placeholder="Product descriptiion" class="mt-3 border-2 border-purple-300 hover:border-purple-700 focus:border-purple-700 rounded-lg" name="pDescription" id="description" cols="70" rows="5">
                     @if(old('pDescription'))
                        {{old('pDescription')}}
                     @endif
                   </textarea>
                   @error('pDescription')
                      <div class="text-red-500 mt-2 text-left w-3/4">{{ $message }}</div>
                     @enderror
                </div>
                             
                <div class="m-2 flex justify-center">
                  <div class=" w-3/4">
                   <button  type="submit" class="btn w-full text-3xl font-medium text-gray-900 ">Submit</button>
                  </div>
                </div>
            </form>
    </div>
  
</div>
</div>
@endsection