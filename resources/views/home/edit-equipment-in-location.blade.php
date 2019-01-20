@extends('layouts.app_home')

@include('layouts.partials.scripts.datatables_css')

@section('content')


<!-- carry this line below every page -->
<!-- carry this line below every page -->
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Equipment in location</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


<!-- carry this line above every page -->
<!-- carry this line above every page -->




                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">





                        @include('layouts.partials.errors')

<form class="form-horizontal" method="POST" action="{{ asset('home/view-location/'.$location->id.'/'.$equipment->id.'/update-equipment-in-location') }}">
                        {{ csrf_field() }}             
                        {{ method_field('PUT') }}

                        
<div class="col-md-12 col-12" style="padding-bottom: 15px">



<div class="form-group">               
<div class="col-md-12 col-12" style="padding-bottom: 15px">

<input type="hidden" name="location_id" value="{{ $location->id }}"> 
<label>Add Equipment </label>       
<select class="form-control border border-info" disabled name="equipment_id" id="">

    
@foreach($equipments as $eqp)




<option 
    
    
@if($eqp->id === $equipment->id)
selected
@endif
    
    
    
    value="{{$eqp->id}} ">{{ $eqp->name }} </option>
    @endforeach
</select>
</div>
</div>




    <div class="form-group">
            <div class="col-xs-3">
            <label >QG</label>
            <input class="form-control " type="text" name="qty_good" value="{{$p->pivot->quantity_good}}"> 
            </div>
            <div class="col-xs-3">
            <label >QB</label>
            <input class="form-control " type="text" name="qty_bad" value="{{$p->pivot->quantity_bad}}"> 
            </div>
            <div class="col-xs-3">
            <label >QD</label>
            <input class="form-control " type="text" name="qty_damaged" value="{{$p->pivot->quantity_damaged}}"> 
            </div>
    </div>




       


 </div>


            

<div class="col-md-12 " style="padding: 15px">
    <button type="submit" class="btn btn-primary">Submit </button>
</div>
            

</form>





                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                @endsection

@push('scripts')
@include('layouts.partials.scripts.datatables_js')
@endpush

