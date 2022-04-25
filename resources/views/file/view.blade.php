@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            Documents
            <!--small>it all starts here</small-->
        </h1>
    </section>

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
                        <th style="width: 200px">Name</th>

                        <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                        <th style="width: 200px">Email   </th>
                        <?php } ?>

                        <th style="width: 100px">Date</th>
                        @if(\Illuminate\Support\Facades\Auth::id() == 2)
                            <th style="width: 100px">Status</th>
                        @endif
                        <th style="width: 200px">Service</th>
                        <th style="width: 200px">File</th>


                    </tr>
                    </thead>
                    <div class="box-body">
                        <tbody>
                        @foreach ($em as $key => $data)

                            <tr>
                                <td style="width: 100px">{{ $key + 1 }}</td>
                                <td style="width: 200px">{{ $data->user->name}}</td>
                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                <td style="width: 200px">{{ $data->email}}</td>
                                <?php } ?>

                                <td style="width: 100px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                @if(\Illuminate\Support\Facades\Auth::id() == 2)

                                    <td style="width: 100px">   {{$data->status}} </td>
                                @endif



                                <td style="width: 150px">EM Service</td>

                                <td class="anchor-show">
                                    @if(isset($data->filename))

                                        <a target="_blank" href=" {{asset( 'storage/'.$data->filename)}}">{{ substr($data->filename, 0, 15) . ' ' }}</a>
                                    @endif
                                </td>


                            </tr>

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
                        <th style="width: 200px">Name</th>

                        <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                        <th style="width: 200px">Email   </th>
                        <?php } ?>

                        <th style="width: 100px">Date</th>
                        @if(\Illuminate\Support\Facades\Auth::id() == 2)
                            <th style="width: 100px">Status</th>
                        @endif
                        <th style="width: 200px">Service</th>
                        <th style="width: 200px">File</th>


                    </tr>
                    </thead>
                    <div class="box-body">
                        <tbody>
                        @foreach ($pel as $key => $data)

                            <tr>
                                <td style="width: 100px">{{ $key + 1 }}</td>
                                <td style="width: 200px">{{ $data->user->name}}</td>
                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                <td style="width: 200px">{{ $data->email}}</td>
                                <?php } ?>

                                <td style="width: 100px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                @if(\Illuminate\Support\Facades\Auth::id() == 2)

                                    <td style="width: 100px">   {{$data->status}} </td>
                                @endif



                                <td style="width: 150px">PEL Service</td>

                                <td class="anchor-show">
                                    @if(isset($data->filename))
                                        <a target="_blank" href=" {{asset( 'storage/'.$data->filename)}}">{{ substr($data->filename, 0, 15) . ' ' }}</a>
                                    @endif
                                </td>


                            </tr>

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

                        <th style="width: 150px">Name</th>
                        <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                        <th style="width: 200px">Email</th>
                        <?php } ?>
                        <th style="width: 100px">Date</th>
                        @if(\Illuminate\Support\Facades\Auth::id() == 2)
                            <th style="width: 100px">Status</th>
                        @endif
                        <th style="width: 100px"> Service</th>
                        <th style="width: 100px">File</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="box-body">
                        @foreach ($cement as $key => $data)

                            <tr>

                                <td style="width: 80px">{{ $key + 1 }}</td>
                                <td style="width: 150px">{{ $data->user->name}}</th>
                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                <td style="width: 200px">{{ $data->email}}</td>
                                <?php } ?>

                                <td style="width: 100px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                @if(\Illuminate\Support\Facades\Auth::id() == 2)

                                    <td style="width: 100px">   {{$data->status}} </td>
                                @endif
                                <td style="width: 100px">  Cement Service </td>

                                <td style="width: 100px">
                                    @if(isset($data->filename))

                                        <a target="_blank" href=" {{asset( 'storage/'.$data->filename)}}">{{ substr($data->filename, 0, 15) . ' ' }}</a>
                                    @endif
                                </td>

                            </tr>

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
                        <th style="width: 80px">#</th>
                        <th style="width: 150px">Name</th>
                        <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                        <th style="width: 200px">Email</th>
                        <?php } ?>
                        <th style="width: 200px">Date</th>
                        @if(\Illuminate\Support\Facades\Auth::id() == 2)
                            <th style="width: 100px">Status</th>
                        @endif
                        <th style="width: 150px">Service</th>
                        <th style="width: 100px">File</th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="box-body">
                        @foreach ($gpr as $key => $data)

                            <tr>

                                <td style="width: 80px">{{ $key + 1 }}</td>
                                <td style="width: 150px">{{ $data->user->name}}</th>
                                <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                                <td style="width: 200px">{{ $data->email}}</td>
                                <?php } ?>

                                <td style="width: 100px"> {{ Carbon\Carbon::parse($data->date)->format('d/m/Y') }}  </td>
                                @if(\Illuminate\Support\Facades\Auth::id() == 2)

                                    <td style="width: 100px">   {{$data->status}} </td>
                                @endif

                                <td style="width: 100px">   GPR Service </td>

                                <td style="width: 100px">
                                    @if(isset($data->filename))

                                        <a target="_blank" href=" {{asset( 'storage/'.$data->filename)}}">{{ substr($data->filename, 0, 15) . ' ' }}</a>
                                    @endif
                                </td>

                            </tr>

                        @endforeach
                    </div>
                    </tbody>
                </table>

                <!-- /.box-body -->
            </div>
        @endif

        @if(count($em) == 0  && count($cement) == 0 && count($gpr) == 0  )

            <p>    NO RESULT FOUND  </p>

    @endif


    <!-- /.box -->

    </section>



@endsection
