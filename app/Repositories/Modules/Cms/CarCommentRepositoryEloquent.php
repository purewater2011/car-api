<?php

namespace App\Repositories\Modules\Cms;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CarCommentRepository;
use App\Repositories\Models\CarComment;

/**
 * Class CarCommentRepositoryEloquent
 * @package namespace App\Repositories\Modules\Cms;
 */
class CarCommentRepositoryEloquent extends BaseRepository implements CarCommentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CarComment::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
