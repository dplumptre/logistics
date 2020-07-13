@extends('layouts.app_home')

@include('layouts.partials.scripts.datatables_css')

@section('content')


<!-- carry this line below every page -->
<!-- carry this line below every page -->
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
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
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Reg Date</th>
                                        <th>role</th>
                                        <th class='text-center'>
                                        <a href="{{ asset('admin/add-user')}}"> + </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $user)

                                @if($user->email =="superadmin@example.com")
                                @else
                                <tr class="odd gradeX">
                                    <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->created_at }} </td>
                                        <td>
                                @foreach($user->roles as $r)
                                {{$r->role}} /
                                @endforeach

                                        </td>

                    <td>
                    <a href="{{ asset('admin/edit-user/'.$user->id)}}"> <i class='fa fa-edit'></i> </a>
                    <a href="{{ asset('admin/delete_user/'.$user->id)}}"  onclick="javascript:return confirm('Are you sure you want to delete user?')"  data-toggle="tooltip" title="Delete Student"> <i class='fa fa-trash'></i>  </a>
                    </td>
                                    </tr>
                                @endif

                                   @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

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

