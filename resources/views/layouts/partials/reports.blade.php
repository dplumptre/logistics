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
  font-size:13px;
}

th, td {
  padding: 3px;
  text-align: left;
  border: 1px solid #ddd;
  font-size:13px;
}



h2,h3,h4,hr,th,td {
  color:#272727;
  /*text-transform:uppercase;*/
}
tr:hover {background-color:#f5f5f5;}

.page-break {
    page-break-after: always;
}
</style>
</head>
<body>


<h2>{{ env('APP_NAME')}}</h2>
<h2>FULL REPORT</h2>
<h3>GOOD = G / BAD = B / DAMAGED = D</h3>
<p></p>
<p></p>

<p style='margin:40px 0px'><hr></p>



 @foreach($location as $l)
<h3>{{ $l->name }}</h3>
<p style="text-transform:uppercase;color:#666">STORE KEEPER: {{ $l->store_keeper  }} / PROJECT MANAGER : {{ $l->project_manager }} / PHONE NUMBER : {{ $l->phone_number }}</p>

  <table>
  <tr>
  <th class="text-center"></th>
    <th>DATE</th>
    <th>EQUIPMENT</th>
    <th>G</th>
    <th>B</th>
    <th>D</th>
  </tr>
               @foreach($l->equipments as $key =>$d)
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

  @endforeach


  <div class="page-break"></div>


  
<h3>SUMMARY</h3>


<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th class="text-center"></th>
                            <th class="text-center">EQUIPMENT</th>
                            <th class="text-center">LOCATIONS</th>
                            <th class="text-center">Total G</th>
                            <th class="text-center">Total B</th>
                            <th class="text-center">Total D</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($equipment as $key => $d)
                                    <tr class="odd gradeX">
                                    <td class="text-center">{{$key + 1 }}</td>
                                <td class="text-center">{{ $d->name}}</td>
                                <td class="text-center">
                                @foreach($d->locations as $detail)
                                {{ $detail-> name}} /
                                @endforeach
                                
                                </td>
                                <td class="text-center">
                                {{ getTotal($d->locations,'good')}}
                                </td>
                                <td class="text-center">
                                {{ getTotal($d->locations,'bad')}}
                                </td>
                                <td class="text-center">
                                {{ getTotal($d->locations,'damaged')}}
                                </td>



                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>    