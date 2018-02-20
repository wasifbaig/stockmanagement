<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Exchange
 * @package App\Models
 * @version February 10, 2018, 12:08 pm UTC
 *
 * @property string name
 */
class Exchange extends Model
{

    public $table = 'exchanges';
    


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
