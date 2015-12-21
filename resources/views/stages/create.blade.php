@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'stages.store']) !!}

        @include('stages.fields')

    {!! Form::close() !!}
</div>
@endsection
