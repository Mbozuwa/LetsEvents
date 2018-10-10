

@extends('app')

@section('title')
    Form Ajax POST
@stop

@section('content')

    <h3>Form Ajax post</h3>

    <p>Perform an Ajax POST request and displaying the result in a div with JQuery</p>

    {!! Form::open(['method' => 'post', 'action' => 'AjaxPostController@ajaxpost', 'id' => 'frmajaxpost', 'role' => 'form']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'title' => '', 'required' => 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('categories', 'Categories:') !!}
        {!! Form::select('categories', ['default' => 'Select', 1 => 'Apples', 2 => 'Pears', 3 => 'Oranges'], null, ['class' => 'form-control', 'title' => '']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sex', 'Sex:') !!}
        {!! Form::radio('sex', 'male', true) !!} Male {!! Form::radio('sex', 'female') !!} Female
    </div>

    <div class="form-group">
        {!! Form::label('categories', 'Choose:') !!}
        {!! Form::checkbox('choosecheck[]', 'something', false, ['id' => 'something']) !!} <label for="something" style="font-weight: normal;">Something</label>
        {!! Form::checkbox('choosecheck[]', 'somethingelse', false, ['id' => 'somethingelse']) !!} <label for="somethingelse" style="font-weight: normal;">Something else</label>
    </div>

    <div class="form-group">
        {!! Form::submit('Proceed', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    <div id="result"></div>

    @include('common.forms._form_error_messages')
@stop

@section('footer')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var validate = $("#frmajaxpost").validate({
            submitHandler: performAjaxSubmit()
        });

        function performAjaxSubmit()
        {
            $("#frmajaxpost").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type     : "POST",
                    url      : $(this).attr('action'),
                    data     : $(this).serialize(),
                    cache    : false,

                    success  : function(data) {
                        $( "#result" ).empty().append( data );
                    }
                });

                return false;
            });
        }

    </script>
@stop
