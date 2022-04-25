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
        <div class="box">
            <div class="">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="card text-left">
                            <div class="card-body">
                                <form method="POST" action="{{ route('file.upload') }}" aria-label="{{ __('Upload') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group row ">
                                        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('File Upload') }}</label>
                                        <div class="col-md-6">
                                            <div id="file" class="dropzone"></div>
                                        </div>
                                        <input type="hidden" name="upload_id" id="upload_id">
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus />
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
                                            <textarea id="overview" cols="10" rows="10" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" value="{{ old('overview') }}" required autofocus></textarea>
                                            @if ($errors->has('overview'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{--<div class="form-group row">--}}
                                    {{--<label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>--}}
                                    {{--<div class="col-md-6">--}}
                                    {{--<input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" required>--}}
                                    {{--@if ($errors->has('price'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                    {{--<strong>{{ $errors->first('price') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="form-group row mb-0 text-center">
                                        <div class="gap-distance">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Upload') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.box -->

    </section>
@endsection




@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}

    <script>

        $('.dropdown a.dropdown-toggle').on('click', function () {
            $(this).parent().toggleClass('open')
        });


    </script>

    <script>

        var drop = new Dropzone('#file', {
            maxFiles: 1,
            createImageThumbnails: true,
            addRemoveLinks: true,
            url: "{{ route('upload') }}",
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },
            init: function() {
                this.on("maxfilesexceeded", function(file){
                    alert("No more files please!");
                });
            },
            success:function (data,serverdata) {
              $("#upload_id").val(serverdata.id);
            }
        });
    </script>
@endsection