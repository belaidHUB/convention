@extends('app')

@section('content')
    <div class="row">
    <div class="col-lg-6 col-md-offset-3">
        <div class="style-background" style="min-height: 200px;margin-bottom: 10%;padding: 10px">

            <p>Les étapes pour l'obtention d'une <b>convention de stage:</b></p>
            <ul>
                <li>1- Imprimer la convention en <b>3 copies.</b></li>
                <li>2- Ces copies doivent êtres <b>signées</b> par :
                   <ul>
                       <li> - L'étudiant.</li>
                       <li> - Le responsable de filière.</li>
                   </ul>
                </li>
                <li>3- Rendez-vous à la cellule de communication et déposez les 3 copies.</li>
                <li>4- Après que vos copies soient signées par M. Le doyen, <b>vous recevrez un email de notification.</b></li>
                <li>5- Rendez-vous après à la cellule de communication pour récupérer vos copies.</li>
            </ul>
            <div>
            <button type="button" class="btn btn-lg btn-style-1 " style="border-radius: inherit;">
                <a href="{!! route('stages.imprimer', [$stage]) !!}">
                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                    Imprimer
                </a>
            </button>
            </div>

        </div>
    </div>
    </div>
@endsection
