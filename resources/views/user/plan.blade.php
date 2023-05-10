@extends('user/layout')
@section('page_title','plan')
@section('plan_select','active')
@section('container')
   @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
     {{session('message')}}
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	 </button>
    </div>
   @endif
<div class="overview-wrap">
    <h2 class="title-1">Plan</h2>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Apply</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plan as $list)
                    <tr>
                        <td>{{$list->name}}</td>
                        <td>{{$list->description}}</td>
                        <td>
                            <div class="table-data-feature">                              
                                <a href="{{url('user/isp/plan/apply')}}/{{$list->id}}"><button type="button" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Apply">
                                    <i class="zmdi zmdi-file"></i>&nbsp;
                                </button>   
                            </div>                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection