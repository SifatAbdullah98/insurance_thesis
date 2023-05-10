@extends('user/layout')
@section('page_title','My Applications')
@section('My Applications_select','active')
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
                        <th>Company Name</th>
                        <th>Verification Staus</th>
                        <th>Approve Staus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($application as $list)
                    <tr>
                        <td>{{$list->planname}}</td>
                        <td>{{$list->companyname}}</td>
                        <td>
                            @if($list->validation==1)
                              Verification Completed
                             @elseif($list->validation==0)
                              Verification Pending
                            @endif
                        </td>
                        <td>
                            @if($list->status==1)
                             Approved
                            @elseif($list->status==0)
                             Pending
                            @elseif($list->status==2)
                             Denied
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