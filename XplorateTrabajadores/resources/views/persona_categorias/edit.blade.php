@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Persona Categoria
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($personaCategoria, ['route' => ['personaCategorias.update', $personaCategoria->persona_categoria], 'method' => 'patch']) !!}

                        @include('persona_categorias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection