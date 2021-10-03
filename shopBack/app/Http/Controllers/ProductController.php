<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function create(){

        return view("admin.user.productForm",['brand'=>Brand::all(),'category'=>Category::all()]);
    }

    //insert product in database
    public function productInsert(Request $request)
    {
        //validate product
         $request->validate([
            'pName'=>'required',
            'pBrand'=>'required',
            'pCategory'=>'required',
            'pPrice'=>'required',
            'pQuantity'=>'required',
            'pDiscount'=>'required',
            'imageOne'=>'required',
            'imageTwo'=>'required',
            'imageThree'=>'required',
            'imageFour'=>'required',
            'pDescription'=>'required'
         ]);
         $proName =$request->old('pName');
         $pBrand =$request->old('pBrand');
         $pCategory =$request->old('pCategory');
         $pPrice =$request->old('pPrice');
         $pQuantity =$request->old('pQuantity');
         $pDiscount =$request->old('pDiscount');
         $imageOne =$request->old('imageOne');
         $imageTwo =$request->old('imageTwo');
         $imageThree =$request->old('imageThree');
         $imageFour =$request->old('imageFour');
         $pDescription =$request->old('pDescription');
         //insert in database
         $proModel = new Product;
         $proModel->productName          =$request->input('pName');
         $proModel->brandName            =$request->input('pBrand');
         $proModel->categoryName         =$request->input('pCategory');
         $proModel->productPrice         =$request->input('pPrice');
         $proModel->productQuantity      =$request->input('pQuantity');
         $proModel->ProductDiscount      =$request->input('pDiscount');

         $imgOneName   = time().'-'.$request->input('pName').'.'.$request->file('imageOne')->getClientOriginalName();
         $imgTwoName   = time().'-'.$request->input('pName').'.'.$request->file('imageTwo')->getClientOriginalName();
         $imgThreeName = time().'-'.$request->input('pName').'.'.$request->file('imageThree')->getClientOriginalName();
         $imgFourName  = time().'-'.$request->input('pName').'.'.$request->file('imageFour')->getClientOriginalName();
         
         $pathone =$request->file('imageOne')->storeAs('public/avatars',$imgOneName);
         $pathTwo =$request->file('imageTwo')->storeAs('public/avatars',$imgTwoName);
         $pathThree =$request->file('imageThree')->storeAs('public/avatars',$imgThreeName);
         $pathFour =$request->file('imageFour')->storeAs('public/avatars',$imgFourName);

         $proModel->productImageOne      = $imgOneName;
         $proModel->productImageTwo      = $imgTwoName;
         $proModel->productImageThree    = $imgThreeName;
         $proModel->productImageFour     = $imgFourName;
         $proModel->productDescription   = $request->input('pDescription');
         $proModel->save();
         return redirect('createprodouct');
       //print_r($request->all());
    }

    //showing product 
    public function ShowProduct()
    {
         $allproduct = Product::all();
        return view('admin.user.showproductpage',['products'=>$allproduct]);
    }

    //edit product page
    public function editproduct(Request $request,$editId)
    {
        $sinProduct =Product::find($editId);
       // print_r($sinProduct);
      return view('admin.user.editformPage',['singleProduct'=>$sinProduct,'brand'=>Brand::all(),'category'=>Category::all()]);
    }

    //updae product 
    public function ProductUpdate(Request $request)
    {
        $request->validate([
            'pName'=>'required',
            'pBrand'=>'required',
            'pCategory'=>'required',
            'pPrice'=>'required',
            'pQuantity'=>'required',
            'pDiscount'=>'required',
            // 'imageOne'=>'required',
            // 'imageTwo'=>'required',
            // 'imageThree'=>'required',
            // 'imageFour'=>'required',
            'pDescription'=>'required'
         ]);
         $id = $request->input('updateId');
         $proModel = Product::find($id);
         $proModel->productName          =$request->input('pName');
         $proModel->brandName            =$request->input('pBrand');
         $proModel->categoryName         =$request->input('pCategory');
         $proModel->productPrice         =$request->input('pPrice');
         $proModel->productQuantity      =$request->input('pQuantity');
         $proModel->ProductDiscount      =$request->input('pDiscount');
          if($request->hasFile('imageOne'))
          {
             Storage::delete('/public/avatars/'.$proModel->productImageOne);
             $imgOneName   = time().'-'.$request->input('pName').'.'.$request->file('imageOne')->getClientOriginalName();
             $pathone =$request->file('imageOne')->storeAs('public/avatars',$imgOneName);
             $proModel->productImageOne      = $imgOneName;
              
          }
          if($request->hasFile("imageTwo"))
          {
            Storage::delete('/public/avatars/'.$proModel->productImageTwo);
            $imgTwoName   = time().'-'.$request->input('pName').'.'.$request->file('imageTwo')->getClientOriginalName();
            $pathTwo =$request->file('imageTwo')->storeAs('public/avatars',$imgTwoName);
            $proModel->productImageTwo      = $imgTwoName;

          }
          if($request->hasFile("imageThree"))
          {
            Storage::delete('/public/avatars/'.$proModel->productImageThree);
            $imgThreeName = time().'-'.$request->input('pName').'.'.$request->file('imageThree')->getClientOriginalName();
            $pathThree =$request->file('imageThree')->storeAs('public/avatars',$imgThreeName);
            $proModel->productImageThree    = $imgThreeName;
   
          }
          if($request->hasFile("imageFour"))
          {
            Storage::delete('/public/avatars/'.$proModel->productImageFour);
            $imgFourName  = time().'-'.$request->input('pName').'.'.$request->file('imageFour')->getClientOriginalName();
            $pathFour =$request->file('imageFour')->storeAs('public/avatars',$imgFourName);
            $proModel->productImageFour     = $imgFourName;

          }
          
 

          $proModel->productDescription   =$request->input('pDescription');
          $proModel->save();
          return redirect('show-product');
    }
    //delete product
    public function deleteProduct($id)
    {
        $delProduct =Product::find($id);
        Storage::delete('/public/avatars/'.$delProduct->productImageOne);
        Storage::delete('/public/avatars/'.$delProduct->productImageTwo);
        Storage::delete('/public/avatars/'.$delProduct->productImageThree);
        Storage::delete('/public/avatars/'.$delProduct->productImageFour);
        $delProduct->delete();
        return redirect('show-product');
    }
    //show single product
    public function SingleProduct($sId)
    {
      return view("admin.user.SingleProductPage",['singleProductData'=>Product::find($sId)]);
    }
    // showing product for view
    public function show_view_product(){
      return Product::paginate(4);
    }
    public function multipleData(Request $req)
    {
             $data = $req->all();
             dd($data);
           // return "hellow";
    }
    //find single product for view page
    public function viewSingleProduct($singleProductId){
          return Product::find($singleProductId);
    }
    //customer registration 
    public function customerRegister(Request $req)
     {
        $cus = new Customer();
        $name =$req->input('name');
        $phone =$req->input('phone');
        $address =$req->input('address');
        if(empty($name))
        {
          return ['msg'=>"Name is required"];
          
        }elseif(empty($phone) || Str::length($phone)<11)
        {
          return ['msg'=>"Phone is required"];
        }elseif(empty($address))
        {
          return ['msg'=>"Address is required"];
        }else
        {
          $customer =Customer::where("phone",$phone)->first();
          if($customer){
            return ["msg"=>"customer already in database"];
          }else{
            $cus->name =$name;
            $cus->phone =$phone;
            $cus->address =$address;
            $cus->save();
            $customer =Customer::where("phone",$phone)->first();
            return ['msg'=>"Registration is successful","customerID"=>$customer->id];
          }
        }
    }
}