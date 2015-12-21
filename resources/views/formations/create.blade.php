@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'formations.store']) !!}

        @include('formations.fields')

    {!! Form::close() !!}
</div>
@endsection
