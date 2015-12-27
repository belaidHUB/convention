@extends('app')

@section('content')
    <div class="row">
    <div class="col-lg-6 col-md-offset-3">
        <div class="style-background" style="min-height: 200px;margin-bottom: 20%">

            messsi
            <a href="{!! route('stages.imprimer', [$stage]) !!}">imprimer</a>

        </div>
    </div>
    </div>
@endsection
