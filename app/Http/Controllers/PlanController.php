<?php

namespace App\Http\Controllers;

use App\Models\plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id=session()->get('ISP_ID');
        $result['data']=DB::table('plans')->where(['isp_id'=>$company_id])->get();
        return view('isp.plan',$result);
    }
    public function manage_plan(Request $request,$id='')
    {
        if($id>0){
            $arr=plan::where(['id'=>$id])->get();

            $result['isp_id']=$arr['0']->isp_id;
            $result['name']=$arr['0']->name;
            $result['code']=$arr['0']->code;  
            $result['description']=$arr['0']->description;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id; 
        }
        else{
            $result['name']='';
            $result['code']='';  
            $result['description']='';
            $result['status']='';
            $result['id']=0; 
        }

        $result['plan']=DB::table('plans')->where(['status'=>1])->get();
        return view('isp.manage_plan',$result); 
    }
    public function manage_plan_process(Request $request)
    {
        
        if($request->post('id')>0){
            $model=Plan::find($request->post('id'));
            $msg="Plan updated successfully";
        }
        else{
            $model=new plan();
            $msg="Plan added successfully";
        }

        $model->isp_id=session()->get('ISP_ID');
        $model->name=$request->post('name');
        $model->code=$request->post('code');
        $model->description=$request->post('description');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('isp/plan');
    }
    public function status(Request $request,$status,$id){
        $model=Plan::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('isp/plan');        
    }
}