@extends('isp/layout')
@section('plan_select','active')
@section('page_title','Update Plan')
@section('container')
  @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
     {{session('message')}}
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	 </button>
   </div>
   @endif
<div class="col-lg-12">
    <form action="{{route('manage_plan_process')}}" method="post" enctype="multipart/form-data">
        <div class="card" id="pab" >
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Update Plan</h3>
                </div>
                <hr>
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Plan Name</label>
                        <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="code" class="control-label mb-1">Code</label>
                        <input id="code" value="{{$code}}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label mb-1">Description</label>
                        <textarea id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$description}}</textarea>
                    </div>
            </div>
        </div> 
         <div>
          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
        </div>
        <input type="hidden" name="id" value="{{$id}}"/>
    </form>
</div>
@endsection