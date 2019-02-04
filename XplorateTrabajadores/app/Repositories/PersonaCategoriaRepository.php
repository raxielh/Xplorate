<?php

namespace App\Repositories;

use App\Models\PersonaCategoria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PersonaCategoriaRepository
 * @package App\Repositories
 * @version August 6, 2018, 7:56 pm UTC
 *
 * @method PersonaCategoria findWithoutFail($id, $columns = ['*'])
 * @method PersonaCategoria find($id, $columns = ['*'])
 * @method PersonaCategoria first($columns = ['*'])
*/
class PersonaCategoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cedula',
        'tipoempleado',
        'acad_prog',
        'cargo',
        'campus',
        'nombres'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PersonaCategoria::class;
    }
}
