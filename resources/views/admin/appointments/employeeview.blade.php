@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            View Employee
            <!--small>it all starts here</small-->
        </h1>
    </section>



    <section class="content">

        {{--{{print_r($docs)}}--}}

        @if(empty($employee))
            {{--      @if(empty($docs))   --}}
            <div class="count-plus">
                <p>    NO RESULT FOUND  </p>
            </div>
        @else

        <!-- Default box -->
            <div class="box">
                <table class="table text-center" id="table">

                    <tr class="red">
                        <th>#</th>
                        <th>Title</th>
                        <th>Overview</th>
                        <th>Employee Phone</th>
                        <th> Action </th>
                    </tr>
                    <div class="box-body">
                        @foreach ($employee as  $index => $data)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{   $data->employee_Name}}</td>
                                <td>{{ $data->job_type}}</td>
                                <td>{{ $data->phone_number}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('showemployee',$data->id) }}"><i class="lnr lnr-pencil"></i> Edit</a>
                                    <form method="post" action="{{ route('delete_employ', $data->id )}}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this ?')"><i class="lnr lnr-pencil"></i> Delete </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </div>

                </table>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif
    </section>
@endsection
