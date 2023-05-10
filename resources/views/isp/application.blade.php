@extends('isp/layout')
@section('page_title','Applications')
@section('Applications_select','active')
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
    <h2 class="title-1">Applications</h2>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Plan Name</th>
                        <th>Contact No</th>
                        <th>Verification Staus</th>
                        <th>Approval</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($application as $list)
                    <tr>
                        <td>{{$list->planname}}</td>
                        <td>{{$list->contactno}}</td>
                        <td>
                            @if($list->validation==1)
                              Verification Completed
                            @elseif($list->validation==0)
                              Verification Pending
                            @elseif($list->validation==2)
                              Verification unsuccessfull
                            @endif
                        </td>
                        <td>
                        @if ($list->validation==1)
                            @if($list->status==1)
                             <a href="{{url('isp/application/status/0')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Aproved">
                             @elseif($list->status==0)
                              <a href="{{url('isp/application/status/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="pending">
                            @endif
                        @else
                            Wait until Verified
                        @endif
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