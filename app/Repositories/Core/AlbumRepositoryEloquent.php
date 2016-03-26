<?php

namespace App\Repositories\Core;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\AlbumRepository;
use App\Repositories\Models\Album;

/**
 * Class AlbumRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AlbumRepositoryEloquent extends BaseRepository implements AlbumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Album::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
