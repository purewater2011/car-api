<?php

namespace App\Repositories\Core;

use App\Presenters\UserPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\Models\User;
use Prettus\Repository\Traits\CacheableRepository;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use CacheableRepository;

    protected $fieldSearchable = [
        'name', 'email', 'telphone', 'qq'
    ];

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'email' => 'email'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required'
        ]
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public static function getModel()
    {
        return User::class;
    }
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return UserPresenter::class;
    }
}
