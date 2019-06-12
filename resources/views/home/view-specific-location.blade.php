@extends('layouts.app_home')

@include('layouts.partials.scripts.datatables_css')

@section('content')


<!-- carry this line below every page -->
<!-- carry this line below every page -->
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> {{ $data->name }} </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           

<!-- carry this line above every page -->
<!-- carry this line above every page -->

<div class="row">
                <div class="col-lg-12">
<div class="alert alert-info" role="alert">
<p><strong> STORE KEEPER:</strong> </p>
<p>{{ $data->store_keeper }}</p>
<p><strong> PROJECT MANAGER:</strong></p>
<p>{{ $data->project_manager }}</p>
<p><strong> PHONE NUMBER:</strong></p>
<p>{{ $data->phone_number }}</p>
</div>

                @include('layouts.partials.errors')
            </div>



         
            <!-- /.row -->
           


                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Add new equipment to {{ $data->name }}  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                 
                        
                       

<form class="form-horizontal" method="POST" action="{{ route('home.store.location.spec')}}">
                        {{ csrf_field() }}


<div class="form-group">               
<div class="col-md-12 col-12" style="padding-bottom: 15px">

<input type="hidden" name="location_id" value="{{ $data->id }}"> 
<label>Add Equipment </label>       
<select class="form-control border border-info"  name="equipment_id" id="">
<option value="">Select</option>
    @foreach($equipments as $eqp)
    <option value="{{$eqp->id}} ">{{ $eqp->name }}</option>
    @endforeach
</select>
</div>
</div>




    <div class="form-group">
            <div class="col-xs-3">
            <label >QG</label>
            <input class="form-control " type="text" name="qty_good" value=""> 
            </div>
            <div class="col-xs-3">
            <label >QB</label>
            <input class="form-control " type="text" name="qty_bad" value=""> 
            </div>
            <div class="col-xs-3">
            <label >QD</label>
            <input class="form-control " type="text" name="qty_damaged" value=""> 
            </div>
    </div>




       




<button type="submit" class="btn btn-primary">Submit </button>

      


</form>



                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               



                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                            <th class="text-center"></th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Equipment</th>
                            <th class="text-center">Q.G</th>
                            <th class="text-center">Q.B</th>
                            <th class="text-center">Q.D</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data->equipments as $key => $d)
                                    <tr class="odd gradeX">
                                <td class="text-center">{{ $key +1  }} </td>
                                <td class="text-center"> {{ $d->created_at->format('Y-m-d') }} </td>
                                <td class="text-center"> {{ $d->name }} </td>
                                <td class="text-center">{{ $d->pivot->quantity_good }}</td>
                                <td class="text-center">{{ $d->pivot->quantity_bad }}</td>
                                <td class="text-center">{{ $d->pivot->quantity_damaged }}</td>
                                <td class="text-center">{{ $d->pivot->quantity_good  +  $d->pivot->quantity_bad +  $d->pivot->quantity_damaged }}</td>

                                <td class="text-center">
                                <a   href="{{ asset('home/view-location/'.$data->id.'/'.$d->id.'/edit-equipment-in-location') }}"><i class="fa fa-edit"></i></a>
                                <a href="{{ asset('home/'.$data->id.'/'.$d->id.'/delete-equipment-in-location') }}" onclick="javascript:return confirm('Are you sure you want to delete?')"  data-toggle="tooltip" title="Delete Class">
                                <i class="fa fa-trash"></i>
                                </a>
                               </td>
                               <td class="text-center">
                               
                               <a  class='btn btn-danger' href="{{ asset('home/transfer/'.$data->id.'/'.$d->id) }}"><i class="fa fa-exchange"></i></a>
                               </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>                          
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <!-- /.panel -->
                </div>


                


                <div class="col-lg-12">
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">
                           
                        </div> -->
                        <!-- /.panel-heading -->
                        <!-- <div class="panel-body">

                            
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
                          
                        </div> -->
                        <!-- /.panel-body -->


        <a  class='btn btn-danger' href="{{ asset('home/print-report/'.$data->id )}}"><i class='fa fa-print'></i> Print Report</a>

                    </div>


<br> <br>

                @endsection

@push('scripts')
@include('layouts.partials.scripts.datatables_js')
@endpush

