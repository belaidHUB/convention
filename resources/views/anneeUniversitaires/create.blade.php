@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'anneeUniversitaires.store']) !!}

        @include('anneeUniversitaires.fields')

    {!! Form::close() !!}
</div>
@endsection
