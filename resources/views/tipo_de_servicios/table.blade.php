<div class="table-responsive">
    <table class="table" id="tipoDeServicios-table">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipoDeServicios as $tipoDeServicio)
            <tr>
                <td>{{ $tipoDeServicio->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['tipoDeServicios.destroy', $tipoDeServicio->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tipoDeServicios.show', [$tipoDeServicio->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tipoDeServicios.edit', [$tipoDeServicio->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
