<?php

namespace App\Repositories;

use App\Models\Exchange;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ExchangeRepository
 * @package App\Repositories
 * @version February 10, 2018, 12:08 pm UTC
 *
 * @method Exchange findWithoutFail($id, $columns = ['*'])
 * @method Exchange find($id, $columns = ['*'])
 * @method Exchange first($columns = ['*'])
*/
class ExchangeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Exchange::class;
    }
}
