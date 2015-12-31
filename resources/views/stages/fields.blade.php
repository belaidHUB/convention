<div class="style-background" style=" min-height:430px ;">
    {{--<blockquote>--}}
        {{--convention stage design--}}
    {{--</blockquote>--}}
    <!--- Nom Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('nom', 'Nom:') !!}
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Prenom Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('prenom', 'Prénom:') !!}
        {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Cne Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('cne', 'CNE:') !!}
        {!! Form::text('cne', null, ['class' => 'form-control']) !!}
    </div>


    <!--- Email Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Formation Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('formation', 'Formation:') !!}
        {!! Form::select('formation',$formations, '1', ['class' => 'form-control']) !!}
    </div>



    <!--- Organisme Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('organisme', "Nom de l'organisme") !!}
        {!! Form::text('organisme', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Adresse Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('adresse', "Adresse de l'organisme:") !!}
        {!! Form::text('adresse', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Tel Org Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('tel_org', "Téléphone de l'organisme:") !!}
        {!! Form::text('tel_org', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Portable Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('portable', "Fax de l'organisme:") !!}
        {!! Form::text('portable', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Periode Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('periode', 'Période de stage en * jours:') !!}
        {!! Form::text('periode', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Debut Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('debut', 'Début de stage:') !!}
        <input name="debut" type="date" id="debut" class="form-control">
    </div>

    <!--- Fin Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('fin', 'Fin de stage:') !!}
        <input name="fin" type="date" id="fin" class="form-control">
    </div>



    <!--- Type Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('type', 'Type de Stage:') !!}
        <select name="type" class="form-control">
          <option value="Normal">Normal</option>
          <option value="Pfe">Pfe</option>
        </select>
    </div>

    <!--- Assurances Field --->
    <div class="form-group col-sm-6 col-lg-4">
        {!! Form::label('assurances', 'N° Assurance:') !!}
            <a id="modal-743707" href="#modal-container-743707" role="button"data-toggle="modal"><b style="color: red">* plus d'infos</b></a>
            
            <div class="modal fade" id="modal-container-743707" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                             
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Comment obtenir une assurance
                            </h4>
                        </div>
                        <div class="modal-body">
                            Pour avoir votre convention de stage vous devez avoir une assurance de 
                            stage, pour le faire rendez vous au service intendance au décanat (tournez à droite, première porte à gauche)
                            muni de votre CIN, le responsable vous donnera un papier
                            que vous devez apportez à Zurich Assurance devant la présidence de l'université
                            vous aurez votre assurance imprimée dans quelques minutes, prenez le numéro
                            et copiez le dans le formulaire.
                            <img src="{{ url('images/attestation.jpg')}}" class="center-block img-responsive"/>
                        </div>
                        <div class="modal-footer">
                             
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button> 
                        </div>
                    </div>
                    
                </div>
                
            </div>
        {!! Form::text('assurances', null, ['class' => 'form-control']) !!}
    </div>

    <!--- Etat Field --->
    {{--<div class="form-group col-sm-6 col-lg-4 ">--}}
        {{--{!! Form::label('etat', 'Etat:') !!}--}}
        {{--<select name="etat" class="form-control">--}}
          {{--<option value="0">non valider</option>--}}
          {{--<option value="1">valider</option>--}}
        {{--</select>--}}
    {{--</div>--}}
    {!! Form::hidden('etat', '0') !!}



    <!--- Submit Field --->
    <div class="form-group col-sm-12">
        {!! Form::submit('Imprimer convention', ['class' => 'btn btn-lg  btn-style-3 pull-right' ,'style'=>'border-radius: inherit']) !!}
    </div>
</div>