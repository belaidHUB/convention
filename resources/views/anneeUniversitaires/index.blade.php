@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">annee_universitaires</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('anneeUniversitaires.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($anneeUniversitaires->isEmpty())
                <div class="well text-center">No annee_universitaires found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Annee Universitaire</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($anneeUniversitaires as $anneeUniversitaire)
                        <tr>
                            <td>{!! $anneeUniversitaire->annee_universitaire !!}</td>
                            <td>
                                <a href="{!! route('anneeUniversitaires.edit', [$anneeUniversitaire->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('anneeUniversitaires.delete', [$anneeUniversitaire->id]) !!}" onclick="return confirm('Are you sure wants to delete this annee_universitaire?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection