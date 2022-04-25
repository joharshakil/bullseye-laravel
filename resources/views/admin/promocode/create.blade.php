@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            Add Employee
            <!--small>it all starts here</small-->
        </h1>
    </section>



    <section class="content">
        <section class="content">
            <div class="row">
                <div class="col-md-12">


                    <form action="{{route('promocode.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate="" validate="" class="form-horizontal" data-toggle="validator" >
                    {{ csrf_field() }}

                    <!-- START panel-->

                        <div action="#" class="panel panel-default">

                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Code</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="code" required="required" class="form-control" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <code>required</code>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="panel-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Amount</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="amount" required="required" class="form-control" value="">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="panel-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Type</label>
                                            <div class="col-sm-6">
                                                <select name="type" class="select form-control" id="status">
                                                    <option value="1"> Amount </option>
                                                    <option value="2"> Percentage </option>

                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>

                                    <div class="panel-body">
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-6">
                                              <select name="status" class="select form-control" id="status">
                                                  <option value="1"> Active </option>
                                                  <option value="2"> In Active </option>
                                              </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <code>required</code>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                    <div class="panel-footer text-center">
                                        <button type="submit" class="btn btn-info">Edit Project</button>
                                    </div>
                                </div>
                                <!-- END panel-->
                        </div>
                    </form>
                </div>
            </div>
            <!-- END row-->
        </section>



    </section>

@endsection
