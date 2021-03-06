<?php


function asMoney($value) {
  return number_format($value, 2);
}

?>
<html >



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style type="text/css">

table {
  max-width: 100%;
  background-color: transparent;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  margin-bottom: 2px;
}
hr {
  margin-top: 1px;
  margin-bottom: 2px;
  border: 0;
  border-top: 2px dotted #eee;
}

body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 12px;
  line-height: 1.428571429;
  color: #333;
  background-color: #fff;
}



 @page { margin: 170px 30px; }
 .header { position: fixed; left: 0px; top: -150px; right: 0px; height: 150px;  text-align: center; }
 .content {margin-top: -100px; margin-bottom: -150px}
 .footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 50px;  }
 .footer .page:after { content: counter(page, upper-roman); }



</style>

</head>

<body>

  <div class="header">
     <table >

      <tr>


       
        <td style="width:150px">

            <img src="{{ '../images/logo.png' }}" alt="{{ $organization->logo }}" width="150px"/>
    
        </td>

        <td>
        <strong>
          {{ strtoupper($organization->name)}}<br>
          </strong>
          {{ $organization->phone}} |
          {{ $organization->email}} |
          {{ $organization->website}}<br>
          {{ $organization->address}}
       

        </td>
        

      </tr>


      <tr>

        <hr>
      </tr>



    </table>
   </div>

<br>

<?php
  $d=strtotime($from);
  $d1=strtotime($to);
?>

<div class="footer">
     <p class="page">Page <?php $PAGE_NUM ?></p>
   </div>


	<div class="content" style='margin-top:0px;'>

<div align="center"><strong>Company Property Report for period between {{date("F j, Y", $d).' and '.date("F j, Y", $d1)}}</strong></div><br>
    <table class="table table-bordered" border='1' cellspacing='0' cellpadding='0'>

      <tr>
        


        <td width='20'><strong># </strong></td>
        <td><strong>Employee</strong></td>
        <td><strong>Property Name </strong></td>
        <td><strong>Description </strong></td>
        <td><strong>Serial No.</strong></td>
        <td><strong>Digital SNo.</strong></td>  
        <td><strong>Value</strong></td>
        <td><strong>Issued by</strong></td>
        <td><strong>Issue Date</strong></td>
        <td><strong>Scheduled Return Date</strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Received by</strong></td>
      </tr>
      <?php $i =1; ?>
      @foreach($properties as $property)
      <tr>


       <td td width='20'>{{$i}}</td>
        <td> {{$property->last_name.' '.$property->first_name}}</td>
        <td> {{ $property->name}}</td>
        <td> {{ $property->description}}</td>
        <td> {{ $property->serial}}</td>
        <td> {{ $property->digitalserial}}</td>
        <td align="right"> {{ asMoney((double)$property->monetary) }} </td>
        <td> {{ Property::getIssuer($property->issued_by)}}</td>
        <td> {{ $property->issue_date}}</td>
        <td> {{ $property->scheduled_return_date}}</td>
        
        @if($property->state == 1)
        <td> Returned</td>
        <td> {{ Property::getReceiver($property->received_by)}}</td>
        @else
        <td>Not Returned</td>
        <td></td>
        @endif
        </tr>
      <?php $i++; ?>
   
    @endforeach

     


    </table>

<br><br>

    





   
</div>


</body>

</html>



