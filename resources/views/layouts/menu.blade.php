<li class="{{ Request::is('probandos*') ? 'active' : '' }}">
    <a href="{!! route('probandos.index') !!}"><i class="fa fa-edit"></i><span>Probandos</span></a>
</li>

<li class="{{ Request::is('tipoDeGastos*') ? 'active' : '' }}">
    <a href="{!! route('tipoDeGastos.index') !!}"><i class="fa fa-edit"></i><span>TipoDeGastos</span></a>
</li>


<li class="{{ Request::is('gastos*') ? 'active' : '' }}">
    <a href="{!! route('gastos.index') !!}"><i class="fa fa-edit"></i><span>Gastos</span></a>
</li>

