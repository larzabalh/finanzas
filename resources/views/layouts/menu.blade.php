<li class="{{ Request::is('tipoDeGastos*') ? 'active' : '' }}">
    <a href="{!! route('tipoDeGastos.index') !!}"><i class="fa fa-edit"></i><span>TipoDeGastos</span></a>
</li>


<li class="{{ Request::is('gastos*') ? 'active' : '' }}">
    <a href="{!! route('gastos.index') !!}"><i class="fa fa-edit"></i><span>Gastos</span></a>
</li>

<li class="{{ Request::is('facturadors*') ? 'active' : '' }}">
    <a href="{!! route('facturadors.index') !!}"><i class="fa fa-edit"></i><span>Facturadors</span></a>
</li>

<li class="{{ Request::is('liquidadors*') ? 'active' : '' }}">
    <a href="{!! route('liquidadors.index') !!}"><i class="fa fa-edit"></i><span>Liquidadors</span></a>
</li>

<li class="{{ Request::is('medios*') ? 'active' : '' }}">
    <a href="{!! route('medios.index') !!}"><i class="fa fa-edit"></i><span>Medios</span></a>
</li>

<li class="{{ Request::is('disponibilidads*') ? 'active' : '' }}">
    <a href="{!! route('disponibilidads.index') !!}"><i class="fa fa-edit"></i><span>Disponibilidads</span></a>
</li>

