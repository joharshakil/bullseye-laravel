@extends('layouts.main')

@section('content')
    
    <!-- Content Wrapper. Contains page content -->
    {{--    <div class="content-wrapper">--}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    @if(Auth::id() == 2)
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $invoiceCount }}</h3>

                            <p>Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="ion  ion-cash"></i>
                        </div>
                        <a href="{{ url('/') }}/invoice" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            {{--    <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $documentServiceCount }}--}}{{--<sup style="font-size: 20px">%</sup>--}}{{--</h3>

                            <p>Documents</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document"></i>
                        </div>
                        <a href="{{ url('/') }}/file/view" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>--}}
            <!-- ./col -->
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>  {{$userCount}} </h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('/')  }}/users" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">


                        <div class="inner ">
                            <h3> {{$emServiceCount}} </h3>
                            <p>EM Services</p>


                        </div>

                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>

                        </div>
                        <a href="{{ url('/')  }}/user_projects" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>



                </div>

                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">


                        <div class="inner">
                            <h3> {{$gprServiceCount}} </h3>
                            <p>GPR Services</p>


                        </div>

                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>

                        </div>
                        <a href="{{ url('/')  }}/gpr_projects" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>


                    </div>



                </div>


                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">


                        <div class="inner ">
                            <h3> {{$cementServiceCount}} </h3>
                            <p>CEMENT Services</p>


                        </div>

                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>

                        </div>
                        <a href="{{ url('/')  }}/cement_projects" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>



                </div>

                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">

                        <div class="inner ">
                            <h3> {{$pelServiceCount}} </h3>
                            <p>PEL Services</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>

                        </div>
                        <a href="{{ url('/')  }}/pel_projects" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="box">
                <table class="table text-center table-responsive" id="table2">
                    <div class="box-header with-border">
                        COMMENTS
                    </div>
                    <thead>
                    <tr class="red">
                        <th style="width: 100px">Comment</th>
                        <th style="width: 100px">User</th>
                        <th style="width: 100px">Project Type</th>
                        <th style="width: 100px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="box-body">
                        @foreach ($comments as $data)
                            <tr>

                                <td style="width: 100px">{{ $data->body }}</td>
                                <td style="width: 100px">{{ $data->user->name}}</th>
                                <td style="width: 100px">
                                    @if($data->em_id)
                                        EM Service
                                    @endif
                                    @if($data->gpr_id)
                                        GPR Service
                                    @endif
                                    @if($data->cement_id)
                                        Cement Service
                                    @endif
                                    @if($data->pel_id)
                                        Pel Service
                                    @endif
                                </td>
                                @if($data->em_id)
                                    <td style="width: 100px">
                                        <a href="{{url("/es/".$data->em_id)}}" class="btn btn-xs btn-primary">Reply</a>
                                    </td>
                                @endif
                                @if($data->gpr_id)
                                    <td style="width: 100px">
                                        <a href="{{url("/gpr/".$data->gpr_id)}}" class="btn btn-xs btn-primary">Reply</a>
                                    </td>
                                @endif
                                @if($data->cement_id)
                                    <td style="width: 100px">
                                        <a href="{{url("/cement/".$data->cement_id)}}" class="btn btn-xs btn-primary">Reply</a>
                                    </td>
                                @endif
                                @if($data->pel_id)
                                    <td style="width: 100px">
                                        <a href="{{url("/pel/".$data->pel_id)}}" class="btn btn-xs btn-primary">Reply</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </div>
                    </tbody>
                </table>

                <!-- /.box-body -->
            </div>

            <div id='calendar'></div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                {{-- <div class="nav-tabs-custom">
                     <!-- Tabs within a box -->
                     <ul class="nav nav-tabs pull-right">
                         <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                         <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                         <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                     </ul>
                     <div class="tab-content no-padding">
                         <!-- Morris chart - Sales -->
                         <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                         <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                     </div>
                 </div>--}}
                <!-- /.nav-tabs-custom -->

                    <!-- Chat box -->
                {{--   <div class="box box-success">
                       <div class="box-header">
                           <i class="fa fa-comments-o"></i>

                           <h3 class="box-title">Chat</h3>

                           <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                               <div class="btn-group" data-toggle="btn-toggle">
                                   <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                                   </button>
                                   <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                               </div>
                           </div>
                       </div>
                       <div class="box-body chat" id="chat-box">
                           <!-- chat item -->
                           <div class="item">
                               <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

                               <p class="message">
                                   <a href="#" class="name">
                                       <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                       Mike Doe
                                   </a>
                                   I would like to meet you to discuss the latest news about
                                   the arrival of the new theme. They say it is going to be one the
                                   best themes on the market
                               </p>
                               <div class="attachment">
                                   <h4>Attachments:</h4>

                                   <p class="filename">
                                       Theme-thumbnail-image.jpg
                                   </p>

                                   <div class="pull-right">
                                       <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                                   </div>
                               </div>
                               <!-- /.attachment -->
                           </div>
                           <!-- /.item -->
                           <!-- chat item -->
                           <div class="item">
                               <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                               <p class="message">
                                   <a href="#" class="name">
                                       <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                       Alexander Pierce
                                   </a>
                                   I would like to meet you to discuss the latest news about
                                   the arrival of the new theme. They say it is going to be one the
                                   best themes on the market
                               </p>
                           </div>
                           <!-- /.item -->
                           <!-- chat item -->
                           <div class="item">
                               <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                               <p class="message">
                                   <a href="#" class="name">
                                       <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                                       Susan Doe
                                   </a>
                                   I would like to meet you to discuss the latest news about
                                   the arrival of the new theme. They say it is going to be one the
                                   best themes on the market
                               </p>
                           </div>
                           <!-- /.item -->
                       </div>
                       <!-- /.chat -->
                       <div class="box-footer">
                           <div class="input-group">
                               <input class="form-control" placeholder="Type message...">

                               <div class="input-group-btn">
                                   <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                               </div>
                           </div>
                       </div>
                   </div>--}}
                <!-- /.box (chat box) -->

                    <!-- TO DO List -->

                    <!-- /.box -->

                    <!-- quick email widget -->
                    {{--  <div class="box box-info">
                          <div class="box-header">
                              <i class="fa fa-envelope"></i>

                              <h3 class="box-title">Quick Email</h3>
                              <!-- tools box -->
                              <div class="pull-right box-tools">
                                  <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                          title="Remove">
                                      <i class="fa fa-times"></i></button>
                              </div>
                              <!-- /. tools -->
                          </div>
                          <div class="box-body">
                              <form action="#" method="post">
                                  <div class="form-group">
                                      <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                                  </div>
                                  <div>
                    <textarea class="textarea" placeholder="Message"
                              style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                  </div>
                              </form>
                          </div>
                          <div class="box-footer clearfix">
                              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                                  <i class="fa fa-arrow-circle-right"></i></button>
                          </div>
                      </div>--}}

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    @else
        {{--   </div>--}}
        <!-- /.content-wrapper -->

        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3> {{  $totalServices }}</h3>

                            <p>Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="ion  ion-cash"></i>
                        </div>
                        <a href="{{ url('/') }}/invoice" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            {{-- <div class="col-lg-2 col-xs-6">
                 <!-- small box -->
                 <div class="small-box bg-green">
                     <div class="inner">
                         <h3>{{ $totalDocument}}</h3>

                         <p>Documents</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-document"></i>
                     </div>
                     <a href="{{ url('/') }}/file/view" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                 </div>
             </div>--}}
            <!-- ./col -->


                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">


                        <div class="inner ">
                            <h3> {{  $totalServices }} </h3>
                            <p>Services</p>


                        </div>

                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>

                        </div>
                        <a href="{{ url('/')  }}/user_projects" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>



                </div>


                <div class="col-lg-2 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>  {{$totalServices}} </h3>

                            <p>Projects</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('/')  }}/user_projects" class="small-box-footer" target="-blank">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>





                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                {{-- <div class="nav-tabs-custom">
                     <!-- Tabs within a box -->
                     <ul class="nav nav-tabs pull-right">
                         <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                         <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                         <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                     </ul>
                     <div class="tab-content no-padding">
                         <!-- Morris chart - Sales -->
                         <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                         <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                     </div>
                 </div>--}}
                <!-- /.nav-tabs-custom -->

                    <!-- Chat box -->
                {{--   <div class="box box-success">
                       <div class="box-header">
                           <i class="fa fa-comments-o"></i>

                           <h3 class="box-title">Chat</h3>

                           <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                               <div class="btn-group" data-toggle="btn-toggle">
                                   <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                                   </button>
                                   <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                               </div>
                           </div>
                       </div>
                       <div class="box-body chat" id="chat-box">
                           <!-- chat item -->
                           <div class="item">
                               <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

                               <p class="message">
                                   <a href="#" class="name">
                                       <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                                       Mike Doe
                                   </a>
                                   I would like to meet you to discuss the latest news about
                                   the arrival of the new theme. They say it is going to be one the
                                   best themes on the market
                               </p>
                               <div class="attachment">
                                   <h4>Attachments:</h4>

                                   <p class="filename">
                                       Theme-thumbnail-image.jpg
                                   </p>

                                   <div class="pull-right">
                                       <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                                   </div>
                               </div>
                               <!-- /.attachment -->
                           </div>
                           <!-- /.item -->
                           <!-- chat item -->
                           <div class="item">
                               <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                               <p class="message">
                                   <a href="#" class="name">
                                       <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                                       Alexander Pierce
                                   </a>
                                   I would like to meet you to discuss the latest news about
                                   the arrival of the new theme. They say it is going to be one the
                                   best themes on the market
                               </p>
                           </div>
                           <!-- /.item -->
                           <!-- chat item -->
                           <div class="item">
                               <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                               <p class="message">
                                   <a href="#" class="name">
                                       <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                                       Susan Doe
                                   </a>
                                   I would like to meet you to discuss the latest news about
                                   the arrival of the new theme. They say it is going to be one the
                                   best themes on the market
                               </p>
                           </div>
                           <!-- /.item -->
                       </div>
                       <!-- /.chat -->
                       <div class="box-footer">
                           <div class="input-group">
                               <input class="form-control" placeholder="Type message...">

                               <div class="input-group-btn">
                                   <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                               </div>
                           </div>
                       </div>
                   </div>--}}
                <!-- /.box (chat box) -->

                    <!-- TO DO List -->

                    <!-- /.box -->

                    <!-- quick email widget -->
                    {{--  <div class="box box-info">
                          <div class="box-header">
                              <i class="fa fa-envelope"></i>

                              <h3 class="box-title">Quick Email</h3>
                              <!-- tools box -->
                              <div class="pull-right box-tools">
                                  <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                                          title="Remove">
                                      <i class="fa fa-times"></i></button>
                              </div>
                              <!-- /. tools -->
                          </div>
                          <div class="box-body">
                              <form action="#" method="post">
                                  <div class="form-group">
                                      <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                                  </div>
                                  <div>
                    <textarea class="textarea" placeholder="Message"
                              style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                  </div>
                              </form>
                          </div>
                          <div class="box-footer clearfix">
                              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                                  <i class="fa fa-arrow-circle-right"></i></button>
                          </div>
                      </div>--}}

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>

    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 admin-dashborad" style="display: flex; justify-content: center; align-items: center; min-height: 420px;flex-direction: column; text-align: center;">



                <div class="col-md-10">

                    {{--  <a href="http://74.208.216.232:8029/">  <img style=" margin-bottom: 31px;" src="{{asset('logo.png')}}" alt=""> </a>
      --}}
                </div>

                <div class="panel panel-default">
                    {{--  <div class="panel-heading">Dashboard</div>--}}
                    <?php if(isset($code)){?>
                    <div class="alert alert-{{$code}}">
                        <strong>{{$code}}!</strong> {{$message}}
                    </div>
                    <?php } ?>
                    {{--   <div class="panel-body">
                           @if (session('status'))
                               <div class="alert alert-success">
                                   {{ session('status') }}
                               </div>
                           @endif

                       --}}{{--   Thank you for choosing BullsEye Locating Services--}}{{--

                       </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function () {
            var now = new Date();
            now.setTime(now.getTime() + 1 * 3600 * 1000);
            // SET Cookie
            document.cookie = "login_username={{ucwords(Auth::User()->name)}}; expires=" + now.toUTCString() + "; path=/;domain=.bullseyelocating.com";
        });
    </script>

    @if(Auth::id() == 2)
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
                });
            });
        </script>
    @endif
@endsection