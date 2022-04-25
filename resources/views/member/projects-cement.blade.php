@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            Projects
            <!--small>it all starts here</small-->
        </h1>
    </section>



    <section class="content">

        <!-- Default box -->
        <div class="box">
            <table class="table text-center" id="table">
                <div class="box-header with-border">
                    Cement Service
                </div>
                <tr class="red">
                    <th>#</th>
                    <th> Name </th>
                    <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                    <td>Email</td>
                    <?php } ?>
                    <th>Date</th>

                    <th>Location</th>
                    <th>Service</th>
                    <th>Actions</th>
                </tr>
                <div class="box-body">
                    @foreach ($projects as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->user->name}}</td>
                            <?php if(\Illuminate\Support\Facades\Auth::id() == 2){ ?>
                            <td>{{ $data->email}}</td>
                            <?php } ?>
                            <td>{{ $data->delivery_date}}</td>
                            <td>{{ $data->location}}</td>
                            <td>Cement Service</td>


                            <td><a href="{{url("/cement/{$data['id']}")}}" class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                    @endforeach
                </div>

            </table>
            <div class="text-center">{{ $projects->links() }}</div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
@endsection
