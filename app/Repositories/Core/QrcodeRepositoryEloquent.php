<?php

namespace App\Repositories\Core;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\QrcodeRepository;
use App\Repositories\Models\Qrcode;

/**
 * Class QrcodeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class QrcodeRepositoryEloquent extends BaseRepository implements QrcodeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Qrcode::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
