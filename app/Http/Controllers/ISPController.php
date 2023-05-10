<?php

namespace App\Http\Controllers;

use App\Models\ISP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ISPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ISP_LOGIN'))
        {
            return redirect('isp/dashboard');
        }
        else
        {
            return view('isp.login');
        }
    }
    public function auth(Request $request)
    {

       $username=$request->post('username');
       $password=$request->post('password');
       $result=ISP::where(['username'=>$username, 'password'=>$password])->get();


      if(isset($result['0']->id))
      {
         $request->session()->put('ISP_LOGIN',true);
         $request->session()->put('ISP_ID',$result['0']->id);
         return redirect('isp/dashboard');
      }
      else
      {
         $request->session()->flash('error','Please enter valid information');
         return redirect('isp');
      }
    }
    public function dashboard()
    {
        return view('isp.dashboard');
    }
    public function manage_profile(Request $request)
    {
        $company_id=session()->get('ISP_ID');
        $result['data']=ISP::all()->where(['id'=>$company_id]);

        $result['dataa']=DB::table('i_s_p_s')->where(['id'=>$company_id])->get();

        return view('isp.manage_profile',$result);
    }
    public function Show()
    {
        $result['data']=ISP::all();
        return view('User.isp',$result);
    }
}