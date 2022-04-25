@extends('layouts.main')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-header with-border">
                <h3 class="page-title">
                    @lang('quickadmin.appointments.title')
                </h3>
            </div>
            @if(\Illuminate\Support\Facades\Auth::id() == 2)
            <div class="col-md-6 section-block">
                <ul>
                   <li> <a href="{{ route('es') }}" target="_blank" class="btn btn-xs btn-primary"> EM  SERVICE</a></li>
                    <li>  <a href="{{ route('cement') }}" target="_blank" class="btn btn-xs btn-primary"> CEMENT SERVICE</a>   </li>
                    <li>  <a href="{{ route('gpr') }}" target="_blank" class="btn btn-xs btn-primary"> GPR SERVICE</a>   </li>
                    <li>  <a href="{{ route('pel') }}" target="_blank" class="btn btn-xs btn-primary"> PEL SERVICE</a>   </li>
                </ul>

            </div>
            @endif

            <p>
                {{--      <a href="{{ route('appointments.create') }}"
                         class="btn btn-success">@lang('quickadmin.qa_add_new')</a>--}}

            </p>


            <div id='calendar'></div>

            <br/>

            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('quickadmin.qa_list')
                </div>

                {{--  <div class="panel-body table-responsive">
                      <table class="table table-bordered table-striped {{ count($appointments) > 0 ? 'datatable' : '' }} @can('appointment_delete') dt-select @endcan">
                          <thead>
                          <tr>
                              @can('appointment_delete')
                                  <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>
                              @endcan

                              <th>First and Last Name of customer</th>

                              <th>Phone</th>
                              <th>Email</th>
                              <th>Employee Assign</th>
                              <th>@lang('quickadmin.employees.fields.last-name')</th>
                              <th>@lang('quickadmin.appointments.fields.start-time')</th>
                              <th>@lang('quickadmin.appointments.fields.finish-time')</th>
                              <th>@lang('quickadmin.appointments.fields.comments')</th>
                              <th>&nbsp;</th>
                          </tr>
                          </thead>

                          <tbody>
                          @if (count($appointments) > 0)
                              @foreach ($appointments as $appointment)
                                  <tr data-entry-id="{{ $appointment->id }}">
                                      @can('appointment_delete')
                                          <td></td>
                                      @endcan

                                      <td>{{ $appointment->client->name or '' }}</td>
                                      --}}{{--{{ isset($appointment->client) ? $appointment->client->name : '' }}--}}{{--
                                      <td>{{ isset($appointment->client) ? $appointment->client->phone : '' }}</td>
                                      <td>{{ isset($appointment->client) ? $appointment->client->email : '' }}</td>
                                      <td>{{ $appointment->employee->first_name or '' }}</td>
                                      <td>{{ isset($appointment->employee) ? $appointment->employee->last_name : '' }}</td>
                                      <td>{{ Carbon\Carbon::parse($appointment->start_time)->format('d/m/Y H:i') }} </td>
                                      <td>{{ Carbon\Carbon::parse($appointment->finish_time)->format('d/m/Y H:i')}}</td>
                                      <td>{!! $appointment->comments !!}</td>

                                      <td>

                                          <a href="{{ route('appointments.show',[$appointment->id]) }}"
                                             class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>

                                          <a href="{{ route('appointments.edit',[$appointment->id]) }}"
                                             class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>

                                          {!! Form::open(array(
                                              'style' => 'display: inline-block;',
                                              'method' => 'DELETE',
                                              'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                              'route' => ['appointments.destroy', $appointment->id])) !!}
                                          {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                          {!! Form::close() !!}

                                      </td>
                                  </tr>
                              @endforeach
                          @else
                              <tr>
                                  <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                              </tr>
                          @endif
                          </tbody>
                      </table>
                  </div>--}}

                <section class="content">

                    <!-- Default box -->
                    @if (count($em) > 0)
                        <div class="box">
                            <table class="table text-center table-responsive" id="table">
                                <div class="box-header with-border">
                                    EM SERVICE
                                </div>
                                <thead>
                                <tr class="red">

                                    <th style="width: 10px">#</th>
                                    <th style="width: 100px">Name</th>
                                    <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                    <th tyle="width: 200px">Email</th>
                                    <?php } ?>

                                    <th style="width: 100px">Date</th>
                                    <th style="width: 100px">Employee Assign</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 300px">Location</th>

                                    <th style="width: 200px">Service</th>
                                    <th style="width: 150px">Actions</th>

                                </tr>
                                </thead>
                                <div class="box-body">
                                    <tbody>
                                    @foreach ($em as $key => $data)
                                        @if($data->status != "completed")
                                        <tr>


                                            <td style="width: 100px">{{ $key + 1 }}</td>
                                            <td style="width: 100px">{{ $data->user->name}}</th>
                                            <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                            <td style="width: 200px">{{ $data->email}}</td>
                                            <?php } ?>

                                            <td style="width: 100px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                            @if(\Illuminate\Support\Facades\Auth::id() == 2)
                                                <td style="width: 100px">   {{ isset($data->employee) ? $data->employee->employee_Name : "" }} </td>
                                                <td style="width: 100px">   {{$data->status}} </td>
                                            @endif

                                            <td style="width: 200px">{{$data->location}}</td>

                                            <td style="width: 150px">EM Service</td>
                                            <td>
                                                <a href="{{url("/es/edit/{$data->id}")}}" class="btn btn-xs btn-primary">Edit</a>
                                                <a href="{{url("/es/{$data->id}")}}" class="btn btn-xs btn-primary">View</a>
                                                <a href="{{url("/es/delete/{$data->id}")}}" class="btn btn-xs btn-primary " id="delete" name="_method" onclick="return confirm('Are you sure to delete this ?')">Delete</a>
                                                <a href="{{url("/es/cancel/{$data->id}")}}" class="btn btn-xs btn-primary">Cancel</a>
                                            </td>

                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </div>

                            </table>

                            <!-- /.box-body -->
                        </div>
                    @endif

                    @if (count($pel) > 0)
                        <div class="box">
                            <table class="table text-center table-responsive" id="table4">
                                <div class="box-header with-border">
                                    PEL SERVICE
                                </div>
                                <thead>
                                <tr class="red">

                                    <th style="width: 10px">#</th>
                                    <th style="width: 100px">Name</th>
                                    <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                    <th tyle="width: 200px">Email</th>
                                    <?php } ?>

                                    <th style="width: 100px">Date</th>
                                    <th style="width: 100px">Employee Assign</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 300px">Location</th>

                                    <th style="width: 200px">Service</th>
                                    <th style="width: 150px">Actions</th>

                                </tr>
                                </thead>
                                <div class="box-body">
                                    <tbody>
                                    @foreach ($pel as $key => $data)
                                        @if($data->status != "completed")
                                            <tr>


                                                <td style="width: 100px">{{ $key + 1 }}</td>
                                                <td style="width: 100px">{{ $data->user->name}}</th>
                                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                                <td style="width: 200px">{{ $data->email}}</td>
                                                <?php } ?>

                                                <td style="width: 100px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                                @if(\Illuminate\Support\Facades\Auth::id() == 2)
                                                    <td style="width: 100px">   {{ isset($data->employee) ? $data->employee->employee_Name : "" }} </td>
                                                    <td style="width: 100px">   {{$data->status}} </td>
                                                @endif

                                                <td style="width: 200px">{{$data->location}}</td>

                                                <td style="width: 150px">PEL Service</td>
                                                <td>
                                                    <a href="{{url("/pel/edit/{$data->id}")}}" class="btn btn-xs btn-primary">Edit</a>
                                                    <a href="{{url("/pel/{$data->id}")}}" class="btn btn-xs btn-primary">View</a>
                                                    <a href="{{url("/pel/delete/{$data->id}")}}" class="btn btn-xs btn-primary " id="delete" name="_method" onclick="return confirm('Are you sure to delete this ?')">Delete</a>
                                                    <a href="{{url("/pel/cancel/{$data->id}")}}" class="btn btn-xs btn-primary">Cancel</a>
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </div>

                            </table>

                            <!-- /.box-body -->
                        </div>
                    @endif

                    @if (count($cement) > 0)

                        <div class="box">
                            <table class="table text-center table-responsive" id="table2">
                                <div class="box-header with-border">
                                    Cement SERVICE
                                </div>
                                <thead>
                                <tr class="red">
                                    <th style="width: 80px">#</th>

                                    <th style="width: 100px">Name</th>
                                    <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                    <th style="width: 200px">Email</th>
                                    <?php } ?>
                                    <th style="width: 100px">Date</th>
                                    <th style="width: 100px">Employee Assign</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 100px">markings</th>
                                    <th style="width: 150px">Location</th>
                                    <th style="width: 100px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div class="box-body">
                                    @foreach ($cement as $key => $data)
                                        @if($data->status != "completed")
                                        <tr>

                                            <td style="width: 80px">{{ $key + 1 }}</td>
                                            <td style="width: 100px">{{ $data->user->name}}</th>
                                            <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                            <td style="width: 200px">{{ $data->email}}</td>
                                            <?php } ?>

                                            <td style="width: 100px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                            @if(\Illuminate\Support\Facades\Auth::id() == 2)
                                                <td style="width: 100px">   {{ isset($data->employee) ? $data->employee->employee_Name : "" }} </td>
                                                    <td style="width: 100px">   {{$data->status}} </td>
                                                @endif

                                            <td style="width: 100px">{{ $data->making}}</td>
                                            <td style="width: 150px">{{$data->location }}</td>
                                            {{--      <td>GPS Service</td>
                  --}}
                                            <td style="width: 100px">
                                                <a href="{{url("/cement/cancel/{$data['id']}")}}" class="btn btn-xs btn-primary">Cancel</a>
                                                <a href="{{url("/cement/edit/{$data['id']}")}}" class="btn btn-xs btn-primary">Edit</a>
                                                <a href="{{url("/cement/delete/{$data->id}")}}" class="btn btn-xs btn-primary " id="delete" name="_method" onclick="return confirm('Are you sure to delete this ?')">Delete</a>
                                                <a href="{{url("/cement/{$data['id']}")}}" class="btn btn-xs btn-primary">View</a>
                                            </td>

                                        </tr>
                                        @endif
                                    @endforeach
                                </div>
                                </tbody>
                            </table>

                            <!-- /.box-body -->
                        </div>
                    @endif

                    @if (count($gpr) > 0)

                        <div class="box">
                            <table class="table text-center table-responsive" id="table3">
                                <div class="box-header with-border">
                                    GPR SERVICE
                                </div>
                                <thead>
                                <tr class="red">
                                    <th style="width: 20px">#</th>
                                    <th style="width: 100px">Name</th>
                                    <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                    <th style="width: 200px">Email</th>
                                    <?php } ?>
                                    <th style="width: 100px">Date</th>
                                    <th style="width: 100px">Employee Assign</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 100px">markings</th>
                                    <th style="width: 150px">Location</th>
                                    <th style="width: 100px">Actions</th>
                                </tr>
                                </thead>

                                <div class="box-body">
                                    <tbody>

                                    @foreach ($gpr as $key => $data)
                                        @if($data->status != "completed")
                                        <tr>

                                            <td style="width: 80px">{{ $key + 1 }}</td>
                                            <td style="width: 100px">{{ $data->user->name}}</th>
                                            <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                            <td style="width: 200px">{{ $data->email}}</td>
                                            <?php } ?>

                                            <td style="width: 100px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                            @if(\Illuminate\Support\Facades\Auth::id() == 2)
                                                <td style="width: 100px">   {{ isset($data->employee) ? $data->employee->employee_Name : "" }} </td>
                                                    <td style="width: 100px">   {{$data->status}} </td>
                                            @endif
                                            <td style="width: 100px">{{ $data->marking }}</td>
                                            <td style="width: 150px">{{ $data->location }}</td>


                                            <td style="width: 100px">
                                                <a href="{{url("/gpr/cancel/{$data['id']}")}}" class="btn btn-xs btn-primary">Cancel</a>
                                                <a href="{{url("/gpr/edit/{$data['id']}")}}" class="btn btn-xs btn-primary">Edit</a>
                                                <a href="{{url("/gpr/delete/{$data->id}")}}" class="btn btn-xs btn-primary " id="delete" name="_method" onclick="return confirm('Are you sure to delete this ?')">Delete</a>
                                                <a href="{{url("/gpr/{$data['id']}")}}" class="btn btn-xs btn-primary">View</a></td>

                                        </tr>
                                        @endif
                                    @endforeach

                                    </tbody>
                                </div>

                            </table>

                            <!-- /.box-body -->
                        </div>
                    @endif

                    @if(count($em) == 0  && count($cement) == 0 && count($gpr) == 0   )

                        <p>    NO RESULT FOUND  </p>

                @endif


                <!-- /.box -->

                </section>

            </div>
        </div>

        <!-- /.box -->

    </section>
