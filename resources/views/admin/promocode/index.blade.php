@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            View Promocode
            <!--small>it all starts here</small-->
        </h1>
    </section>



    <section class="content">

        {{--{{print_r($docs)}}--}}

        @if(empty($promocodes))
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
                        <th>Code</th>
                        <th>Amount</th>
                        <th> Type </th>
                        <th>Status</th>
                        <th> Action </th>
                    </tr>
                    <div class="box-body">
                        @foreach ($promocodes as  $index => $data)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{  $data->code}}</td>
                                <td>$ {{ $data->amount}}</td>
                                @if($data->type==1)
                                    <td>Amount</td>
                                @else
                                    <td>Percentage</td>
                                @endif
                                @if($data->status==1)
                                    <td> Active </td>
                                @else
                                    <td> In Active </td>
                                @endif
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('promocode.edit',$data->id) }}"><i class="lnr lnr-pencil"></i> Edit</a>

                                    <form method="POST" action="{{ route('promocode.destroy', $data->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
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
