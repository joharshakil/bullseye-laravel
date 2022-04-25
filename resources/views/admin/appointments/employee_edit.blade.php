@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            Edit Employee
            <!--small>it all starts here</small-->
        </h1>
    </section>



    <section class="content">
        <section class="content">
            <div class="row">
                <div class="col-md-12">


                    <form action="{{ route('employee_update' , $employee->id) }}" method="post" enctype="multipart/form-data" data-parsley-validate="" validate="" class="form-horizontal" data-toggle="validator" >
                        {{ csrf_field() }}

                        <div action="#" class="panel panel-default">

                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Employee Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="employee_name" required="required" class="form-control" value="{{$employee->employee_Name}} ">
                                        </div>
                                        <div class="col-sm-4">
                                            <code>required</code>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="panel-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Employee Type</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="employee_type" required="required" class="form-control" value="{{$employee->job_type}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="panel-body">
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Employee Phone</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="phone_number" required="required" class="form-control" value="{{$employee->phone_number}}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <code>required</code>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                    <div class="panel-footer text-center">
                                        <button type="submit" class="btn btn-info">Update Employee</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END panel-->
                    </form>
                </div>
            </div>
            <!-- END row-->
        </section>



    </section>

@endsection
