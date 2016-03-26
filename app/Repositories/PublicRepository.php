<?php
/**
 * author: Eric.chen
 * Date: 16/2/23
 * Description:
 */

namespace App\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;

abstract class PublicRepository extends BaseRepository {
    public function findOrFail($id, $columns = ['*']){
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();
        return $this->parserResult($model);
    }
}