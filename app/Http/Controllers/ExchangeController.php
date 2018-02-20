<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExchangeRequest;
use App\Http\Requests\UpdateExchangeRequest;
use App\Repositories\ExchangeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ExchangeController extends AppBaseController
{
    /** @var  ExchangeRepository */
    private $exchangeRepository;

    public function __construct(ExchangeRepository $exchangeRepo)
    {
        $this->middleware('auth');
        $this->exchangeRepository = $exchangeRepo;
    }

    /**
     * Display a listing of the Exchange.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->exchangeRepository->pushCriteria(new RequestCriteria($request));
        $exchanges = $this->exchangeRepository->all();

        return view('exchanges.index')
            ->with('exchanges', $exchanges);
    }

    /**
     * Show the form for creating a new Exchange.
     *
     * @return Response
     */
    public function create()
    {
        return view('exchanges.create');
    }

    /**
     * Store a newly created Exchange in storage.
     *
     * @param CreateExchangeRequest $request
     *
     * @return Response
     */
    public function store(CreateExchangeRequest $request)
    {
        $input = $request->all();

        $exchange = $this->exchangeRepository->create($input);

        Flash::success('Exchange saved successfully.');

        return redirect(route('exchanges.index'));
    }

    /**
     * Display the specified Exchange.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $exchange = $this->exchangeRepository->findWithoutFail($id);

        if (empty($exchange)) {
            Flash::error('Exchange not found');

            return redirect(route('exchanges.index'));
        }

        return view('exchanges.show')->with('exchange', $exchange);
    }

    /**
     * Show the form for editing the specified Exchange.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $exchange = $this->exchangeRepository->findWithoutFail($id);

        if (empty($exchange)) {
            Flash::error('Exchange not found');

            return redirect(route('exchanges.index'));
        }

        return view('exchanges.edit')->with('exchange', $exchange);
    }

    /**
     * Update the specified Exchange in storage.
     *
     * @param  int              $id
     * @param UpdateExchangeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExchangeRequest $request)
    {
        $exchange = $this->exchangeRepository->findWithoutFail($id);

        if (empty($exchange)) {
            Flash::error('Exchange not found');

            return redirect(route('exchanges.index'));
        }

        $exchange = $this->exchangeRepository->update($request->all(), $id);

        Flash::success('Exchange updated successfully.');

        return redirect(route('exchanges.index'));
    }

    /**
     * Remove the specified Exchange from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $exchange = $this->exchangeRepository->findWithoutFail($id);

        if (empty($exchange)) {
            Flash::error('Exchange not found');

            return redirect(route('exchanges.index'));
        }

        $this->exchangeRepository->delete($id);

        Flash::success('Exchange deleted successfully.');

        return redirect(route('exchanges.index'));
    }




}
