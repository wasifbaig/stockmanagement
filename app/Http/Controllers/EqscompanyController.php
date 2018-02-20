<?php
/**
 * Created by PhpStorm.
 * User: wasif baig
 * Date: 11/02/2018
 * Time: 13:42
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExchangeDataRequest;
use App\Repositories\StockPriceRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\ExchangeRepository;
use App\Repositories\StocktypeRepository;
use Illuminate\Http\Request;


class EqscompanyController extends Controller
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
     * Exchange wise data
     * param $request ExchangeDataRequest
     * @return Response
     */
    public function exchangeData(ExchangeDataRequest $request)
    {
        $input = $request->all();
        $exchange_id = $input['exchange_id'] ?? '';

       if( empty($exchange_id))
        {
            $exchange_id = $this->exchangeRepository->first()->id;
        }


        $stockPrices = $this->stockPriceRepository->all()->where('exchange_id',$exchange_id);


        $exchangeListArr = $this->exchangeRepository->all()->toArray();

        $exchangeList = [];
        foreach($exchangeListArr as $eList)
        {
            $exchangeList[$eList['id']] =  $eList['name'];
        }

        $data = ['stockPrices' => $stockPrices, 'exchangeList'=>$exchangeList];

        return view('eqscompany.exchangeData',$data);


    }


    /**
     * Company Stock Overview
     *
     * @return Response
     */
    public function companyStockOverview()
    {

        $companyList = $this->companyRepository->all();

        $companyStockList = array();
        foreach($companyList as $company)
        {

            $stockTypeGroup = $company->stockprice->groupBy('stocktype_id');

            foreach($stockTypeGroup as $stockTypeId=>$stockPriceData)
            {

                $arr = array();

                $arr['company'] = $company;
                $arr['stockType'] = $this->stocktypeRepository->findWithoutFail($stockTypeId);
                $arr['stockPriceData'] = $stockPriceData;

                array_push($companyStockList, $arr);
            }


        }


        $data = ['companyStockList'=>$companyStockList];
        return view('eqscompany.companyStockOverview',$data);


    }


    /**
     * Highest Market Price
     *
     * @return Response
     */
    public function highestMarketPrice()
    {

        $companyList = $this->companyRepository->all();

        $companyStockList = array();
        foreach($companyList as $company)
        {

            $stockTypeGroup = $company->stockprice->groupBy('stocktype_id');

            foreach($stockTypeGroup as $stockTypeId=>$stockPriceData)
            {

                $arr = array();

                $arr['company'] = $company;
                $arr['stockType'] = $this->stocktypeRepository->findWithoutFail($stockTypeId);
                $arr['stockPriceData'] = $stockPriceData->where('price',$stockPriceData->max('price'))->first();

                array_push($companyStockList, $arr);
            }


        }


        $data = ['companyStockList'=>$companyStockList];
        return view('eqscompany.highestMarketPrice',$data);


    }



}