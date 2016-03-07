@extends('layouts.payroll')
@section('content')
<br/>
<?php


function asMoney($value) {
  return number_format($value, 2);
}

?>
<div class="row">
	<div class="col-lg-12">


<a class="btn btn-info btn-sm "  href="{{ URL::to('employee_allowances/view/'.$eallw->id)}}">update details</a>

<hr>
</div>	
</div>


<div class="row">

<div class="col-lg-2">

<img src="{{asset('/public/uploads/employees/photo/'.$eallw->photo) }}" width="150px" height="130px" alt="{{asset('/public/uploads/employees/photo/default_photo.png') }}"><br>
<br>
<img src="{{asset('/public/uploads/employees/signature/'.$eallw->signature) }}" width="120px" height="50px" alt="{{asset('/public/uploads/employees/signature/sign_av.jpg') }}">
</div>

<div class="col-lg-6">

<table class="table table-bordered table-hover">
<tr><td colspan="2"><strong><span style="color:green">Employee Allowance Information</span></strong></td></tr>
      @if($eallw->middle_name != null || $eallw->middle_name != ' ')
      <tr><td><strong>Employee: </strong></td><td> {{$eallw->first_name.' '.$eallw->last_name.' '.$eallw->middle_name}}</td>
      @else
      <td><strong>Employee: </strong></td><td> {{$eallw->first_name.' '.$eallw->last_name}}</td>
      @endif
      </tr>
      <tr><td><strong>Allowance Type: </strong></td><td>{{$eallw->allowance_name}}</td></tr>
      <tr><td><strong>Amount: </strong></td><td align="right">{{asMoney($eallw->allowance_amount)}}</td></tr>
</table>
</div>

</div>


	</div>


</div>


@stop