@extends('app')

@section('content')
<div class="container">
    
	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('nom', 'Nom:') !!}
	    {!! $stage->nom!!}
	</div>

	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('prenom', 'Prenom:') !!}
	    {!! $stage->prenom!!}
	    
	</div>

	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('cne', 'Cne:') !!}
	    {!! $stage->cne!!}
	</div>


	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('email', 'Email:') !!}
	    {!! $stage->email!!}
	</div>


	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('formation', 'Formation:') !!}
	    {!! $stage->formation!!}
	</div>


	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('portable', 'Portable Personal:') !!}
	    {!! $stage->portable!!}
	</div>


	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('organisme', "Nom De L'Organisme") !!}
	    {!! $stage->organisme!!}
	</div>


	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('adresse', "Adresse De L'Organisme:") !!}
	    {!! $stage->adresse!!}
	</div>


	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('tel_org', "Telephne De L'Organisme:") !!}
	    {!! $stage->tel_org!!}
	</div>




	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('periode', 'Periode De Stage en Jour:') !!}
	    {!! $stage->periode!!}
	</div>

	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('debut', 'Debut De Stage:') !!}
	    {!! $stage->debut!!}
	</div>

	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('fin', 'Fin De Stage:') !!}
	    {!! $stage->fin!!}
	</div>


	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('type', 'Type De Stage:') !!}
	    {!! $stage->type!!}
	</div>

	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('assurances', 'N°Assurances:') !!}
	    {!! $stage->assurances!!}
	</div>

	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('etat', 'Etat:') !!}
	    {!! $stage->etat!!}
	</div>

	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('created_at', 'Date de Création:') !!}
	    {!! $stage->created_at!!}
	</div>

	<div class="form-group col-sm-4 col-lg-4">
	    {!! Form::label('updated_at', 'Date de Validation:') !!}
	    {!! $stage->updated_at!!}
	</div>

	

</div>
@endsection
