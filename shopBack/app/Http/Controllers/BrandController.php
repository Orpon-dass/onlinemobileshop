<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
  //save brand name
    public function saveBrand(Request $request)
    {  
       $request->validate([
         'brandName'=>'required'  
       ]);
       $brand =new Brand;
       $brand->BrandName = $request->brandName;
       $brand->save();
       return redirect('addBrand');
    }
   
    //show brand name
    public function showBrandname()
    {
        $brandName = Brand::all();
        return view('admin.user.showBrandName',['brands'=>$brandName]);
    }
    // for brand update
    public function updateBrand(Request $request,$id)
    {
      $brand =Brand::find($id);
      return view('admin.user.brandEditForm',['brand'=>$brand]);
    }
    //insert update brand name
    public function updatenewbrand(Request $request)
    {
        $request->validate([
          'brandName'=>'required'
        ]);
        $id =$request->brandId;
        $brand = Brand::find($id);
        $brand->BrandName = $request->brandName;
        $brand->save();
        return redirect()->action([BrandController::class,'showBrandname']);
    }
    public function deleteBrand(Request $req,$id)
    {
        $brand =Brand::find($id);
        $brand->delete();
        return redirect('showBrand');
    }
}
