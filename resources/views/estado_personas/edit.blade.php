@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estado Persona
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoPersona, ['route' => ['estadoPersonas.update', $estadoPersona->id], 'method' => 'patch']) !!}

                        @include('estado_personas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection