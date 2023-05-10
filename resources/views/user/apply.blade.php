@extends('user/layout')
@section('isp_select','active')
@section('page_title','Application form')
@section('container')
  @if(session()->has('message'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
     {{session('message')}}
	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	 </button>
   </div>
   @endif
   <p>
    Every information Must be correct and should be provided as per Nid/Passport/Birth certificate.
   </p>
   <div class="col-lg-12">
    <form action="{{route('apply')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="card" id="pab" >
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Application Form</h3>
                </div>
                <hr>
                    <div class="form-group">
                        <label for="companyname" class="control-label mb-1">Company name</label>
                        <input id="companyname" value="{{$company_name}}" name="companyname" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly>
                    </div>
                    <div class="form-group">
                        <label for="plan_id" class="control-label mb-1"></label>
                        <input id="plan_id" value="{{$plan_id}}" name="plan_id" type="text" class="form-control" aria-required="true" aria-invalid="false" hidden>
                    </div>
                    <div class="form-group">
                        <label for="company_id" class="control-label mb-1"></label>
                        <input id="company_id" value="{{$company_id}}" name="company_id" type="text" class="form-control" aria-required="true" aria-invalid="false" hidden>
                    </div>
                    <div class="form-group">
                        <label for="planname" class="control-label mb-1">Plan name</label>
                        <input id="planname" value="{{$plan_name}}" name="planname" type="text" class="form-control" aria-required="true" aria-invalid="false" readonly>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="control-label mb-1">First Name</label>
                        <input id="firstname" value="" name="firstname" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="control-label mb-1">Last Name</label>
                        <input id="lastname" value="" name="lastname" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="control-label mb-1">Date of birth(dd/mm/yyyy)</label>
                        <input id="dob" value="" name="dob" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="profession" class="control-label mb-1">Profession</label>
                        <input id="profession" value="" name="profession" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="maritalstatus" class="control-label mb-1">Marital status</label>
                        <input id="maritalstatus" value="" name="maritalstatus" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="nationality" class="control-label mb-1">Nationality</label>
                        <input id="nationality" value="" name="nationality" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="idno" class="control-label mb-1">Nid no/Passport no/Birth cirtificate no</label>
                        <input id="idno" value="" name="idno" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="contactno" class="control-label mb-1">Contact no</label>
                        <input id="contactno" value="" name="contactno" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label mb-1">Email</label>
                        <input id="email" value="" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="present_address" class="control-label mb-1">Present Address</label>
                        <input id="present_address" value="" name="present_address" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="parmanent_address" class="control-label mb-1">Parmanent Address</label>
                        <input id="parmanent_address" value="" name="parmanent_address" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="fathers_name" class="control-label mb-1">Fathers name</label>
                        <input id="fathers_name" value="" name="fathers_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="mothers_name" class="control-label mb-1">Mothers Name</label>
                        <input id="mothers_name" value="" name="mothers_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <p>
                        Required documents:
                        <ul>
                            <li>Passport size photo</li>
                            <li>Nid/Birth cirtificate/Passport picture</li>
                            <li>professional proof(if any)</li>
                            <li>latest utility bill copy</li>
                        </ul>
                        <b>Scan all the document and submit in zip/rar or in single pdf file</b>
                    </p>
                    <div class="form-group">
                        <label for="document" class="control-label mb-1">Files</label>
                        <input id="document" name="document" type="file" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
            </div>
        </div> 
         <div>
          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
        </div>
        <input type="hidden" name="id" value=""/>
    </form>
</div>
@endsection