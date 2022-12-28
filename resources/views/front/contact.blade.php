@extends('front.common.layout')


<!-- ======= End Page Header ======= -->
<div class="page-header d-flex align-items-center">
    <div class="container position-relative">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                @if (isset($getcontent))
                <h2>{{ $getcontent->contact_title }}</h2>
                <p>{{ $getcontent->contact_description }}</p>
                @endif

            </div>
        </div>
    </div>
</div><!-- End Page Header -->
@section('content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="row gy-4 justify-content-center">

                <div class="col-lg-3">
                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3">
                    <div class="info-item d-flex">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3">
                    <div class="info-item d-flex">
                        <i class="bi bi-phone flex-shrink-0"></i>
                        <div>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row justify-content-center mt-4">

                <div class="col-lg-9">


                    {{ Form::open([
                        'id' => 'contact',
                        'class' => 'FromSubmit form-horizontal',
                        'url' => route('contactpage.store'),
                        'data-redirect_url' => route('contactpage.index'),
                        'name' => 'contact',
                        'enctype' => 'multipart/form-data',
                    ]) }}

                    @csrf

                    <div class="row">

                        <div class="col-md-6 form-group">
                            {!! Form::text('name', null, [
                                'id' => 'name',
                                'placeholder' => 'Enter name',
                                'class' => 'form-control',
                           ]) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            {!! Form::email('email', null, [
                                'id' => 'email',
                                'placeholder' => 'Enter email',
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        {!! Form::text('subject', null, [
                            'id' => 'subject',
                            'placeholder' => 'Enter subject',
                            'class' => 'form-control',
                        ]) !!}
                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        {!! Form::textarea('message', null, [
                            'id' => 'message',
                            'placeholder' => 'Enter message',
                            'class' => 'form-control',
                        ]) !!}
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <div class="my-3">

                    </div>
                    <div class="text-center"> {!! Form::submit('submit', ['class' => 'btn btn-success', 'id' => 'saveBtn']) !!}

                    </div>
                    {!! Form::close() !!}


                </div><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

    <script>
        $('form.FromSubmit').submit(function(event) {


            event.preventDefault();
            var formId = $(this).attr('id');
            //  if ($(this).valid()) {

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
            //  };
        });
    </script>
@endsection
