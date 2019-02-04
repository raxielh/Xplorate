<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Categoria
 * @package App\Models
 * @version June 1, 2018, 1:37 am UTC
 *
 * @property char titulo
 * @property char desc
 * @property integer orden
 */
class TipoPregungta extends Model
{
    

    public $table = 'tipo_pregunta';
    

    


    public $fillable = [
        'descripcion',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'descripcion' => 'required'
    ];

    
}
