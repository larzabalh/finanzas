<li>
    <a href="/">
      <i class="fa fa-tasks"></i> <span>Escritorio</span>
    </a>
    <a href="{!! route('importar.index') !!}">
      <i class="fa fa-tasks"></i> <span>IMPORTAR</span>
    </a>
</li>
<li class="treeview">
	<a href="#">
	  <i class="fa fa-laptop"></i>
	  <span>Configuracion</span>
	  <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
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

		<li class="{{ Request::is('formaDePagos*') ? 'active' : '' }}">
		    <a href="{!! route('formaDePagos.index') !!}"><i class="fa fa-edit"></i><span>FormaDePagos</span></a>
		</li>

		<li class="{{ Request::is('cobradors*') ? 'active' : '' }}">
		    <a href="{!! route('cobradors.index') !!}"><i class="fa fa-edit"></i><span>Cobradors</span></a>
		</li>
		<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
		    <a href="{!! route('clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
		</li>
	</ul>
</li>



