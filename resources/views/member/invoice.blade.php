@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            Invoices
            <!--small>it all starts here</small-->
        </h1>
    </section>



    <section class="content">



        @if(empty($invoices))
            <div class="count-plus">
                <p>    NO RESULT FOUND  </p>
            </div>
        @else


        <!-- Default box -->
            <div class="box">
                <table class="table text-center" id="table">
                    <div class="box-header with-border">

                    </div>
                    <tr class="red">
                        <th>#</th>
                        <th>Company Name </th>
                        <th>Service Name</th>
                        <th>Project Address </th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>

                    <div class="box-body">
                        @foreach ($invoices as $key => $data)


                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if(isset($data['company_name']))
                                        {{ $data['company_name'] }}
                                    @endif
                                </td>
                                <td><?=str_replace('_', ' ', $data['service_title'])?>  </td>



                                <td>{{ $data['location'] }} </td>

                                <td>$ {{ $data['price'] }}</td>
                                <td>{{ $data['payment_status'] }}</td>


                                <td><a href="{{url("/invoice/{$data['id']}")}}" class="btn btn-primary btn-sm">View</a></td>
                            </tr>


                        @endforeach
                    </div>

                </table>
            {{--<div class="text-center">{{ $projects->links() }}</div>--}}
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif
    </section>
@endsection
