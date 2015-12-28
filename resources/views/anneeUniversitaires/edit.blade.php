@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($anneeUniversitaire, ['route' => ['anneeUniversitaires.update', $anneeUniversitaire->id], 'method' => 'patch']) !!}

        @include('anneeUniversitaires.fields')

    {!! Form::close() !!}
</div>
@endsection
