@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            Edit Project
            <!--small>it all starts here</small-->
        </h1>
    </section>



    <section class="content">
        <section class="content">
            <div class="row">
                <div class="col-md-12">


                    <form action="/es_update/{{$data->id}}" method="post" enctype="multipart/form-data" data-parsley-validate="" validate="" class="form-horizontal" data-toggle="validator" >
                    {{ csrf_field() }}

                    <!-- START panel-->

                        <div action="#" class="panel panel-default">

                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Job Site Address</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="country" required="required" class="form-control" value="{{isset($data->location) ? ($data->location) : '' }} ">
                                        </div>
                                        <div class="col-sm-4">
                                            <code>required</code>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="panel-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Project Date Reschedule</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="date"  id="date" required="required" class="form-control" value="{{ $data->date }}">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Description</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="description" required="required" class="form-control" value="{{$data->description}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Newsletter Subscription</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="newsletter" required="required" class="form-control" value="{{$data->newsletter}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Office Phone</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="office_phone" required="required" class="form-control" value="{{$data->office_phone}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> Mobile Phone</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="mobile_phone" required="required" class="form-control" value="{{$data->mobile_phone}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>


                                {{--    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> Utility </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="utility" required="required" class="form-control" value=" @if(isset($data->utility)){{  $data->utility }} @endif">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>--}}

                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> Markings </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="markings" required="required" class="form-control" value="{{$data->markings}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <code>required</code>
                                            </div>
                                        </div>
                                    </fieldset>

                                    @if(\Illuminate\Support\Facades\Auth::id() == 2)
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Assign Employee Name </label>
                                                <div class="col-sm-6">
                                                    <select required="required" class="form-control" name="status" id="status-show">
                                                        <option value="unschedule">Unschedule </option>
                                                        <option value="schedule">Schedule</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <code>required</code>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Assign Employee Name </label>
                                                <div class="col-sm-6">
                                                    <select required="required" class="form-control" name="employee" id="sports">
                                                        @foreach($employee as $aSport)
                                                            <option value="{{ $aSport->id }}">{{ $aSport->employee_Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <code>required</code>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Start Date Time </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="starttime" required="required" class="form-control" id="starttime" value="{{ $data->starttime }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <code>required</code>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> End Date Time </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="endtime" required="required" class="form-control" id="endtime" value="{{$data->endtime }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <code>required</code>
                                                </div>
                                            </div>
                                        </fieldset>


                                    @endif

                                </div>
                                <div class="panel-footer text-center">
                                    <button type="submit" class="btn btn-info">Edit Project</button>
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

@section('javascript')
    <script src="{{ asset('js/jquery.datetimepicker.full.js') }}"></script>
    <link href="{{ asset('js/jquery.datetimepicker.min.css') }}" rel="stylesheet" />
    <script>
        jQuery('#date').datetimepicker({
            timepicker:false,
        });
        jQuery('#starttime').datetimepicker();
        jQuery('#endtime').datetimepicker();
    </script>
@endsection

