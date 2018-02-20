<?php

namespace App\Repositories;

use App\Models\Stocktype;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StocktypeRepository
 * @package App\Repositories
 * @version February 10, 2018, 7:55 pm UTC
 *
 * @method Stocktype findWithoutFail($id, $columns = ['*'])
 * @method Stocktype find($id, $columns = ['*'])
 * @method Stocktype first($columns = ['*'])
*/
class StocktypeRepository extends BaseRepository
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
        return Stocktype::class;
    }
}
