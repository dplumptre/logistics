<?php
use App\Equipment;
use App\Location;
use App\Narration;


?>

<style>

body {
  font-size:13px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 3px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  font-size:13px;
}

h2,h3,h4,hr,th,td {
  color: #272727;
  /*text-transform:uppercase;*/
}

tr:hover {background-color:#f5f5f5;}
</style>
</head>
<body>


<h2>{{ env('APP_NAME')}}</h2>
<div class="alert alert-info" role="alert" style="border:solid thin #ccc; color:#666; padding:30px;margin-bottom:40px">
<h3>{{ $location->name}} REPORT</h3>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                            <th style=" border-bottom: 1px solid #fff;" class="text-center"></th>
                            <td style=" border-bottom: 1px solid #fff;" class="text-center"></tbody>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                <td style=" border-bottom: 1px solid #fff;"class="text-center"><strong>STORE KEEPER:</strong>  </td>
                                <td style=" border-bottom: 1px solid #fff;"class="text-center">{{ $location->store_keeper }}</td>
                                   </tr>
                                   <tr class="odd gradeX">
                                <td style=" border-bottom: 1px solid #fff;" class="text-center"><strong>  PROJECT MANAGER:</strong>  </td>
                                <td style=" border-bottom: 1px solid #fff;" class="text-center">{{ $location->project_manager }}</td>
                                   </tr>
                                   <tr class="odd gradeX">
                                <td style=" border-bottom: 1px solid #fff;" class="text-center"><strong>PHONE NUMBER:</strong>  </td>
                                <td style=" border-bottom: 1px solid #fff;" class="text-center">{{ $location->phone_number }}</td>
                                   </tr>                                 
                                </tbody>
                            </table>   

</div>





<table>
  <tr>
  <th class="text-center"></th>
    <th>Date</th>
    <th>Equipments</th>
    <th>Good</th>
    <th>Bad</th>
    <th>Damaged</th>
  </tr>
  @foreach($location->equipments as $key => $d)
  <tr>
      <td class="text-center">{{ $key +1  }} </td>
      <td class="text-center"> {{ $d->created_at->format('Y-m-d') }} </td>
      <td class="text-center"> {{ $d->name }} </td>
      <td class="text-center">{{ $d->pivot->quantity_good }}</td>
      <td class="text-center">{{ $d->pivot->quantity_bad }}</td>
      <td class="text-center">{{ $d->pivot->quantity_damaged }}</td>
     
  </tr>
  @endforeach
</table>


<!-- <h2>Details</h2>

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                            <th class="text-center"></th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Narration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($e))
                                @foreach($e as $key => $d)
                                    <tr class="odd gradeX">
                                <td class="text-center">{{ $key +1  }} </td>
                                <td class="text-center">{{ $d->created_at->format('Y-m-d')}}</td>
                                <td class="text-center">{{ $d->narration}}</td>
                                         
                                    </tr>
                                   @endforeach
                                   @endif
                                </tbody>
                            </table>        -->