<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class StockPrice
 * @package App\Models
 * @version February 10, 2018, 12:17 pm UTC
 *
 * @property integer company_id
 * @property integer exchange_id
 * @property integer stock_id
 * @property integer price
 */
class StockPrice extends Model
{

    public $table = 'stock_prices';
    


    public $fillable = [
        'company_id',
        'exchange_id',
        'stocktype_id',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id' => 'integer',
        'exchange_id' => 'integer',
        'stocktype_id' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'price' => 'regex:/^(\d*\.)?\d+$/',
        'company_id' => 'required',
        'exchange_id' => 'required',
        'stocktype_id' => 'required'
    ];


    /**
     * Get company data
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }


    /**
     * Get exchange data
     */
    public function exchange()
    {
        return $this->belongsTo('App\Models\Exchange');
    }


    /**
     * Get stocktype data
     */
    public function stocktype()
    {
        return $this->belongsTo('App\Models\Stocktype');
    }


}
