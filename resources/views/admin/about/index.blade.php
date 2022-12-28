@extends('admin.layout')
@section('content')

<div>
    <ul class="ab">
        <li class="ab">
          <i class="mdi mdi-home"></i>  <a href="{{ route('admin') }}">Home</a>
        </li>
    </ul>
</div>


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title"> Managed AboutUs </h1>
                <hr>
                <div class="table-responsive">
                    <a href="{{ route('about.create') }}" class="btn btn-info  btn-rounded btn-fw mdi mdi-plus">Add New</a>
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>image</th>
                                <th>title</th>
                                <th>short_description</th>
                                <th>status</th>
                                <th>Acion</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var oTable = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            responsive: true,
            ajax: {
                url: '{!! route('about.anydata') !!}',
                data: function(d) {

                }
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'image'
                },
                {
                    data: 'title'
                },
                {
                    data: 'short_description'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action'
                },
            ]
        });



        $(document).ready(function() {

$(document).on("click", "#active_inactive", function() {

    swal({
            title: "{{ trans('lang_data.are_you_sure_want_change_status_label') }}",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var status = $(this).attr('status');
                var id = $(this).attr('data-id');
                var cur = $(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('about.Singlestatuschange') }}",
                    data: {
                        "status": status,
                        "id": id,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            cur.removeClass('btn-success');
                            cur.addClass('btn-danger');
                            cur.text(
                            '{{ trans('lang_data.inactive_label') }}');
                        } else {
                            cur.removeClass('btn-danger');
                            cur.addClass('btn-success');
                            cur.text('{{ trans('lang_data.active_label') }}');
                        }
                    }
                })
                swal("{{ trans('lang_data.status_has_been_successfully_changed_label') }}", {
                    icon: "success",
                });
            }
        });
})
});


$(document).on("click",".delete",function(){


var myUrl = $(this).attr('data-link');

$.ajax({
    type: 'DELETE',
    url: myUrl,
    data: {
        "_token": "{{ csrf_token() }}"
    },
    success:  function(response) {
        if (response.status == 0 && response.msg != "") {

            oTable.draw();

        }
    }

});
});


    </script>
@endsection
