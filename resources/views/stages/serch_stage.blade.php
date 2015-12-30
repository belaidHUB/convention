@extends('app')

@section('content')
<script src="//code.jquery.com/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

         $(".select-type").change(function () {
            var formation_serch=$('.select-type option:selected').val();
            /*alert("The paragraph was clicked."+formation_serch);*/
            /*$(".ajax-table").html('<div class="ajax-image"><img src="{{ url('images/ajax3.GIF') }}" lt=""/><div>');*/
            $.ajax({
                url:'{{URL::to("search_stage")}}',
                dataType:'json',
                type:'get',
                data:{formation_serch:formation_serch},
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

        <div >
           {!! Form::select('formation_serch',$formations,null, ['class' => 'form-control select-type']) !!}
        </div>
        <div class="ajax-table">
             @include('stages.table-serch')
        </div>

    </div>
@endsection



