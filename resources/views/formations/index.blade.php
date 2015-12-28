@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Formations</h1>
            <a class="btn btn-primary pull-right" style="border-radius:0px ;margin-top: 25px" href="{!! route('formations.create') !!}">Ajouter Formations</a>
        </div>

        <div class="row" style="">
            @if($formations->isEmpty())
                <div class="well text-center">No Formations found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nom</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($formations as $formation)
                        <tr>
                            <td>{!! $formation->nom !!}</td>
                            <td>
                                <a href="{!! route('formations.edit', [$formation->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <!--a href="{!! route('formations.delete', [$formation->id]) !!}" onclick="return confirm('Are you sure wants to delete this Formation?')"><i class="glyphicon glyphicon-remove"></i></a-->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection