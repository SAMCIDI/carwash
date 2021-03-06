@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipo De Servicio
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipoDeServicio, ['route' => ['tipoDeServicios.update', $tipoDeServicio->id], 'method' => 'patch']) !!}

                        @include('tipo_de_servicios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection