<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $rolUsuario->id }}</p>
</div>

<!-- Tipo De Rol Field -->
<div class="form-group">
    {!! Form::label('tipo de rol', 'Tipo De Rol:') !!}
    <p>{{ $rolUsuario->tipo de rol }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $rolUsuario->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $rolUsuario->updated_at }}</p>
</div>

