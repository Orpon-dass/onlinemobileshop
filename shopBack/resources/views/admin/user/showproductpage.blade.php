@extends("layouts.app")
@section('content')
<div class="m-3  bg-gray-300 rounded-lg">
  <div class="pt-4">
     <table class="table-fixed">
       <thead class=" bg-indigo-400 text-gray-100">
         <th class="w-1/12 py-2 ">SI</th>
         <th class="w-2/12 py-2">Product Name</th>
         <th class="w-1/12">Product Price</th>
         <th class="w-1/12"> Quantity</th>
         <th class="w-1/12">Discount</th>
         <th class="w-2/12">Action</th>
       </thead>
       <tbody>
       @php
        $i = 1;
       @endphp
       @foreach($products as $product)
        <tr class="text-center text-gray-800 text-lg font-normal">
         <td class="py-1">{{$i++}}</td>
         <td class="py-1">{{$product->productName}}</td>
         <td>{{$product->productPrice}}</td>
         <td>{{$product->productQuantity}}</td>
         <td>{{$product->ProductDiscount}} %</td>
         <td>
          <div class="flex justify-center">
           <a href="{{asset('showSingleproduct/'.$product->id)}}">
                <svg  class="w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </a>

           <a href="{{asset('deleteproduct/'.$product->id)}}">
            <svg class="w-5 ml-2 text-red-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
          </a>

          <a href="{{asset('editproduct/'.$product->id)}}">
            <svg class="w-5 ml-2 text-yellow-500" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
            </svg>   
         </a>   
          </div>
         </td>
        </tr>
     <!-- <div><img src="{{asset('storage/avatars/'.$product->productImageOne) }}" alt="image"></div> -->
   <!-- image from public folder -->
   
        @endforeach
       </tbody>
     </table>
  </div>
</div>
@endsection