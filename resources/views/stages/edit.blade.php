@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($stage, ['route' => ['stages.update', $stage->id], 'method' => 'patch']) !!}

      
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('nom', 'Nom:') !!}
		    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Prenom Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('prenom', 'Prenom:') !!}
		    {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Cne Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('cne', 'Cne:') !!}
		    {!! Form::text('cne', null, ['class' => 'form-control']) !!}
		</div>


		<!-- Email Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('email', 'Email:') !!}
		    {!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Formation Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('formation', 'Formation:') !!}
		    {!! Form::select('formation',$formations, $stage->formation, ['class' => 'form-control']) !!}
		</div>

		<!-- Portable Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('portable', 'Portable Personal:') !!}
		    {!! Form::text('portable', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Organisme Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('organisme', "Nom De L'Organisme") !!}
		    {!! Form::text('organisme', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Adresse Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('adresse', "Adresse De L'Organisme:") !!}
		    {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Tel Org Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('tel_org', "Telephne De L'Organisme:") !!}
		    {!! Form::text('tel_org', null, ['class' => 'form-control']) !!}
		</div>



		<!-- Periode Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('periode', 'Periode De Stage en Jour:') !!}
		    {!! Form::text('periode', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Debut Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('debut', 'Debut De Stage:') !!}
		    <input name="debut" type="date" value='{!!$stage->debut!!}' id="debut" class="form-control">
      	</div>

		<!-- Fin Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('fin', 'Fin De Stage:') !!}
		    <input name="fin" type="date" value='{!!$stage->fin!!}' id="fin" class="form-control">
		</div>



		<!-- Type Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('type', 'Type De Stage:') !!}
		    {!! Form::select('type',['Normal' => 'Normal','Pfe' => 'Pfe'] , $stage->type, ['class' => 'form-control']) !!}
		</div>

		<!-- Assurances Field -->
		<div class="form-group col-sm-6 col-lg-4">
		    {!! Form::label('assurances', 'N°Assurances:') !!}
		    {!! Form::text('assurances', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Etat Field -->
		<div class="form-group col-sm-6 col-lg-4">
		     {!! Form::label('etat', 'Etat:') !!}
		     {!! Form::select('etat',['0' => 'non valider','1' => 'valider'] , $stage->etat, ['class' => 'form-control']) !!}
		</div>



		<!-- Submit Field -->
		<div class="form-group col-sm-12">
		    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>


    {!! Form::close() !!}
</div>
@endsection
