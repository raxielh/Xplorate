<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PersonaCategoria
 * @package App\Models
 * @version August 6, 2018, 7:56 pm UTC
 *
 * @property string cedula
 * @property string tipoempleado
 * @property string acad_prog
 * @property string cargo
 * @property string campus
 * @property string nombres
 */
class PersonaCategoria extends Model
{

    public $table = 'b_persona_categoria';
    


    public $fillable = [
        'persona_categoria',
        'cedula',
        'tipoempleado',
        'acad_prog',
        'cargo',
        'campus',
        'nombres'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cedula' => 'string',
        'tipoempleado' => 'string',
        'acad_prog' => 'string',
        'cargo' => 'string',
        'campus' => 'string',
        'nombres' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cedula' => 'required',
        'tipoempleado' => 'required',
        'acad_prog' => 'required',
        'cargo' => 'required',
        'campus' => 'required',
        'nombres' => 'required'
    ];
/*
    public function scopeName($query, $name)
    {
        if($name != ""){
            return $query->where('nombres',"LIKE","%$name%")->orWhere('cedula',"LIKE","%$name%");
        }
        
    }
*/
    
}
