@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i>  <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
            "></i>
                </li>
                <li class="ab">
                     <a href="{{ route('gellary.index') }}">Gellary Listing</a><i class="mdi mdi-record"></i>
                <li class="ab active">
                    Edit Gellary
                </li>

            </ul>
        </div>
    @else
        <ul class="ab">
            <li class="ab">
                <i class="mdi mdi-home"></i>  <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
        "></i>
            </li>
            <li class="ab">
                <a href="{{ route('gellary.index') }}">Gellary Listing</a><i class="mdi mdi-record"></i>
            <li class="ab active">
                Add Gellary
            </li>

        </ul>
    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit Gellary
                    @else
                        Add Gellary
                    @endif

                    <hr>

                    <p class="card-description">Gellary info</p>

                    @if (isset($editdata))
                    {{ Form::model($editdata, [
                        'id' => 'gellary',
                        'class' => 'FromSubmit form-horizontal',
                        'data-redirect_url' => route('gellary.index'),
                        'url' => route('gellary.update', Crypt::encrypt($editdata->id)),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @else
                    {{ Form::open([
                        'id' => 'gellary',
                        'class' => 'FromSubmit form-horizontal',
                        'url' => route('gellary.store'),
                        'data-redirect_url' => route('gellary.index'),
                        'name' => 'gellary',
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
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description one</label>
                        <div class="col-sm-9">
                            {!! Form::text('description_one', null, [
                                'id' => 'description_one',
                                'placeholder' => 'Enter description one',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('description_one'))
                                <span class="text-danger">{{ $errors->first('description_one') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description Two</label>
                        <div class="col-sm-9">
                            {!! Form::text('description_two', null, [
                                'id' => 'description_two',
                                'placeholder' => 'Enter description two',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('description_two'))
                                <span class="text-danger">{{ $errors->first('description_two') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description Three</label>
                        <div class="col-sm-9">
                            {!! Form::text('description_three', null, [
                                'id' => 'description_three',
                                'placeholder' => 'Enter description three',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('description_three'))
                                <span class="text-danger">{{ $errors->first('description_three') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            {!! Form::text('name', null, [
                                'id' => 'name',
                                'placeholder' => 'Enter name',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Position</label>
                        <div class="col-sm-9">
                            {!! Form::text('position', null, [
                                'id' => 'position',
                                'placeholder' => 'Enter position',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('position'))
                                <span class="text-danger">{{ $errors->first('position') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image Employee</label>
                        <div class="col-sm-9">
                            {!! Form::file('image_employee', null, [
                                'id' => 'image_employee',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('image_employee'))
                                <span class="text-danger">{{ $errors->first('image_employee') }}</span>
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

                    <a href="{{ route('gellary.index') }}" class="btn btn-danger">Cancle</a>

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
