{!! Form::open(['route'=>'personaCategorias.index','method'=>'GET','class'=>'navbar-form pull-right','role'=>'search']) !!}
    <div class="form-group">
        <input type="text" name="campo" class="form-control" autofocus placeholder="Buscar..." value="{{ @$_GET['campo'] }}">
    </div>
    <button type="submit" class="btn btn-success">Buscar</button>
{!! Form::close() !!}
<table class="table table-responsive" id="personaCategorias-table">
    <thead>
        <tr>
            <th>Cedula</th>
        <th>Tipoempleado</th>
        <th>Acad Prog</th>
        <th>Cargo</th>
        <th>Campus</th>
        <th>Nombres</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($personaCategorias as $personaCategoria)
        <tr>
            <td>{!! $personaCategoria->cedula !!}</td>
            <td>{!! $personaCategoria->tipoempleado !!}</td>
            <td>{!! $personaCategoria->acad_prog !!}</td>
            <td>{!! $personaCategoria->cargo !!}</td>
            <td>{!! $personaCategoria->campus !!}</td>
            <td>{!! $personaCategoria->nombres !!}</td>
            <td>
                {!! Form::open(['route' => ['personaCategorias.destroy', $personaCategoria->persona_categoria], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $personaCategorias->links() }}
