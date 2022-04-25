@extends('layouts.main')

@section('content')


    <section class="invoice content">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    BullsEye
                    <small class="pull-right"> <strong>Date:  {{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }} {{-- {{$user->updated_at}}--}} </strong> </small><small class="pull-right"></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>

        <div class="invoice-wrapper">

            <div class="row">
                <div class="col-xs-6 no-padding">
                    <div class="top-gape">
                        <address>

                            <strong>  To: {{$user->name }} </strong> <br>
                            <strong>   Email: {{ $user->email }} </strong><br>
                            <strong> Locaton: {{  $service->billing_location." ".$service->country }} </strong>
                        </address>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="invoice-title col-xs-12">
                        <h3 class="pull-right">Order #{{ rand ( 10000 , 99999 )  }}

                        </h3>
                    </div>
                    <div class="col-xs-12 pull-right text-right">
                        <address>
                            <strong>Order Date:  {{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</strong>
                            <br><br>
                        </address>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-sm-6 invoice-col no-padding">
                    <strong> From  : BullsEye </strong>
                    <address>
                        <strong>Address :</strong>

                        795 Folsom Ave, Suite 600
                        San Francisco, CA 94107<br>

                    </address>
                </div>
                <div class="col-sm-6 invoice-col text-right pull-right">
                    Phone: (804) 123-5432<br>
                    Email: admin@bllseye.com

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 no-padding">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <td>   <strong>Qty</strong>   </td>

                                        <td><strong>Product</strong></td>
                                        <td><strong>Price</strong></td>
                                        <td><strong>Location </strong></td>
                                        <td><strong>Serial #</strong></td>
                                        <td><strong>Sub Total</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <tr>
                                        <td>   1  </td>
                                        <td>   <?=str_replace('_', ' ', $invoice->service_title)?> </td>

                                        <td>$ {{$invoice->price}}</td>
                                        <td> {{ $service->location." ".$service->country }}</td>
                                        <td>  {{$invoice->id}}  </td>
                                        <td>$ {{$invoice->price}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-xs-12 no-padding">

                    <!-- this row will not appear when printing -->
                    <div class=" no-print ">
                        <div class="col-xs-12   no-padding ">
                            <a href="javascript:window.print()" target="_blank" class="btn btn-default" title="Print Invoice"> <i class="fa fa-print"></i> Print</a>
                            @if($invoice->payment_status='pending')
                                <form action="/paypal/express-checkout" method="post" id="paypal" style="">
                                    {{ Form::token() }}
                                    <input type="hidden" name="name" value="{{$invoice->service_title}}">
                                    <input type="hidden" name="recurring_name" value="recurringname">
                                    <input type="hidden" name="price"  value="{{$invoice->price}}">
                                    <input type="hidden" name="project_id"  value=" {{$invoice->service_id}}">
                                    <button type="submit" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                                    </button>

                                </form>
                       @endif

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>





@endsection
