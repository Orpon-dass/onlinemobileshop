<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/main.js"></script>
    <title>Shop</title>
</head>
<body>
       <div class="wraper">
       <!-- header section -->
          <div class="w-full h-16 bg-gray-200 flex justify-between fixed z-10">
            @section('header')
            <!-- left-header -->
            <div class="w-3/12 flex items-center">
              <div class="pl-3">
                <img src="/img/computer.svg" alt="shop logo">
              </div>
              <div class="pl-3 text-xl font-medium text-gray-800">
                 <a href="{{asset('home')}}">Shop</a>  
              </div>
             </div>
             <!-- middle-header -->
            <div class="w-5/12">
              <div class="mt-2 ml-2">
                <form action="">
                  <input   class="placeholder-gray-500 p-3 text-lg w-9/12 h-12 border-2 border-purple-300 rounded-lg hover:border-purple-500 hover:rounded-lg focus:outline-none focus:border-2 focus:border-purple-600 focus:rounded-lg shadow-sm focus:placeholder-opacity-0" type="text" name="search" id="search" placeholder="Search here.."/>
                  <button Type="submit" class="p-2 ml-2 bg-gradient-to-r from-indigo-400 to-indigo-700  rounded-lg shadow-md text-xl hover:bg-purple-600 focus:outline-none focus:border-0 text-purple-100">Search</button>
                </form>
              </div>
            </div>

            <div class="right-header w-4/12 flex  justify-end items-center" >
              <div class="mr-1">
               <img onclick="userToggleFunction()" src="/img/profile-user.svg" alt="logo">
              </div>
              <div class="ml-1 mr-3 text-2xl font-medium text-gray-800"> {{session()->get('userName')}} </div>
            
            </div>
             
            @show
          </div>
       <!-- header section -->

        <!-- body section -->
          <div class="w-full h-full flex relative">
             <!-- sidebr section -->
                <div class="w-1/5 h-screen bg-gray-200 fixed left-0 flex flex-col justify-start mt-16">
                        @section('sidebar')
                         <div class="m-3">Catagories</div>
                         <div  class="ml-3">
                            <ul class="text-lg font-medium text-gray-800">
                              <li onclick="productToggle()" class="cursor-pointer flex">
                              
                              <svg id="plus" class="w-5 mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              <svg id="minus" class="w-5 mr-2 hidden text-purple-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                              Product
                              </li>
                                 <div id="product" class="ml-6 hidden transition-all duration-700 ease-in">
                                    <ul class="text-sm">
                                      <li class="cursor-pointer"> <a href="{{asset('createprodouct')}}">Add product</a></li>
                                      <li class="cursor-pointer"> <a href="{{asset('show-product')}}">Product List</a></li>
                                      <li class="cursor-pointer">New products</li>
                                    </ul>
                                 </div>
                              <li onclick="categoroyToggle()" class="cursor-pointer flex">
                                <svg id="catplus" class="w-5 mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                  <svg id="catminus" class="w-5 mr-2 hidden text-purple-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                Categories
                              </li>
                              <div id="catToggleId" class="ml-6 hidden transition-all duration-700 ease-in">
                                  <ul class="text-sm">
                                    <li> <a href="{{asset('addCategory')}}">Add new category</a></li>
                                    <li> <a href="{{asset('showCat')}}">Show Category</a></li>
                                    <li>Other</li>
                                  </ul>
                               </div>
                              <li onclick="BrandToggle()" class="cursor-pointer flex">
                                <svg id="brandplus" class="w-5 mr-2 text-purple-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <svg id="brandminus" class="w-5 mr-2 hidden text-purple-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                 Brand
                              </li>
                              <div id="BrandId" class="ml-6 hidden transition-all duration-700 ease-in">
                                  <ul class="text-sm">
                                    <li> <a href="{{asset('addBrand')}}">Add new Brand</a></li>
                                    <li> <a href="{{asset('showBrand')}}">Show Brand</a></li>
                                    <li>Other</li>
                                  </ul>
                               </div>
                              <li class="cursor-pointer">Orders</li>
                              <li class="cursor-pointer">New product</li>
                            </ul>
                         </div>   
                        @show
                </div>
              <!-- sidebr section -->
              <!-- content section -->
             
                <div class="w-4/5 absolute right-0 top-0 mt-16">
                   <div id="user" class="w-2/12 bg-gray-200 absolute right-0 top-0 mr-3 hidden cursor-pointer shadow-lg">
                     <div class="m-4  transition-all ease-in duration-700">
                        <ul  class="text-lg font-medium text-gray-600">
                          <li class="hover:text-gray-900">Profile</li>
                          <li class="hover:text-gray-900" > <a href="{{asset('registration')}}">Registration</a></li>
                          <li class="hover:text-gray-900" ><a href="{{asset('/edit/'.session()->get('userId'))}}">Edit</a></li>
                          <li class="hover:text-gray-900"> <a href="{{asset('logout')}}">Logout</a></li>
                        </ul>
                     </div>
                   </div>
                  
              <div class="text-red-600 m-2">{{session()->get('updateMsg')}}</div>
                    @yield('content')
                </div>
              <!-- content section -->
          </div>
        <!-- body section -->
            @yield('footer')
        </div>
</body>
</html>