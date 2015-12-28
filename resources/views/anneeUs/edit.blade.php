@extends('app')

@section('content')
<div class="container">

    @include('common.errors')
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
    {!! Form::model($anneeU, ['route' => ['anneeUs.update', $anneeU->id], 'method' => 'patch']) !!}

        @include('anneeUs.fields')

    {!! Form::close() !!}
    </div>
    </div>

</div>
@endsection
