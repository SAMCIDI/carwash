<div class="table-responsive">
    <table class="table" id="estadoFacturas-table">
        <thead>
            <tr>
                <th>Estado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estadoFacturas as $estadoFactura)
            <tr>
                <td>{{ $estadoFactura->estado }}</td>
                <td>
                    {!! Form::open(['route' => ['estadoFacturas.destroy', $estadoFactura->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estadoFacturas.show', [$estadoFactura->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('estadoFacturas.edit', [$estadoFactura->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
