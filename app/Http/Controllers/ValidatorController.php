<?php

namespace App\Http\Controllers;

use App\Models\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ValidatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('VALIDATOR_LOGIN'))
        {
            return redirect('validator/dashboard');
        }
        else
        {
            return view('validator.login');
        }
    }
    public function auth(Request $request)
    {

       $username=$request->post('username');
       $password=$request->post('password');
       $result=Validator::where(['username'=>$username, 'password'=>$password])->get();


      if(isset($result['0']->id))
      {
         $request->session()->put('VALIDATOR_LOGIN',true);
         $request->session()->put('VALIDATOR_ID',$result['0']->id);
         return redirect('validator/dashboard');
      }
      else
      {
         $request->session()->flash('error','Please enter valid information');
         return redirect('validator');
      }
    }
    public function dashboard()
    {
        return view('validator.dashboard');
    }
}
