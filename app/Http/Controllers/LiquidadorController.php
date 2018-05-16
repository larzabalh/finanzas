<?php

namespace App\Http\Controllers;

use App\DataTables\LiquidadorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLiquidadorRequest;
use App\Http\Requests\UpdateLiquidadorRequest;
use App\Repositories\LiquidadorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LiquidadorController extends AppBaseController
{
    /** @var  LiquidadorRepository */
    private $liquidadorRepository;

    public function __construct(LiquidadorRepository $liquidadorRepo)
    {
        $this->liquidadorRepository = $liquidadorRepo;
    }

    /**
     * Display a listing of the Liquidador.
     *
     * @param LiquidadorDataTable $liquidadorDataTable
     * @return Response
     */
    public function index(LiquidadorDataTable $liquidadorDataTable)
    {
        return $liquidadorDataTable->render('liquidadors.index');
    }

    /**
     * Show the form for creating a new Liquidador.
     *
     * @return Response
     */
    public function create()
    {
        return view('liquidadors.create');
    }

    /**
     * Store a newly created Liquidador in storage.
     *
     * @param CreateLiquidadorRequest $request
     *
     * @return Response
     */
    public function store(CreateLiquidadorRequest $request)
    {
        $input = $request->all();

        $liquidador = $this->liquidadorRepository->create($input);

        Flash::success('Liquidador saved successfully.');

        return redirect(route('liquidadors.index'));
    }

    /**
     * Display the specified Liquidador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $liquidador = $this->liquidadorRepository->findWithoutFail($id);

        if (empty($liquidador)) {
            Flash::error('Liquidador not found');

            return redirect(route('liquidadors.index'));
        }

        return view('liquidadors.show')->with('liquidador', $liquidador);
    }

    /**
     * Show the form for editing the specified Liquidador.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $liquidador = $this->liquidadorRepository->findWithoutFail($id);

        if (empty($liquidador)) {
            Flash::error('Liquidador not found');

            return redirect(route('liquidadors.index'));
        }

        return view('liquidadors.edit')->with('liquidador', $liquidador);
    }

    /**
     * Update the specified Liquidador in storage.
     *
     * @param  int              $id
     * @param UpdateLiquidadorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLiquidadorRequest $request)
    {
        $liquidador = $this->liquidadorRepository->findWithoutFail($id);

        if (empty($liquidador)) {
            Flash::error('Liquidador not found');

            return redirect(route('liquidadors.index'));
        }

        $liquidador = $this->liquidadorRepository->update($request->all(), $id);

        Flash::success('Liquidador updated successfully.');

        return redirect(route('liquidadors.index'));
    }

    /**
     * Remove the specified Liquidador from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $liquidador = $this->liquidadorRepository->findWithoutFail($id);

        if (empty($liquidador)) {
            Flash::error('Liquidador not found');

            return redirect(route('liquidadors.index'));
        }

        $this->liquidadorRepository->delete($id);

        Flash::success('Liquidador deleted successfully.');

        return redirect(route('liquidadors.index'));
    }
}
