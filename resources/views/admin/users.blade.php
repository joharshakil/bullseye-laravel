@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
           Users
            <!--small>it all starts here</small-->
        </h1>
    </section>



<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">

        </div>
        <table class="table text-center" id="table">

            <thead>
            <tr class="red">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>created date</th>
                {{--<th>Actions</th>--}}
            </tr>
            </thead>
            <tbody>


                @foreach ($users as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data['name'] }}</td>

                        <td>{{ $data['email'] }}</td>
                        <td>  {{ Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i') }}   </td>

                        {{--<td><a href="{{url("/es/{$data['id']}")}}" class="btn btn-primary btn-sm">View</a> </td>--}}
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{--<div class="text-center">{{ $users->links() }}</div>--}}
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
@endsection


@section('scripts')

    <script>
    $('#table').DataTable();
    </script>

@endsection