@extends('layouts.app_home')

@include('layouts.partials.scripts.datatables_css')

@section('content')


<!-- carry this line below every page -->
<!-- carry this line below every page -->
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Transfer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           

<!-- carry this line above every page -->
<!-- carry this line above every page -->

<div class="row">
               

            <!-- /.row -->
           


                <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       Transfer equipments from {{ $data->name }}  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                 
                        
                        @include('layouts.partials.errors')

<form class="form-horizontal" method="POST" action="{{ asset('home/transfer/'.$data->id.'/'.$equipment->id )}}">
                        {{ csrf_field() }}




 <div class="form-group">               
<div class="col-md-12 col-12" style="padding-bottom: 15px">



<label>Equiptment : {{ $equipment->name }} </label>     

</div>




<?php

$p = $equipment->locations()->where('location_id', $data->id)->first();
?>


    <div class="form-group">
    <div class="col-md-12 col-12" style="padding-bottom: 15px">
            <div class="col-xs-3">
            <label >QG</label>
            <input class="form-control" disabled type="text" name="qty_good" value="{{$p->pivot->quantity_good}}"> 
            </div>
            <div class="col-xs-3">
            <label >QB</label>
            <input class="form-control" disabled  type="text" name="qty_bad" value="{{$p->pivot->quantity_bad}}"> 
            </div>
            <div class="col-xs-3">
            <label >QD</label>
            <input class="form-control" disabled  type="text" name="qty_damaged" value="{{$p->pivot->quantity_damaged}}"> 
            </div>
    </div>
   
</div>
</div>

<div class="form-group">               
<div class="col-md-12 col-12" style="padding-bottom: 15px">

<input type="hidden" name="location_id" value="{{ $data->id }}"> 
<label>Transfer to  </label>       
<select class="form-control border border-info"  name="location_id2" id="">
<option value="">Select location</option>
    @foreach($locations as $eqp)
    <option value="{{$eqp->id}} ">{{ $eqp->name }}</option>
    @endforeach
</select>
</div>
</div>




    <div class="form-group">
            <div class="col-xs-3">
            <label >QG</label>
            <input class="form-control " type="text" name="qty_good2" value=""> 
            </div>
            <div class="col-xs-3">
            <label >QB</label>
            <input class="form-control " type="text" name="qty_bad2" value=""> 
            </div>
            <div class="col-xs-3">
            <label >QD</label>
            <input class="form-control " type="text" name="qty_damaged2" value=""> 
            </div>
    </div>




       




<button type="submit" class="btn btn-primary">Transfer</button>

      


</form>



                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               



                


                
                @endsection

@push('scripts')
@include('layouts.partials.scripts.datatables_js')
@endpush

