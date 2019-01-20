@extends('layouts.app_home')

@include('layouts.partials.scripts.datatables_css')

@section('content')


<!-- carry this line below every page -->
<!-- carry this line below every page -->
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Equipments</h1>
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th class="text-center"></th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center"><a href="{{ asset('home/add-equipment') }}" data-toggle="tooltip" title="Add New ">
                                <i class="fa fa-plus-circle"></i>
                            </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $d)
                                    <tr class="odd gradeX">
                                    <td class="text-center">{{$key + 1 }}</td>
                                <td class="text-center">{{ $d->name}}</td>
                                <td class="text-center">{{ $d->slug}}</td>
                                <td class="text-center">

                                <a   href="{{ asset('home/'.$d->id .'/edit-equipment') }}"><i class="fa fa-edit"></i></a>

                                    <a href="{{ asset('home/'.$d->id.'/delete-equipment') }}" onclick="javascript:return confirm('Are you sure you want to delete?')"  data-toggle="tooltip" title="Delete Class">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                    </tr>
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

