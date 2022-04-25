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
                    EM SERVICE
                </div>
                <tr class="red">
                    <th>#</th>
                    <th>Name</th>
                    <td>Email</td>
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
                            <td>{{ $data->email}}</td>
                            <td>{{ Carbon\Carbon::parse($data->date)->format('d/m/Y ') }} </td>
                            <td>{{  $data['location']. $data['country'] }}</td>
                            <td>EM Service</td>


                            <td><a href="{{url("/es/{$data['id']}")}}" class="btn btn-primary btn-sm">View</a></td>
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
