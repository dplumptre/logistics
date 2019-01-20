<?php
use App\Equipment;
use App\Location;
use App\Narration;


?>


<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>
</head>
<body>

<h2>{{ $location->name}} REPORT</h2>
<p></p>

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


<h2>Details</h2>

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
                            </table>       