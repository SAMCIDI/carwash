<div class="table-responsive">
    <table class="table" id="estadoServicios-table">
        <thead>
            <tr>
                <th>Estado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estadoServicios as $estadoServicios)
            <tr>
                <td>{{ $estadoServicios->estado }}</td>
                <td>
                    {!! Form::open(['route' => ['estadoServicios.destroy', $estadoServicios->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estadoServicios.show', [$estadoServicios->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('estadoServicios.edit', [$estadoServicios->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
