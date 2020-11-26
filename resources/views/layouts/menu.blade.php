
<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{{ route('personas.index') }}"><i class="fa fa-edit"></i><span>Personas</span></a>
</li>

<li class="{{ Request::is('marcas*') ? 'active' : '' }}">
    <a href="{{ route('marcas.index') }}"><i class="fa fa-edit"></i><span>Marcas</span></a>
</li>

<li class="{{ Request::is('tipoIdentificacions*') ? 'active' : '' }}">
    <a href="{{ route('tipoIdentificacions.index') }}"><i class="fa fa-edit"></i><span>Tipo Identificacions</span></a>
</li>

<li class="{{ Request::is('estadoServicios*') ? 'active' : '' }}">
    <a href="{{ route('estadoServicios.index') }}"><i class="fa fa-edit"></i><span>Estado Servicios</span></a>
</li>

<li class="{{ Request::is('estadoPersonas*') ? 'active' : '' }}">
    <a href="{{ route('estadoPersonas.index') }}"><i class="fa fa-edit"></i><span>Estado Personas</span></a>
</li>

<li class="{{ Request::is('tipoDeServicios*') ? 'active' : '' }}">
    <a href="{{ route('tipoDeServicios.index') }}"><i class="fa fa-edit"></i><span>Tipo De Servicios</span></a>
</li>

<li class="{{ Request::is('estadoFacturas*') ? 'active' : '' }}">
    <a href="{{ route('estadoFacturas.index') }}"><i class="fa fa-edit"></i><span>Estado Facturas</span></a>
</li>

<li class="{{ Request::is('tipoPersonas*') ? 'active' : '' }}">
    <a href="{{ route('tipoPersonas.index') }}"><i class="fa fa-edit"></i><span>Tipo Personas</span></a>
</li>

<li class="{{ Request::is('services*') ? 'active' : '' }}">
    <a href="{{ route('services.index') }}"><i class="fa fa-edit"></i><span>Services</span></a>
</li>

