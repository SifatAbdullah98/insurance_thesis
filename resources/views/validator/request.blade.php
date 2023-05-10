@extends('validator/layout')
@section('page_title','Request')
@section('Requests_select','active')
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
    <h2 class="title-1">Request</h2>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        @foreach($application as $list)
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td>{{$list->fisrtname}}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{{$list->lastname}}</td>
                    </tr>
                    <tr>
                        <td>Date of birth</td>
                        <td>{{$list->dob}}</td>
                    </tr>
                    <tr>
                        <td>Profession</td>
                        <td>{{$list->profession}}</td>
                    </tr>
                    <tr>
                        <td>Marital Status</td>
                        <td>{{$list->maritalstatus}}</td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td>{{$list->nationality}}</td>
                    </tr>
                    <tr>
                        <td>ID No</td>
                        <td>{{$list->idno}}</td>
                    </tr>
                    <tr>
                        <td>contactno</td>
                        <td>{{$list->contactno}}</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>{{$list->email}}</td>
                    </tr>
                    <tr>
                        <td>present_address</td>
                        <td>{{$list->present_address}}</td>
                    </tr>
                    <tr>
                        <td>parmanent_address</td>
                        <td>{{$list->parmanent_address}}</td>
                    </tr>
                    <tr>
                        <td>fathers_name</td>
                        <td>{{$list->fathers_name}}</td>
                    </tr>
                    <tr>
                        <td>mothers_name</td>
                        <td>{{$list->mothers_name}}</td>
                    </tr>
                    <tr>
                        <td>Document</td>
                        <td><a href="{{asset('storage/app/public/media/'.$list->document)}}"><i class="fa fa-file"> Download documents </i></a></td>
                    </tr>
                    <tr>
                        <td>Validation Status</td>
                        <td>
                            @if($list->validation==1)
                             <a href="{{url('validator/request/validation/2')}}/{{$list->id}}">
                             <input class="btn btn-outline-success" type="reset" value="Aproved">
                             @elseif($list->validation==0)
                              <a href="{{url('validator/request/validation/1')}}/{{$list->id}}">
                              <input class="btn btn-outline-warning" type="reset" value="pending">
                            @elseif($list->validation==2)
                              <a href="{{url('validator/request/validation/2')}}/{{$list->id}}">
                              <input class="btn btn-outline-Danger" type="reset" value="Denied">
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