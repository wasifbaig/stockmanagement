<?php

namespace App\Repositories;

use App\Models\StockPrice;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StockPriceRepository
 * @package App\Repositories
 * @version February 10, 2018, 12:17 pm UTC
 *
 * @method StockPrice findWithoutFail($id, $columns = ['*'])
 * @method StockPrice find($id, $columns = ['*'])
 * @method StockPrice first($columns = ['*'])
*/
class StockPriceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'exchange_id',
        'stocktype_id',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StockPrice::class;
    }
}
