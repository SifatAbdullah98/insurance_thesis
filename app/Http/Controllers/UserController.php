<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('USER_LOGIN'))
        {
            return redirect('user/dashboard');
        }
        else
        {
            return view('user.login');
        }
    }
    public function auth(Request $request)
    {

       $phone=$request->post('phone');
       $password=$request->post('password');
       $result=User::where(['phone'=>$phone, 'password'=>$password])->get();


      if(isset($result['0']->id))
      {
         $request->session()->put('USER_LOGIN',true);
         $request->session()->put('USER_ID',$result['0']->id);
         return redirect('user/dashboard');
      }
      else
      {
         $request->session()->flash('error','Please enter valid information');
         return redirect('user');
      }
    }
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function register_view()
    {
        return view('user.register');
    }


    public function register(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'phone' => 'required|min:11|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $model=new User();
        $model->name=$request->post('name');
        $model->phone=$request->post('phone');
        $model->password=$request->post('password');
        $model->save();
        return redirect('');
    } 
    public function plan(Request $request,$id){
        $result['plan']=DB::table('plans')->where(['status'=>1])->where(['isp_id'=>$id])->get();
        return view('user.plan',$result);
    }
    public function apply(Request $request,$id){
        
        return view('user.apply');
    }
}

