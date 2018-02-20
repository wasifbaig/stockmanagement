<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Stocktype
 * @package App\Models
 * @version February 10, 2018, 7:55 pm UTC
 *
 * @property string name
 */
class Stocktype extends Model
{

    public $table = 'stocktypes';
    


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
