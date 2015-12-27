<div class="style-background" style=" min-height:430px ;font-weight: bold">
            @if($stages->isEmpty())
                <div class="well text-center">No Stages found.</div>
            @else
                <table class="table text-center">
                    <thead class="alert-success">
            			<th>Organisme</th>
            			<th>Adresse</th>
            			<th>Tel Organisme</th>
            			<th>Fax Organisme</th>
            			<th>Type de stage</th>
            			<th>Formation</th>
                    </thead>
                    <tbody>    
                    @foreach($stages as $stage)
                        <tr>
        					<td>{!! $stage->organisme !!}</td>
        					<td>{!! $stage->adresse !!}</td>
        					<td>{!! $stage->tel_org !!}</td>
        					<td>{!! $stage->portable !!}</td>
        					<td>{!! $stage->type !!}</td>
        					<td>{!! $stage->formation !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="align-center">{!! $links !!}</div>
            @endif
</div>