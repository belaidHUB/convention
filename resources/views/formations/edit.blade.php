@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($formation, ['route' => ['formations.update', $formation->id], 'method' => 'patch']) !!}

        @include('formations.fields')

    {!! Form::close() !!}
</div>
@endsection
