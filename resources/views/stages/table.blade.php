<div class="style-background" style=" min-height:430px ;font-weight: bold ;">

    <div class="">
            @if($stages->isEmpty())
                <div class="well text-center">No Stages found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Organisme</th>
                    <th>Etat</th>
                    <th>Type</th>
                    <th>Formation</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($stages as $stage)
                        <tr>
                    <td>{!! $stage->nom !!}</td>
					<td>{!! $stage->prenom !!}</td>
					<td>{!! $stage->organisme !!}</td>
					<td>
                    @if($stage->etat==0)
                         <a href="{!! route('stages.update_etat', [$stage->id]) !!}"><span style="color: #FF0000" class="glyphicon glyphicon-refresh"></span></a>
                    @elseif($stage->etat==1)
                         <a href="{!! route('stages.update_etat', [$stage->id]) !!}"><span style="color: #FF0000" class="glyphicon glyphicon-envelope"></span></a>
                    @elseif($stage->etat==2)
                         <a href="{!! route('stages.update_etat', [$stage->id]) !!}"><span style="color: #518900" class="glyphicon glyphicon-envelope"></span></a>
                    @elseif($stage->etat==3)
                         <a href="{!! route('stages.update_etat', [$stage->id]) !!}"><span style="color: #518900" class="glyphicon glyphicon-ok"></span></a>
                    @endif 
                    </td>
					<td>{!! $stage->type !!}</td>
					<td>{!! $stage->formation !!}</td>
                            <td>
                                <a href="{!! route('stages.edit', [$stage->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('stages.delete', [$stage->id]) !!}" onclick="return confirm('Are you sure wants to delete this Stage?')"><i class="glyphicon glyphicon-remove"></i></a>
                                <a href="{!! route('stages.imprimer', [$stage->id]) !!}"><i class="glyphicon glyphicon-floppy-save"></i></a>
                                <a href="{!! route('stages.show', [$stage->id]) !!}"><span class="glyphicon glyphicon-eye-open"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="align-center">{!! $links !!}</div>
            @endif
</div>

</div>