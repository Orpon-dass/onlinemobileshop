<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class categoryController extends Controller
{
    public function insertCategory(Request $request)
    {   
        $request->validate([
            'categoryName'=>'required'
        ]);
        $catname =$request->old('categoryName');
        $cat =new Category;
        $cat->categoryName = $request->categoryName; 
        $cat->save();
        return redirect('addCategory');  
    }
    public function showCategory()
    {
        $allCat = Category::all();
       return view("admin.user.showCategory",['categories'=>$allCat]);
    }
    public function editCategory(Request $request ,$catid)
    {
         $catEditData = Category::find($catid);
         return view("admin.user.EditCatForm",["editData"=>$catEditData]);
    }
    public function updateCategory(Request $request)
    {
         $id=$request->catUpId;
         $cat = Category::find($id); 
        $cat->categoryName = $request->categoryName;
        $cat->save();
       // return redirect('home');
       return redirect()->action([categoryController::class,'showCategory']);
    }
    public function deleteCategory(Request $request , $id)
    {
        $delcat =Category::find($id);
        $delcat->delete();
        return redirect()->action([categoryController::class,'showCategory']);
    }
}
