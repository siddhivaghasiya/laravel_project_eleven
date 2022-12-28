@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i>    <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
            "></i>
                </li>
                <li class="ab">
                      <a href="{{ route('service.index') }}">Service Listing</a><i class="mdi mdi-record"></i>
                <li class="ab active">
                    Edit Service
                </li>

            </ul>
        </div>
    @else
        <ul class="ab">
            <li class="ab">
                <i class="mdi mdi-home"></i>   <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
        "></i>
            </li>
            <li class="ab">
                <a href="{{ route('service.index') }}">Service Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                Add Service
            </li>

        </ul>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit Service
                    @else
                        Add Service
                    @endif

                    <hr>

                    <p class="card-description">Service info</p>

                    @if (isset($editdata))
                    {{ Form::model($editdata, [
                        'id' => 'service',
                        'class' => 'FromSubmit form-horizontal',
                        'data-redirect_url' => route('service.index'),
                        'url' => route('service.update', Crypt::encrypt($editdata->id)),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @else
                    {{ Form::open([
                        'id' => 'service',
                        'class' => 'FromSubmit form-horizontal',
                        'url' => route('service.store'),
                        'data-redirect_url' => route('service.index'),
                        'name' => 'service',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @endif

                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Icon</label>
                        <div class="col-sm-9">
                            {!! Form::text('icon', null, [
                                'id' => 'icon',
                                'placeholder' => 'Enter icon',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('icon'))
                                <span class="text-danger">{{ $errors->first('icon') }}</span>
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
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            {!! Form::text('description', null, [
                                'id' => 'short_descriDescription',
                                'placeholder' => 'Enter Description',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('shocription'))
                                <span class="text-danger">{{ $errors->first('shscription') }}</span>
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

                    <a href="{{ route('service.index') }}" class="btn btn-danger">Cancle</a>

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
