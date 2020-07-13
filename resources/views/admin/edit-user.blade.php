@extends('layouts.app_home')

@include('layouts.partials.scripts.datatables_css')

@section('content')


<!-- carry this line below every page -->
<!-- carry this line below every page -->
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit User</h1>
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




                        <form class="form-horizontal" method="POST" action="{{ asset('admin/update_user/'.$user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


            <div class="col-md-12 col-12" style="padding-bottom: 15px">
                <label> Name </label>
                <input type="text"  class="form-control border border-info" name="name" value="{{ $user->name }}"/>
            </div>

            <div class="col-md-12 col-12" style="padding-bottom: 5px">
                <label>E-mail Address </label>
                <input type="email"  class="form-control border border-info" name="email" value="{{$user->email }}"/>
            </div>


@if(auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin'))
<div class="col-md-12 col-12" style="padding-bottom: 15px">

<?php


$arr = [];

$c = count($user->roles);


for($x=0; $x<$c ;$x++){
    $arr[] = $user->roles[$x]['slug'];
}

//print_r($arr);

?>

<label>Role</label><br/>
@foreach($roles as $key =>$role)




<label class="radio-inline">
<input name="checkbox[]"




@if(in_array($role->slug, $arr))
checked
@endIf




 type="checkbox" value="{{ $role->id }}" name="role" > {{ $role->role }}</label>
@endforeach
 </div>
@endif








<div class="col-md-12 offset-md-4" style="padding: 15px">
    <button type="submit" class="btn btn-primary">Edit User </button>
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

