<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStocktypeRequest;
use App\Http\Requests\UpdateStocktypeRequest;
use App\Repositories\StocktypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StocktypeController extends AppBaseController
{
    /** @var  StocktypeRepository */
    private $stocktypeRepository;

    public function __construct(StocktypeRepository $stocktypeRepo)
    {
        $this->middleware('auth');

        $this->stocktypeRepository = $stocktypeRepo;
    }

    /**
     * Display a listing of the Stocktype.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stocktypeRepository->pushCriteria(new RequestCriteria($request));
        $stocktypes = $this->stocktypeRepository->all();

        return view('stocktypes.index')
            ->with('stocktypes', $stocktypes);
    }

    /**
     * Show the form for creating a new Stocktype.
     *
     * @return Response
     */
    public function create()
    {
        return view('stocktypes.create');
    }

    /**
     * Store a newly created Stocktype in storage.
     *
     * @param CreateStocktypeRequest $request
     *
     * @return Response
     */
    public function store(CreateStocktypeRequest $request)
    {
        $input = $request->all();

        $stocktype = $this->stocktypeRepository->create($input);

        Flash::success('Stocktype saved successfully.');

        return redirect(route('stocktypes.index'));
    }

    /**
     * Display the specified Stocktype.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stocktype = $this->stocktypeRepository->findWithoutFail($id);

        if (empty($stocktype)) {
            Flash::error('Stocktype not found');

            return redirect(route('stocktypes.index'));
        }

        return view('stocktypes.show')->with('stocktype', $stocktype);
    }

    /**
     * Show the form for editing the specified Stocktype.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stocktype = $this->stocktypeRepository->findWithoutFail($id);

        if (empty($stocktype)) {
            Flash::error('Stocktype not found');

            return redirect(route('stocktypes.index'));
        }

        return view('stocktypes.edit')->with('stocktype', $stocktype);
    }

    /**
     * Update the specified Stocktype in storage.
     *
     * @param  int              $id
     * @param UpdateStocktypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStocktypeRequest $request)
    {
        $stocktype = $this->stocktypeRepository->findWithoutFail($id);

        if (empty($stocktype)) {
            Flash::error('Stocktype not found');

            return redirect(route('stocktypes.index'));
        }

        $stocktype = $this->stocktypeRepository->update($request->all(), $id);

        Flash::success('Stocktype updated successfully.');

        return redirect(route('stocktypes.index'));
    }

    /**
     * Remove the specified Stocktype from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stocktype = $this->stocktypeRepository->findWithoutFail($id);

        if (empty($stocktype)) {
            Flash::error('Stocktype not found');

            return redirect(route('stocktypes.index'));
        }

        $this->stocktypeRepository->delete($id);

        Flash::success('Stocktype deleted successfully.');

        return redirect(route('stocktypes.index'));
    }
}
