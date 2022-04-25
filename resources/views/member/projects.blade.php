@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            Project Details
            <!--small>it all starts here</small-->
        </h1>
    </section>
    <section class="content">

        <!-- Default box -->
        @if (count($em) > 0)
            <div class="box">
                <table class="table text-center" id="table">
                    <div class="box-header with-border">
                        EM SERVICE
                    </div>
                    <thead>
                    <tr class="red">
                        <th style="width: 100px">#</th>
                        <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                        <td>Email</td>
                        <?php } ?>
                        <th style="width: 200px">Date</th>
                        <th style="width: 200px">Status</th>
                        <th style="width: 200px">Schedule Time</th>
                        <th style="width: 300px">Location</th>

                        <th style="width: 200px">Service</th>
                        <th style="width: 150px">Actions</th>
                    </tr>
                    </thead>
                    <div class="box-body">
                        <tbody>
                        @foreach ($em as $key => $data)
                            <tr>
                                <td style="width: 100px">{{ $key + 1 }}</td>

                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                <td style="width: 200px">{{ $data->email}}</td>
                                <?php } ?>
                                <td style="width: 300px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                <td style="width: 150px">{{ $data->status }}</td>
                                <td style="width: 150px">{{ $data['starttime'] }}</td>
                                <td style="width: 200px">{{ $data['location']. $data['country'] }} </td>
                                <td style="width: 150px">EM Service</td>


                                <td>
                                    <a href="{{url("/es/cancel/{$data['id']}")}}" class="btn btn-primary btn-sm">Cancel</a>


                                    <a href="{{url("/es/edit/{$data['id']}")}}" class="btn btn-primary btn-sm">Edit</a>

                                    <a href="{{url("/es/{$data['id']}")}}" class="btn btn-primary btn-sm">View</a>



                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </div>

                </table>
                <div class="text-center">{{ $em->links() }}</div>
                <!-- /.box-body -->
            </div>
        @endif

        @if (count($pel) > 0)
            <div class="box">
                <table class="table text-center" id="table">
                    <div class="box-header with-border">
                        PEL SERVICE
                    </div>
                    <thead>
                    <tr class="red">
                        <th style="width: 100px">#</th>
                        <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                        <td>Email</td>
                        <?php } ?>
                        <th style="width: 200px">Date</th>
                        <th style="width: 200px">Status</th>
                        <th style="width: 200px">Schedule Time</th>
                        <th style="width: 300px">Location</th>
                        <th style="width: 200px">Service</th>
                        <th style="width: 150px">Actions</th>
                    </tr>
                    </thead>
                    <div class="box-body">
                        <tbody>
                        @foreach ($pel as $key => $data)
                            <tr>
                                <td style="width: 100px">{{ $key + 1 }}</td>

                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                <td style="width: 200px">{{ $data->email}}</td>
                                <?php } ?>
                                <td style="width: 300px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                <td style="width: 150px">{{ $data->status }}</td>
                                <td style="width: 150px">{{ $data['starttime'] }}</td>
                                <td style="width: 200px">{{ $data['location']. $data['country'] }} </td>
                                <td style="width: 150px">PEL Service</td>
                                <td>
                                    <a href="{{url("/pel/cancel/{$data['id']}")}}" class="btn btn-primary btn-sm">Cancel</a>


                                    <a href="{{url("/pel/edit/{$data['id']}")}}" class="btn btn-primary btn-sm">Edit</a>

                                    <a href="{{url("/pel/{$data['id']}")}}" class="btn btn-primary btn-sm">View</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </div>

                </table>
                <div class="text-center">{{ $pel->links() }}</div>
                <!-- /.box-body -->
            </div>
        @endif


        @if (count($cement) > 0)

            <div class="box">
                <table class="table text-center" id="table1">
                    <div class="box-header with-border">
                        Cement SERVICE
                    </div>
                    <thead>
                    <tr class="red">
                        <th style="width: 80px">#</th>
                        <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                        <td style="width: 200px">Email</td>
                        <?php } ?>
                        <th style="width: 200px">Date</th>
                        <th style="width: 200px">Status</th>
                        <th style="width: 200px">Schedule Time</th>
                        <th style="width: 200px">markings</th>
                        <th style="width: 150px">Location</th>
                        <th style="width: 100px">Actions</th>
                    </tr>
                    </thead>
                    <div class="box-body">
                        @foreach ($cement as $key => $data)
                            <tr>
                                <td style="width: 80px">{{ $key + 1 }}</td>

                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                <td style="width: 200px">{{ $data->email}}</td>
                                <?php } ?>
                                <td style="width: 200px">{{ Carbon\Carbon::parse($data->delivery_date)->format('d/m/Y') }}  </td>
                                <td style="width: 150px">{{ $data['status'] }}</td>
                                <td style="width: 150px">{{ $data['starttime'] }}</td>
                                <td style="width: 200px">{{ $data['marking'] }}</td>
                                <td style="width: 150px">{{ $data['location']. $data['country'] }}</td>
                                {{--      <td>GPS Service</td>
      --}}
                                <td style="width: 100px">
                                    <a href="{{url("/cement/cancel/{$data['id']}")}}" class="btn btn-primary btn-sm">Cancel</a>
                                    <a href="{{url("/cement/edit/{$data['id']}")}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url("/cement/{$data['id']}")}}" class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </div>

                </table>
                <div class="text-center">{{ $cement->links() }}</div>
                <!-- /.box-body -->
            </div>
        @endif

        @if (count($gpr) > 0)

            <div class="box">
                <table class="table text-center" id="table2">
                    <div class="box-header with-border">
                        GPR SERVICE
                    </div>
                    <thead>
                    <tr class="red">
                        <th style="width: 80px">#</th>
                        <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                        <td style="width: 200px">Email</td>
                        <?php } ?>
                        <th style="width: 200px">Date</th>
                        <th style="width: 200px">Status</th>
                        <th style="width: 200px">Schedule Time</th>
                        <th style="width: 200px">markings</th>
                        <th style="width: 150px">Location</th>
                        <th style="width: 100px">Actions</th>
                    </tr>
                    </thead>
                    <div class="box-body">
                        <tbody>
                        @foreach ($gpr as $key => $data)
                            <tr>
                                <td style="width: 80px">{{ $key + 1 }}</td>

                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                <td style="width: 200px">{{ $data->email}}</td>
                                <?php } ?>
                                <td style="width: 200px">{{ Carbon\Carbon::parse($data->delivery_date)->format('d/m/Y') }}</td>
                                <td style="width: 150px">{{ $data->status }}</td>
                                <td style="width: 150px">{{ $data->starttime}}</td>
                                <td style="width: 150px">{{ $data->marking }}</td>
                                <td style="width: 150px">{{ $data->location}}</td>


                                <td style="width: 100px">
                                    <a href="{{url("/gpr/cancel/{$data['id']}")}}" class="btn btn-primary btn-sm">Cancel</a>
                                    <a href="{{url("/gpr/edit/{$data['id']}")}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url("/gpr/{$data['id']}")}}" class="btn btn-primary btn-sm">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </div>

                </table>
                <div class="text-center">{{ $gpr->links() }}</div>
                <!-- /.box-body -->
            </div>
        @endif

        @if(count($em) == 0  && count($cement) == 0 && count($gpr) == 0   )

            <p>    NO RESULT FOUND  </p>

    @endif


    <!-- /.box -->

    </section>
@endsection

@section('javascript')
<script>
    /*   $("#delete").on("click", function(){
           return alert("Are you sure?");
       });*/
    $(document).ready(function() {
        $('#table').DataTable();
    });

    $(document).ready(function() {
        $('#table1').DataTable();
    });
    $(document).ready(function() {
        $('#table2').DataTable();
    });
</script>
@endsection