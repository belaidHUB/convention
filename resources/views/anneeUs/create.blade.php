@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'anneeUs.store']) !!}

        @include('anneeUs.fields')

    {!! Form::close() !!}
</div>
@endsection
