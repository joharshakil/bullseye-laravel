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
                    CEMENT SERVICE
                </div>


                <table class="table table-striped">


               {{--         <tr>
                            <th class="red">Billing Address</th>
                            <th>{{$data->billing_location}}</th>
                        </tr>--}}
                    <tr>
                        <th class="red">Job Site Address</th>
                        <th>{{$data->location}}</th>
                    </tr>
                    <tr>
                        <th class="red">Country</th>
                        <th>{{$data->country}}</th>
                    </tr>
                        <tr>
                            <th class="red">price</th>
                            <th>{{$data->price}}</th>
                        </tr>

                        <tr>

                            <th class="red">date</th>
                            <th>{{$data->delivery_date}}</th>
                        </tr>
                        <tr>

                            <th class="red">marking</th>
                            <th>{{$data->marking}}</th>
                        </tr>

                        <tr>

                            <th class="red">Item</th>
                            <th>
                                @foreach($item as $it)
                                {{ $it }}
                            @endforeach
                            </th>
                        </tr>
                    <tr>
                        <th class="red">promocode</th>
                        <?php if($data->promocodechecker == "1"){?>
                        <th>  Applied </th>
                        <?php } else { ?>
                        <th> Not  Applied </th>

                        <?php }  ?>
                    </tr>
                        <tr>

                            <th class="red">Utility</th>
                            <th>  @foreach($utility as $iti)
                                    {{ $iti }}
                                @endforeach</th>
                        </tr>

                    <tr>

                        <th class="red">Located</th>
                        <th>  @foreach($located as $it)
                                {{ $it }}
                            @endforeach</th>
                    </tr>

                        <tr>

                            <th class="red">Report</th>
                            <th>
                                @foreach($report as $repo)
                               {{ $repo }}

                                    @endforeach
                            </th>
                        </tr>

                        <tr>

                            <th class="red">scan</th>
                            <th>{{$data->scan}}</th>

                        </tr>

                        <tr>
                            <th class="red">Newsletter Subscription</th>
                            <th> {{$data->newsletter}}</th>
                        </tr>


                        <tr>
                            <th class="red">slab</th>
                            <th>{{$data->slab}}</th>

                        </tr>

                        <tr>
                            <th class="red">Is fiber</th>
                            <th>{{$data->fiber}}</th>
                        </tr>

                        <tr>
                            <th class="red">condition</th>
                            <th>{{$data->condition}}</th>
                        </tr>
                        <tr>
                            <th class="red">clean</th>
                            <th>{{$data->clean}}</th>
                        </tr>
                        <tr>
                            <th class="red">surface</th>
                            <th>{{$data->surface}}</th>
                        </tr>    <tr>
                            <th class="red">drawings</th>
                            <th>{{$data->drawings}}</th>
                        </tr>  <tr>
                            <th class="red">About Property</th>
                            <th>{{$data->about_property}}</th>
                        </tr>
                        <tr>

                            <th class="red">Image</th>
                            <th>
                                @foreach($datavalue as $image)

                                    <a target="_blank" href="{{Storage::url($image)}}">
                                        <img class="img-bordered img-lg img-thumbnail"
                                             src="{{Storage::url($image)}}"/>

                                    </a>

                                @endforeach
                            </th>
                        </tr>

                        <tr>
                            <th class="red">Payment Status</th>
                            <th>{{ $data->status }}</th>

                        </tr>

                        <tr>
                            <th class="red">message</th>
                            <th>{{$data->message}}</th>
                        </tr>
                        <tr>

                            <th class="red">Created at</th>
                            <th>{{$data->created_at}}</th>


                        </tr>
                    </table>




            </table>

            <!-- /.box-body -->
        </div>


        <div class="form-group">





            <div class="form-group">
                <div class="">


                    <div id="map_canvas" ></div>



                </div>
            </div>

        </div>
        <div class="clearfix"></div>

        <!-- /.box -->
        <div class="box box-widget" style="display: none">
            <div class="box-header with-border">
                @if($data->status != 'paid')
                    <form action="/paypal/express-checkout" method="post">
                        {{ Form::token() }}
                        <input type="hidden" name="name" value="cement_service">
                        <input type="hidden" name="price" value="{{$data->price}}">
                        <input type="hidden" name="project_id" value="{{$data->id}}">
                        <button type="submit" class="custom-paypal-img">PAY NOW<img src="../img/payapa-logo.png"></button>
                    </form>
                @else
                    <a class="btn  btn-dropbox" href="/invoice/{{$invoice->id}}"><i class="fa fa-dollar"></i>
                        Invoice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </a>
                @endif
            </div>
        </div>

        <div class="box box-widget">
            <div class="box-header with-border">
                <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-comment"></i>
                    <?php if(\Illuminate\Support\Facades\Auth::id() == 2) { ?>

                    Talk to Client


               <?php } else { ?>

                    Talk to Locator
                    <?php } ?>

                </button>
                <div class="box-tools">

                    <button type="button" class="btn btn-box-tool">
                        <i class="fa fa-comments"></i>{{$data->comments->count()}} {{ str_plural('comment', $data->comments->count()) }}
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <!-- /.box-header -->


            <!-- /.box-body -->
            <div class="box-footer box-comments" style="">
                @forelse ($em->comments as $comment)
                    <div class="box-comment">
                        <div class="comment-text">
                      <span class="username">
                       {{ $comment->user->name }}
                          <span class="text-muted pull-right">
                               {{$comment->created_at->diffForHumans()}}
                              {{--{{$comment->created_at}}--}}
                          </span>
                      </span>
                            {{ $comment->body }}
                        </div>
                    </div>
                @empty
                    <div class="box-comment">This Project has no comments</div>
                @endforelse


            </div>
            <!-- /.box-footer -->
            <div class="box-footer" style="">
                {{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}

                <div class="col-md-11">
                    {{ Form::text('body', old('body'),array('class'=>'form-control input-sm','placeholder'=>'Press Enter to post comment')) }}
                    {{--<input type="text" class="form-control input-sm" placeholder="Press enter to post comment">--}}
                </div>
                {{ Form::hidden('cement_id', $data->id) }}
                {{ Form::button('Send &nbsp; <i class="fa fa-send"></i>',array('type'=>'submit', 'class'=>'btn-success btn')) }}
                {{ Form::close() }}




            </div>
            <!-- /.box-footer -->
        </div>

        <div class="box box-info collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-plus"></i>
                        Upload Documents
                    </button>


                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">

                <form method="POST" action="{{ route('file.upload') }}" aria-label="{{ __('Upload') }}">
                    {{ csrf_field() }}
                    <div class="form-group row ">
                        <input type="hidden" value="{{$data->id}}" name="cement_project">
                        <input type="hidden" value="document" name="type">
                        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('File Upload') }}</label>
                        <div class="col-md-6">
                            <div id="file" class="dropzone"></div>
                        </div>
                        <input type="hidden" name="upload_id" id="doc_upload_id">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                            <input id="title" placeholder="Enter Title" type="text"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                   value="{{ old('title') }}" required autofocus/>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                        <div class="col-md-6">
                            <textarea placeholder="Enter Overview" id="overview" cols="10" rows="10"
                                      class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}"
                                      name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                            @if ($errors->has('overview'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-success collapsed-box ">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-eye"></i>
                        View Documents
                    </button>


                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">

                <div class="box">
                    <table class="table text-center" id="table">

                        <tr class="red">
                            <th>#</th>
                            <th>Title</th>
                            <th>Overview</th>
                            <th>File</th>
                            <th>Created Date</th>
                        </tr>
                        <?php $count =0; ?>

                        @foreach ($docs as  $index => $doc)
                            @if ($doc->type == 'document')
                                <?php $count++; ?>
                                <tr>
                                    <td>{{$index+1}}</td>


                                    <td>{{ $doc->title}}</td>
                                    <td>{{ $doc->overview}}</td>
                                    <td>
                                        <a target="_blank"
                                           href=" {{asset( 'storage/'.$doc->filename)}}">{{$doc->filename}}</a>
                                    </td>
                                    <td>{{ $doc->created_at}}</td>

                                </tr>

                            @endif
                        @endforeach
                        @if ( $count==0 )
                            <tr >
                                <td colspan="5">
                                    No Record Found
                                </td>
                            </tr>
                        @endif


                    </table>
                    <div class="text-center">{{ $docs->links() }}</div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-info collapsed-box" style="display: none">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-plus"></i>
                        Upload Invoice
                    </button>


                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">

                <form method="POST" action="{{ route('file.upload') }}" aria-label="{{ __('Upload') }}">
                    {{ csrf_field() }}
                    <div class="form-group row ">
                        <input type="hidden" value="{{$data->id}}" name="cement_project">
                        <input type="hidden" value="invoice" name="type">
                        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('File Upload') }}</label>
                        <div class="col-md-6">
                            <div id="invoice" class="dropzone"></div>
                        </div>
                        <input type="hidden" name="upload_id" id="inv_upload_id">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                            <input id="title" placeholder="Enter Title" type="text"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                   value="{{ old('title') }}" required autofocus/>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                        <div class="col-md-6">
                            <textarea placeholder="Enter Overview" id="overview" cols="10" rows="10"
                                      class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}"
                                      name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                            @if ($errors->has('overview'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-success collapsed-box " style="display: none">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-eye"></i>
                        View Invoice
                    </button>


                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">

                <div class="box">
                    <table class="table text-center" id="table">

                        <tr class="red">
                            <th>#s</th>
                            <th>Title</th>
                            <th>Overview</th>
                            <th>File</th>
                            <th>Created Date</th>
                        </tr>
                        <?php $count =0; ?>
                        @foreach ($docs as  $index => $doc)
                            @if ($doc->type == 'invoice')
                                <?php $count++; ?>
                                <tr>
                                    <td>{{$index+1}}</td>


                                    <td>{{ $doc->title}}</td>
                                    <td>{{ $doc->overview}}</td>
                                    <td>
                                        <a target="_blank"
                                           href=" {{asset( 'storage/'.$doc->filename)}}">{{$doc->filename}}</a>
                                    </td>
                                    <td>{{ $doc->created_at}}</td>
                                    @endif
                                </tr>
                                @endforeach

                                @if ( $count==0 )
                                    <tr >
                                        <td colspan="5">
                                            No Record Found
                                        </td>
                                    </tr>
                                @endif


                    </table>
                    <div class="text-center">{{ $docs->links() }}</div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.box-body -->
        </div>



    {{--    <div class="form-group">





            <div class="form-group">
                <div class="">


                    <div id="map_canvas" ></div>



                </div>
            </div>

        </div>--}}
        <div class="clearfix"></div>


        <div class="box box-info collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-plus"></i>
                        Upload Locate Photos
                    </button>


                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">

                <form method="POST" action="{{ route('file.upload') }}" aria-label="{{ __('Upload') }}">
                    {{ csrf_field() }}
                    <div class="form-group row ">
                        <input type="hidden" value="{{$data->id}}" name="cement_project">
                        <input type="hidden" value="photos" name="type">
                        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('File Upload') }}</label>
                        <div class="col-md-6">
                            <div id="locatePhotos" class="dropzone"></div>
                        </div>
                        <input type="hidden" name="upload_id" id="locatePhotos_upload_id">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-6">
                            <input id="title" placeholder="Enter Title" type="text"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                   value="{{ old('title') }}" required autofocus/>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                        <div class="col-md-6">
                            <textarea placeholder="Enter Overview" id="overview" cols="10" rows="10"
                                      class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}"
                                      name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                            @if ($errors->has('overview'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.box-body -->
        </div>

        <div class="box box-success collapsed-box ">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-eye"></i>
                        View Locate Photos
                    </button>


                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">

                <div class="box">

                    <div id="myCarousel" class="carousel slide col-sm-8" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $count=0; ?>
                            @foreach ($docs as  $index => $doc)
                                @if ($doc->type == 'photos')
                                    <?php $count++; ?>
                                    <li data-target="#myCarousel" data-slide-to="{{$index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endif
                            @endforeach




                        </ol>
                        @if( $count ==0)
                            <h3 class="text-center">No Record Found</h3>
                    @endif

                    <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            @foreach ($docs as  $index => $doc)
                                @if ($doc->type == 'photos')
                                    <div class="item {{ $loop->first ? 'active' : '' }}">
                                        <h2 >{{ $doc->title}}</h2>

                                        <img src="{{asset( 'storage/'.$doc->filename)}}" alt="{{ $doc->title}}" style="width:100%;">
                                        <p>{{ $doc->overview}}</p>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.box-body -->
        </div>


    </section>

    <div class="box box-info collapsed-box" style="">
        <div class="box-header with-border">
            <h3 class="box-title">
                <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-plus"></i>
                    Upload Locate Report
                </button>


            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">

            <form method="POST" action="{{ route('file.upload') }}" aria-label="{{ __('Upload') }}">
                {{ csrf_field() }}
                <div class="form-group row ">
                    <input type="hidden" value="{{$data->id}}" name="cement_project">
                    <input type="hidden" value="report" name="type">
                    <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('File Upload') }}</label>
                    <div class="col-md-6">
                        <div id="report" class="dropzone"></div>
                    </div>
                    <input type="hidden" name="upload_id" id="report_upload_id">
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                    <div class="col-md-6">
                        <input id="title" placeholder="Enter Title" type="text"
                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                               value="{{ old('title') }}" required autofocus/>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="overview" class="col-sm-4 col-form-label text-md-right">{{ __('Overview') }}</label>
                    <div class="col-md-6">
                            <textarea placeholder="Enter Overview" id="overview" cols="10" rows="10"
                                      class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}"
                                      name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                        @if ($errors->has('overview'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Upload') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-success collapsed-box ">
        <div class="box-header with-border">
            <h3 class="box-title">
                <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-eye"></i>
                    View Locate Report
                </button>


            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">

            <div class="box">
                <table class="table text-center" id="table">

                    <tr class="red">
                        <th>#</th>
                        <th>Title</th>
                        <th>Overview</th>
                        <th>File</th>
                        <th>Created Date</th>
                    </tr>
                    <?php $count =0; ?>
                    @foreach ($docs as  $index => $doc)
                        @if ($doc->type == 'report')
                            <?php $count++; ?>
                            <tr>
                                <td>{{$index+1}}</td>


                                <td>{{ $doc->title}}</td>
                                <td>{{ $doc->overview}}</td>
                                <td>
                                    <a target="_blank"
                                       href=" {{asset( 'storage/'.$doc->filename)}}">{{$doc->filename}}</a>
                                </td>
                                <td>{{ $doc->created_at}}</td>
                                @endif
                            </tr>
                            @endforeach

                            @if ( $count==0 )
                                <tr >
                                    <td colspan="5">
                                        No Record Found
                                    </td>
                                </tr>
                            @endif


                </table>
                <div class="text-center">{{ $docs->links() }}</div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-success collapsed-box ">
        <div class="box-header with-border">
            <h3 class="box-title">
                <button type="button" class="btn  btn-dropbox" data-widget="collapse"><i class="fa fa-eye"></i>
                    View Terms And Condition
                </button>


            </h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="">

            <div class="box">
                <table class="table text-center" id="table">

                    <tr class="red">

                        <th>Terms And Condition File</th>

                    </tr>

                            <tr>
                                <td>
                                    @if(isset($data->filename))

                                        <a target="_blank" href=" {{asset( 'storage/'.$data->filename)}}">{{ substr($data->filename, 0, 15) . ' ' }}</a>

                                    @endif

                                </td>



                            </tr>





                </table>
                <div class="text-center">{{ $docs->links() }}</div>
                <!-- /.box-body -->
            </div>

        </div>
        <!-- /.box-body -->
    </div>
@endsection


@section('scripts')

    <script>

        $('.dropdown a.dropdown-toggle').on('click', function () {
            $(this).parent().toggleClass('open')
        });


    </script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyAbLEHyTCJzmT2243kvwH8vm0aNKVCTG-Q&libraries=places'></script>
    <script type="text/javascript">
        var geocoder;
        var map;
        var address = "<?php echo  $data->location  ?>";

        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var myOptions = {
                zoom: 8,
                center: latlng,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                },
                navigationControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            if (geocoder) {
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                            map.setCenter(results[0].geometry.location);

                            var infowindow = new google.maps.InfoWindow({
                                content: '<b>' + address + '</b>',
                                size: new google.maps.Size(150, 50)
                            });

                            var marker = new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map,
                                title: address
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.open(map, marker);
                            });

                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>


  {{-- <script src="{{ asset('js/app.js') }}"></script>--}}

    <script>

        var drop = new Dropzone('#file', {
            maxFiles: 1,
            createImageThumbnails: true,
            addRemoveLinks: true,
            url: "{{ route('upload') }}",
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    alert("No more files please!");
                });
            },
            success: function (data, serverdata) {
                $("#doc_upload_id").val(serverdata.id);
//                $('input[name="upload_id"]').val('dd')
            }
        });

        var invoice = new Dropzone('#invoice', {
            maxFiles: 1,
            createImageThumbnails: true,
            addRemoveLinks: true,
            url: "{{ route('upload') }}",
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    alert("No more files please!");
                });
            },
            success: function (data, serverdata) {
                $("#inv_upload_id").val(serverdata.id);
//                $('input[name="upload_id"]').val('dd')
            }
        });


        var locatePhotos = new Dropzone('#locatePhotos', {
            acceptedFiles: 'image/jpeg,image/png',
            maxFiles: 1,
            createImageThumbnails: true,
            addRemoveLinks: true,
            url: "{{ route('upload') }}",
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    alert("No more files please!");
                });
            },
            success: function (data, serverdata) {
                $("#locatePhotos_upload_id").val(serverdata.id);
//                $('input[name="upload_id"]').val('dd')
            }
        });

        var report = new Dropzone('#report', {
            acceptedFiles: 'image/jpeg,image/png',
            maxFiles: 1,
            createImageThumbnails: true,
            addRemoveLinks: true,
            url: "{{ route('upload') }}",
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    alert("No more files please!");
                });
            },
            success: function (data, serverdata) {
                $("#report_upload_id").val(serverdata.id);
//                $('input[name="upload_id"]').val('dd')
            }
        });
    </script>
@endsection
