@extends("layouts.app")
@section('content')

<div class="w-full flex justify-center">
   <div class="bg-gray-100 flex justify-center w-3/5 rounded-lg mt-5">
            <table class="table-fixed w-full m-3">
            <thead>
            <tr> 
                <th class="w-2/5 pt-3">Name</th>
                <th class="1/4 pt-3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
            <tr>
            <td class="text-center p-1 text-lg font-medium text-gray-800">{{$brand->BrandName}}</td>
            <td class="flex justify-center pt-1">
                <div class="">
                <a href="{{route('brandeditroute',['brandId'=>$brand->id])}}">
                <svg class="w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                 <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                 <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
               </svg> 
                </a>
                </div>
                <div class="ml-2">
                    <a href="{{asset('deletebrand/'.$brand->id)}}">
                        <svg class="w-5 text-red-700" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </div>
            </td>
            </tr>
            @endforeach
            
            </tbody>
        </table>
      </div>
</div>
@endsection