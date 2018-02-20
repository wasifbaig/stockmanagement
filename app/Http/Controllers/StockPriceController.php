<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockPriceRequest;
use App\Http\Requests\UpdateStockPriceRequest;
use App\Repositories\StockPriceRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\ExchangeRepository;
use App\Repositories\StocktypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StockPriceController extends AppBaseController
{
    /** @var  StockPriceRepository */
    private $stockPriceRepository;

    /** @var  CompanyRepository */
    private $companyRepository;

    /** @var  ExchangeRepository */
    private $exchangeRepository;

    /** @var  StocktypeRepository */
    private $stocktypeRepository;

    public function __construct(StockPriceRepository $stockPriceRepo, CompanyRepository $companyRepo, ExchangeRepository $exchangeRepo, StocktypeRepository $stocktypeRepo)
    {
        $this->middleware('auth');

        $this->stockPriceRepository = $stockPriceRepo;
        $this->companyRepository = $companyRepo;
        $this->exchangeRepository = $exchangeRepo;
        $this->stocktypeRepository = $stocktypeRepo;
    }

    /**
     * Display a listing of the StockPrice.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stockPriceRepository->pushCriteria(new RequestCriteria($request));
        $stockPrices = $this->stockPriceRepository->all();


        return view('stock_prices.index')
            ->with('stockPrices', $stockPrices);
    }

    /**
     * Show the form for creating a new StockPrice.
     *
     * @return Response
     */
    public function create()
    {
        $companyListArr = $this->companyRepository->all()->toArray();
        $exchangeListArr = $this->exchangeRepository->all()->toArray();
        $stocktypeListArr = $this->stocktypeRepository->all()->toArray();

        $companyList = [];
        foreach($companyListArr as $cList)
        {
            $companyList[$cList['id']] =  $cList['name'];
        }

        $exchangeList = [];
        foreach($exchangeListArr as $eList)
        {
            $exchangeList[$eList['id']] =  $eList['name'];
        }

        $stocktypeList = [];
        foreach($stocktypeListArr as $stList)
        {
            $stocktypeList[$stList['id']] =  $stList['name'];
        }


        return view('stock_prices.create',['companyList'=>$companyList, 'exchangeList'=>$exchangeList, 'stocktypeList'=>$stocktypeList]);
    }

    /**
     * Store a newly created StockPrice in storage.
     *
     * @param CreateStockPriceRequest $request
     *
     * @return Response
     */
    public function store(CreateStockPriceRequest $request)
    {
        $input = $request->all();

        $stockPrice = $this->stockPriceRepository->create($input);

        Flash::success('Stock Price saved successfully.');

        return redirect(route('stockPrices.index'));
    }

    /**
     * Display the specified StockPrice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockPrice = $this->stockPriceRepository->findWithoutFail($id);

        if (empty($stockPrice)) {
            Flash::error('Stock Price not found');

            return redirect(route('stockPrices.index'));
        }

        return view('stock_prices.show')->with('stockPrice', $stockPrice);
    }

    /**
     * Show the form for editing the specified StockPrice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockPrice = $this->stockPriceRepository->findWithoutFail($id);

        if (empty($stockPrice)) {
            Flash::error('Stock Price not found');

            return redirect(route('stockPrices.index'));
        }

        $companyListArr = $this->companyRepository->all()->toArray();
        $exchangeListArr = $this->exchangeRepository->all()->toArray();
        $stocktypeListArr = $this->stocktypeRepository->all()->toArray();

        $companyList = [];
        foreach($companyListArr as $cList)
        {
            $companyList[$cList['id']] =  $cList['name'];
        }

        $exchangeList = [];
        foreach($exchangeListArr as $eList)
        {
            $exchangeList[$eList['id']] =  $eList['name'];
        }

        $stocktypeList = [];
        foreach($stocktypeListArr as $stList)
        {
            $stocktypeList[$stList['id']] =  $stList['name'];
        }

        $data = ['companyList'=>$companyList, 'exchangeList'=>$exchangeList, 'stockPrice'=>$stockPrice, 'stocktypeList'=>$stocktypeList];
        return view('stock_prices.edit',$data);
    }

    /**
     * Update the specified StockPrice in storage.
     *
     * @param  int              $id
     * @param UpdateStockPriceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockPriceRequest $request)
    {
        $stockPrice = $this->stockPriceRepository->findWithoutFail($id);

        if (empty($stockPrice)) {
            Flash::error('Stock Price not found');

            return redirect(route('stockPrices.index'));
        }

        $stockPrice = $this->stockPriceRepository->update($request->all(), $id);

        Flash::success('Stock Price updated successfully.');

        return redirect(route('stockPrices.index'));
    }

    /**
     * Remove the specified StockPrice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockPrice = $this->stockPriceRepository->findWithoutFail($id);

        if (empty($stockPrice)) {
            Flash::error('Stock Price not found');

            return redirect(route('stockPrices.index'));
        }

        $this->stockPriceRepository->delete($id);

        Flash::success('Stock Price deleted successfully.');

        return redirect(route('stockPrices.index'));
    }



}
