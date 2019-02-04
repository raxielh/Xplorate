<!-- Cedula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipoempleado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoempleado', 'Tipoempleado:') !!}
    {!! Form::text('tipoempleado', null, ['class' => 'form-control']) !!}
</div>

<!-- Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo', 'Cargo:') !!}
    {!! Form::text('cargo', null, ['class' => 'form-control']) !!}
</div>

<!-- Campus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campus', 'Campus:') !!}
    {!! Form::text('campus', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('acad_prog', 'Programa:') !!}
    {!! Form::text('acad_prog', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('personaCategorias.index') !!}" class="btn btn-default">Cancel</a>
</div>
