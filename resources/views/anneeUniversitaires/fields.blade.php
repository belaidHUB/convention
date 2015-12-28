<!--- Annee Universitaire Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('annee_universitaire', 'Annee Universitaire:') !!}
    {!! Form::text('annee_universitaire', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
