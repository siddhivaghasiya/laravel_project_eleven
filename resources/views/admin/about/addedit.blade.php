@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i> <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
            "></i>
                </li>
                <li class="ab">
                      <a href="{{ route('about.index') }}">About Listing</a><i class="mdi mdi-record"></i>
                <li class="ab active">
                    Edit About
                </li>

            </ul>
        </div>
    @else
        <ul class="ab">
            <li class="ab">
                <i class="mdi mdi-home"></i>    <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
        "></i>
            </li>
            <li class="ab">
                <a href="{{ route('about.index') }}">About Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                Add About
            </li>

        </ul>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit AboutUS
                    @else
                        Add AboutUS
                    @endif

                    <hr>

                    <p class="card-description">AboutUS info</p>

                    @if (isset($editdata))
                    {{ Form::model($editdata, [
                        'id' => 'about',
                        'class' => 'FromSubmit form-horizontal',
                        'data-redirect_url' => route('about.index'),
                        'url' => route('about.update', Crypt::encrypt($editdata->id)),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @else
                    {{ Form::open([
                        'id' => 'about',
                        'class' => 'FromSubmit form-horizontal',
                        'url' => route('about.store'),
                        'data-redirect_url' => route('about.index'),
                        'name' => 'about',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @endif

                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            {!! Form::file('image', null, [
                                'id' => 'image',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('title', null, [
                                'id' => 'title',
                                'placeholder' => 'Enter title',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Short Description</label>
                        <div class="col-sm-9">
                            {!! Form::text('short_description', null, [
                                'id' => 'short_description Description',
                                'placeholder' => 'Enter Description',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Long Description</label>
                        <div class="col-sm-9">
                            {!! Form::text('long_description', null, [
                                'id' => 'long_description',
                                'placeholder' => 'Enter description',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, [
                                'id' => 'status',
                                'placeholder' => 'select status',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>

                    {!! Form::submit('submit', ['class' => 'btn btn-primary', 'id' => 'saveBtn']) !!}

                    <a href="{{ route('about.index') }}" class="btn btn-danger">Cancle</a>

                    {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        $('form.FromSubmit').submit(function(event) {


            event.preventDefault();
            var formId = $(this).attr('id');
            // if ($(this).valid()) {

                var formAction = $(this).attr('action');
                var $btn = $('#' + formId + ' button[type="submit"]').button('loading');
                var redirectURL = $(this).data("redirect_url");
                $.ajax({
                    type: "POST",
                    url: formAction,
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    enctype: 'multipart/form-data',
                    success: function(response) {
                        if (response.status == 1 && response.msg != "") {
                            window.location = redirectURL;
                        }
                    },
                    error: function(jqXhr) {
                        // var errors = $.parseJSON(jqXhr.responseText);
                        //     showErrorMessages(formId, errors);
                        // $btn.button('reset');
                    }
                });
                return false;
            // };
        });

    </script>


@endsection
