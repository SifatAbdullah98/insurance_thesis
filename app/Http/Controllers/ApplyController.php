<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Plan;
use App\Models\ISP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.apply');
    }
    public function apply(Request $request)
    {
        $document_validation="required|mimes:jpg,jpeg,png,pdf";
        $request->validate([
            'document'=>$document_validation,
        ]);
        
        $model=new apply();
        $msg="Plan added successfully";
        if($request->hasfile('document'))
        {
            $document=$request->file('document');
            $ext=$document->extension();
            $document_name=time().'.'.$ext;
            $document->storeAs('public/media',$document_name);
            $model->document=$document_name;
        }
        
        $model->user_id=session()->get('USER_ID');
        $model->plan_id=$request->post('plan_id');
        $model->company_id=$request->post('company_id');
        $model->companyname=$request->post('companyname');
        $model->planname=$request->post('planname');
        $model->fisrtname=$request->post('firstname');
        $model->lastname=$request->post('lastname');
        $model->dob=$request->post('dob');
        $model->profession=$request->post('profession');
        $model->maritalstatus=$request->post('maritalstatus');
        $model->nationality=$request->post('nationality');
        $model->idno=$request->post('idno');
        $model->contactno=$request->post('contactno');
        $model->email=$request->post('email');
        $model->fathers_name=$request->post('fathers_name');
        $model->mothers_name=$request->post('mothers_name');
        $model->present_address=$request->post('present_address');
        $model->parmanent_address=$request->post('parmanent_address');
        $model->validation=0;
        $model->status=0;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('/');
    }
    public function apply_view(Request $request,$id=''){
        if($id>0){
            $arr=plan::where(['id'=>$id])->get();
            $result['plan_id']=$arr['0']->id;
            $result['plan_name']=$arr['0']->name;
            $result['company_id']=$arr['0']->isp_id;
            $brr=ISP::where(['id'=>$result['company_id']])->get();
            $result['company_name']=$brr['0']->name;
        }
        return view('user.apply',$result);
    }
    public function load(Request $request){
        $user_id=session()->get('USER_ID');
        $result['application']=DB::table('applies')->where(['user_id'=>$user_id])->get();
        return view('user.application',$result);
    }
    public function isp_load(Request $request){
        $company_id=session()->get('ISP_ID');
        $result['application']=DB::table('applies')->where(['company_id'=>$company_id])->get();
        return view('isp.application',$result);
    }
    public function status(Request $request,$status,$id){
        $model=Apply::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('isp/application');        
    }
    public function validator_load(Request $request){
        $result['application']=DB::table('applies')->get();
        return view('validator.request',$result);
    }
    public function validation(Request $request,$validation,$id){
        $model=Apply::find($id);
        $model->validation=$validation;
        $model->save();
        $request->session()->flash('message','Status updated');
        return redirect('validator/request');        
    }
    public function details(Request $request, $id=''){
        $result['application']=DB::table('applies')->get();
        return view('validator.request',$result);
    }
}