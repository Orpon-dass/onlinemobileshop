<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\userLogin;
class Userloincontroller extends Controller
{
  public function userRegister(Request $request){
           $request->validate([
                'name'=>'required',
                'email'=>'email:rfc,dns',
                'password'=>'required',
           ]);
             $name = $request->old('name');
             $email = $request->old('email');

             $name = $request->input('name');
             $email = $request->input('email');
             $password = $request->input('password');

             $user = DB::table('user_logins')->where('email','=',$email)->first();
            if($user){
                return view('admin.user.loginform',['msg'=>'user already in database']);
            }else{
                $insert =DB::table('user_logins')->insert([
                    'name'=>$name,
                    'email'=>$email,
                    'password'=>Hash::make($password),
                    'isLogin'=>'1',
                    'created_at'=>now(),
                    'updated_at'=>null
                ]);
                session(['isLogin'=>'true']);
                session(['userName'=>$name]);
                // session(['userId'=>$user->id]);
                return redirect('home');
            }

        //  echo $insert;
  }
public function logIn(Request $request){
          $request->validate([
            'email'=>'email:rfc,dns',
            'password'=>'required', 
          ]);
          $email = $request->old('email');
          $email= $request->input('email');
          $password=$request->input('password');
          $user = DB::table('user_logins')
          ->where('email','=',$email)
          ->first();
         if($user==""){
          return redirect()->route('Login')->with(['msg'=>'You are not in database...']);
         }else{
          $hashpass = $user->password;
          if(Hash::check($password,$hashpass)){
             session(['isLogin'=>'true']);
             session(['userName'=>$user->name]);
             session(['userId'=>$user->id]);
           return redirect('home');
          }else{
            //return abort(403);
            return redirect()->route('Login')->with(['msg'=>'password is wrong']);

          }
        }
  // echo "<pre>";
  // print_r($user);
  // echo "</pre>";

}


public function userLogOut(){
  session()->forget('isLogin');
  return redirect('/');
}

public function editUser(Request $request,$id)
{
$userEdit = DB::table('user_logins')
           ->where("id","=",$id)
           ->first();
return view("admin/user/editUserData",['user'=>$userEdit]);
}

public function updateUser(Request $request)
{
$request->validate([
    'name'=>'required',
    'email'=>'email:rfc,dns',
]);
$name = $request->input('name');
$email = $request->input('email');
$userId = $request->input('userid');
DB::table('user_logins')
->where('id',$userId)
->update([
  'name'=>$name,
  'email'=>$email
]);
session(['userName'=>$name]);
return redirect('/home')->with('updateMsg','Profile updated..');
}
// last 
}
