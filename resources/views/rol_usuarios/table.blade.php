<div class="table-responsive">
    <table class="table" id="rolUsuarios-table">
        <thead>
            <tr>
                <th>Tipo De Rol</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rolUsuarios as $rolUsuario)
            <tr>
                <td>{{ $rolUsuario->tipo de rol }}</td>
                <td>
                    {!! Form::open(['route' => ['rolUsuarios.destroy', $rolUsuario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rolUsuarios.show', [$rolUsuario->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('rolUsuarios.edit', [$rolUsuario->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
