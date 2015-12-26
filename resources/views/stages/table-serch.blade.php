<div class="row">
            @if($stages->isEmpty())
                <div class="well text-center">No Stages found.</div>
            @else
                <table class="table">
                    <thead>
            			<th>Organisme</th>
            			<th>Adresse</th>
            			<th>Tel Org</th>
            			<th>Portable</th>
            			<th>Type</th>
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