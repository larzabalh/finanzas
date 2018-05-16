<?php

namespace App\Http\Controllers;

use App\DataTables\ClienteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Repositories\ClienteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Facturador;
use App\Models\Liquidador;
use App\Models\Cobrador;
use App\Models\Disponibilidad;

class ClienteController extends AppBaseController
{
    /** @var  ClienteRepository */
    private $clienteRepository;

    public function __construct(ClienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the Cliente.
     *
     * @param ClienteDataTable $clienteDataTable
     * @return Response
     */
    public function index(ClienteDataTable $clienteDataTable)
    {
        return $clienteDataTable->render('clientes.index');
    }

    /**
     * Show the form for creating a new Cliente.
     *
     * @return Response
     */
    public function create()
    {
        $Facturadores = Facturador::where('user_id', auth()->user()->id)->pluck('facturador','id','user_id');
        $Liquidadores = Liquidador::where('user_id', auth()->user()->id)->pluck('liquidador','id');
        $Cobradores = Cobrador::where('user_id', auth()->user()->id)->pluck('cobrador','id');
        $Disponibilidades = Disponibilidad::where('user_id', auth()->user()->id)->pluck('nombre','id');
        return view('clientes.create',compact('Facturadores','Liquidadores','Cobradores','Disponibilidades'));
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param CreateClienteRequest $request
     *
     * @return Response
     */
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        Flash::success('Cliente saved successfully.');

        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified Cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('clientes.index'));
        }

        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified Cliente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);
        $Facturadores = Facturador::where('user_id', auth()->user()->id)->pluck('facturador','id','user_id');
        $Liquidadores = Liquidador::where('user_id', auth()->user()->id)->pluck('liquidador','id');
        $Cobradores = Cobrador::where('user_id', auth()->user()->id)->pluck('cobrador','id');
        $Disponibilidades = Disponibilidad::where('user_id', auth()->user()->id)->pluck('nombre','id');
        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('clientes.index'));
        }
        return view('clientes.edit',compact('cliente','Facturadores','Liquidadores','Cobradores','Disponibilidades'));
    }

    /**
     * Update the specified Cliente in storage.
     *
     * @param  int              $id
     * @param UpdateClienteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClienteRequest $request)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('clientes.index'));
        }

        $cliente = $this->clienteRepository->update($request->all(), $id);

        Flash::success('Cliente updated successfully.');

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified Cliente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cliente = $this->clienteRepository->findWithoutFail($id);

        if (empty($cliente)) {
            Flash::error('Cliente not found');

            return redirect(route('clientes.index'));
        }

        $this->clienteRepository->delete($id);

        Flash::success('Cliente deleted successfully.');

        return redirect(route('clientes.index'));
    }
}
