<?php

namespace App\Repositories;

use App\Models\Nomination;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NominationRepository
 * @package App\Repositories
 * @version February 25, 2018, 12:11 pm UTC
 *
 * @method Nomination findWithoutFail($id, $columns = ['*'])
 * @method Nomination find($id, $columns = ['*'])
 * @method Nomination first($columns = ['*'])
*/
class NominationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image',
        'gender',
        'linkedin_url',
        'bio',
        'business_name',
        'reason_for_nomination',
        'no_of_nominations',
        'is_admin_selected',
        'is_won',
        'user_id',
        'category_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Nomination::class;
    }
}
