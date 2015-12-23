@extends('app')

@section('content')
<script src="//code.jquery.com/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $(".select-type").keyup(function () {
            var Nom_serch=$('.select-type').val();
            //alert("The paragraph was clicked."+Nom_serch);
            /*$(".ajax-table").html('<div class="ajax-image"><img src="{{ url('images/ajax3.GIF') }}" lt=""/><div>');*/
            $.ajax({
                url:'{{URL::to("serch_Ajax")}}',
                dataType:'json',
                type:'get',
                data:{Nom_serch:Nom_serch},
                beforeSend: function(){

                },success: function(data)
                {
                    $(".ajax-table").html(data);
                },error: function(data)
                {
                    alert("Probleme serveur FSTG!!");
                }
            });
        });

    })
</script>

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Stages</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('stages.create') !!}">Add New</a>
            <a class="btn btn-danger pull-right" style="margin-top: 25px" href="{{ url('auth/logout')}}">logout</a>
        </div>

        <div >
           {!! Form::text('Nom_serch', null, ['class' => 'form-control select-type']) !!}
        </div>
        <div class="ajax-table">
             @include('stages.table')
        </div>
    </div>
@endsection