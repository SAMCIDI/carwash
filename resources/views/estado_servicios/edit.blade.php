@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Estado Servicios
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoServicios, ['route' => ['estadoServicios.update', $estadoServicios->id], 'method' => 'patch']) !!}

                        @include('estado_servicios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection