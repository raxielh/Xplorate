@foreach ($personaCategoria as &$valor) 
<!-- Cedula Field -->
<div class="form-group">
    {!! Form::label('cedula', 'Cedula:') !!}
    <p>{!! $valor->cedula !!}</p>
</div>

<!-- Tipoempleado Field -->
<div class="form-group">
    {!! Form::label('tipoempleado', 'Tipoempleado:') !!}
    <p>{!! $valor->tipoempleado !!}</p>
</div>

<!-- Acad Prog Field -->
<div class="form-group">
    {!! Form::label('acad_prog', 'Acad Prog:') !!}
    <p>{!! $valor->acad_prog !!}</p>
</div>

<!-- Cargo Field -->
<div class="form-group">
    {!! Form::label('cargo', 'Cargo:') !!}
    <p>{!! $valor->cargo !!}</p>
</div>

<!-- Campus Field -->
<div class="form-group">
    {!! Form::label('campus', 'Campus:') !!}
    <p>{!! $valor->campus !!}</p>
</div>

<!-- Nombres Field -->
<div class="form-group">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{!! $valor->nombres !!}</p>
</div>


@endforeach
