@extends('layouts.app_home')

@include('layouts.partials.scripts.datatables_css')

@section('content')


<!-- carry this line below every page -->
<!-- carry this line below every page -->
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Locations</h1>
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

<form class="form-horizontal" method="POST" action="{{ route('home.store.location')}}">
{{ csrf_field() }}

                  
<div class="col-md-12 col-12" style="padding-bottom: 15px">
                <label>Location </label>
                <input type="text"  class="form-control border border-info" name="name"  value=""/>
</div>


<div class="col-md-12 col-12" style="padding-bottom: 15px">
                <label>Store Keeper </label>
                <input type="text"  class="form-control border border-info" name="store_keeper"  value=""/>
</div>

<div class="col-md-12 col-12" style="padding-bottom: 15px">
                <label>Project Manager</label>
                <input type="text"  class="form-control border border-info" name="project_manager"  value=""/>
</div>

<div class="col-md-12 col-12" style="padding-bottom: 15px">
                <label>Phone Number</label>
                <input type="text"  class="form-control border border-info" name="phone_number"  value=""/>
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

