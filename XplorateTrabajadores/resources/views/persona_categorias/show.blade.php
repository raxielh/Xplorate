@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Personas que pueden hacer el Test
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('persona_categorias.show_fields')
                    <a href="{!! route('personaCategorias.index') !!}" class="btn btn-default">Atras</a>
                </div>
            </div>
        </div>
    </div>
@endsection