@stop

@section('javascript')

    <script src="{{ asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js') }}"></script>

  {{--  <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });


            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();


                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });


                return false;
            });
        });
    </script>--}}
  <script>
   /*   $("#delete").on("click", function(){
          return alert("Are you sure?");
      });*/
      $(document).ready(function() {
          $('#table').DataTable();
      });
   $(document).ready(function() {
       $('#table4').DataTable();
   });
      $(document).ready(function() {
          $('#table1').DataTable();
      });
      $(document).ready(function() {
          $('#table2').DataTable();
      });
   $(document).ready(function() {
       $('#table3').DataTable();
   });
  </script>

    <script>


        @can('appointment_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.appointments.mass_destroy') }}';
        @endcan

    </script>
    <script>
        $(document).ready(function () {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                defaultView: 'agendaWeek',
                events: [
                        @foreach($em as $appointment)
                        @if ($appointment->date)
                    {

                        title: '{{ $appointment->name." ".$appointment->email }}',
                        @if ($appointment->starttime)
                        start: '{{ $appointment->starttime }}',
                        @else
                        start: '{{ $appointment->date }}',
                        @endif
                                @if ($appointment->endtime)
                        end: '{{ $appointment->endtime }}',
                        @else
                        end: '{{ $appointment->date }}',
                        @endif
                        url: '{{ url('/es/edit', $appointment->id) }}'
                    },
                        @endif
                        @endforeach
                        @foreach($pel as $appointment)
                        @if ($appointment->date)
                    {

                        title: '{{ $appointment->name." ".$appointment->email }}',
                        @if ($appointment->starttime)
                        start: '{{ $appointment->starttime }}',
                        @else
                        start: '{{ $appointment->date }}',
                        @endif
                                @if ($appointment->endtime)
                        end: '{{ $appointment->endtime }}',
                        @else
                        end: '{{ $appointment->date }}',
                        @endif
                        url: '{{ url('/pel/edit', $appointment->id) }}'
                    },
                        @endif
                        @endforeach


                        @foreach($gpr as $appointment)
                        @if ($appointment->delivery_date)
                    {
                        title: '{{ $appointment->name." ".$appointment->email }}',
                        @if ($appointment->starttime)
                        start: '{{ $appointment->starttime }}',
                        @else
                        start: '{{ $appointment->delivery_date }}',
                        @endif
                                @if ($appointment->endtime)
                        end: '{{ $appointment->endtime }}',
                        @else
                        end: '{{ $appointment->delivery_date }}',
                        @endif
                        url: '{{ url('/gpr/edit', $appointment->id) }}'
                    },
                        @endif
                        @endforeach
                        @foreach($cement as $appointment)
                        @if ($appointment->delivery_date)
                    {
                        title: '{{ $appointment->name." ".$appointment->email }}',
                        @if ($appointment->starttime)
                        start: '{{ $appointment->starttime }}',
                        @else
                        start: '{{ $appointment->delivery_date }}',
                        @endif
                                @if ($appointment->endtime)
                        end: '{{ $appointment->endtime }}',
                        @else
                        end: '{{ $appointment->delivery_date }}',
                        @endif

                        url: '{{ url('/cement/edit', $appointment->id) }}'
                    },
                    @endif
                    @endforeach

                ]
            })
        });

    </script>
@endsection