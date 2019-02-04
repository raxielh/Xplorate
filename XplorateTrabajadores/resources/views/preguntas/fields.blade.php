<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::number('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Orden Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orden', 'Orden:') !!}
    {!! Form::number('orden', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria', 'Categoria:') !!}
    {!! Form::select('categoria',$Categoria, null, ['class' => 'form-control chosen-select','id'=>'categoria_id']) !!}
</div>

                                <div class="form-group col-sm-6">
                                        {!! Form::label('tipo_pregunta', 'Tipo Pregunta:') !!}
                                        {!! Form::select('tipo_pregunta',$tipo_pregunta, null, ['class' => 'form-control chosen-select']) !!}
                                    </div>
                                <div class="form-group col-sm-6">
                                        {!! Form::label('dependiente', 'Dependiente:') !!}
                                        {!! Form::select('dependiente',$siono, null, ['class' => 'form-control chosen-select']) !!}
                                    </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/categorias/{{($preguntas->categoria)}}" class="btn btn-default">Cancelar</a>
</div>
