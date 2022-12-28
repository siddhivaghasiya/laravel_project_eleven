@extends('admin.layout')
@section('content')
    @if (isset($editdata))
        <div>
            <ul class="ab">
                <li class="ab">
                    <i class="mdi mdi-home"></i>  <a href="{{ route('admin') }}">Home</a><i class="mdi mdi-record
            "></i>
                </li>

                <li class="ab active">
                    Edit Content
                </li>

            </ul>
        </div>

    @endif

    <div class="col-md-12  grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">

                    &nbsp; @if (isset($editdata))
                        Edit Content
                    @else
                        Add Content
                    @endif

                    <hr>

                    <p class="card-description">Content info</p>

                    @if (isset($editdata))
                    {{ Form::model($editdata, [
                        'id' => 'content',
                        'class' => 'FromSubmit form-horizontal',
                        'data-redirect_url' => route('content.index'),
                        'url' => route('content.update', Crypt::encrypt($editdata->id)),
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                    ]) }}

                @endif

                    @csrf

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Home Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('home_title', null, [
                                'id' => 'home_title',
                                'placeholder' => 'Enter home title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('home_title'))
                                <span class="text-danger">{{ $errors->first('home_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Home Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('home_description', null, [
                                'id' => 'home_description',
                                'placeholder' => 'Enter home description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('home_description'))
                                <span class="text-danger">{{ $errors->first('home_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('about_title', null, [
                                'id' => 'about_title',
                                'placeholder' => 'Enter about title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('about_title'))
                                <span class="text-danger">{{ $errors->first('about_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">About Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('about_description', null, [
                                'id' => 'about_description',
                                'placeholder' => 'Enter about description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('about_description'))
                                <span class="text-danger">{{ $errors->first('about_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gellary Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('gellary_title', null, [
                                'id' => 'gellary_title',
                                'placeholder' => 'Enter gellary title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('gellary_title'))
                                <span class="text-danger">{{ $errors->first('gellary_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gellary Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('gellary_description', null, [
                                'id' => 'gellary_description',
                                'placeholder' => 'Enter gellary description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('gellary_description'))
                                <span class="text-danger">{{ $errors->first('gellary_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('service_title', null, [
                                'id' => 'service_title',
                                'placeholder' => 'Enter service title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('service_title'))
                                <span class="text-danger">{{ $errors->first('service_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Service Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('service_description', null, [
                                'id' => 'service_description',
                                'placeholder' => 'Enter service description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('service_description'))
                                <span class="text-danger">{{ $errors->first('service_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contact Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('contact_title', null, [
                                'id' => 'contact_title',
                                'placeholder' => 'Enter contact title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('contact_title'))
                                <span class="text-danger">{{ $errors->first('contact_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contact Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('contact_description', null, [
                                'id' => 'contact_description',
                                'placeholder' => 'Enter contact description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('contact_description'))
                                <span class="text-danger">{{ $errors->first('contact_description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Testimonial Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('testimonial_title', null, [
                                'id' => 'testimonial_title',
                                'placeholder' => 'Enter testimonial title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('testimonial_title'))
                                <span class="text-danger">{{ $errors->first('testimonial_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Testimonial Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('testimonial_description', null, [
                                'id' => 'testimonial_description',
                                'placeholder' => 'Enter testimonial description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('testimonial_description'))
                                <span class="text-danger">{{ $errors->first('testimonial_description') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gellary Single Title</label>
                        <div class="col-sm-9">
                            {!! Form::text('gellary_single_title', null, [
                                'id' => 'gellary_single_title',
                                'placeholder' => 'Enter gellary_single title',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('gellary_single_title'))
                                <span class="text-danger">{{ $errors->first('gellary_single_title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Gellary Single Description</label>
                        <div class="col-sm-9">
                            {!! Form::textarea('gellary_single_description', null, [
                                'id' => 'gellary_single_description',
                                'placeholder' => 'Enter gellary_single description',
                                'class' => 'form-control',
                            ]) !!}

                            @if ($errors->has('gellary_single_description'))
                                <span class="text-danger">{{ $errors->first('gellary_single_description') }}</span>
                            @endif
                        </div>
                    </div>



                    {!! Form::submit('submit', ['class' => 'btn btn-primary', 'id' => 'saveBtn']) !!}

                    <a href="{{ route('content.index') }}" class="btn btn-danger">Cancle</a>

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
