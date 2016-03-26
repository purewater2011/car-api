<?php

namespace App\Repositories\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use App\Repositories\Models\User;

/**
 * Class UserTransformer
 * @package namespace App\Repositories\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * Transform the \User entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'name'       => $model->name,
            'email'      => $model->email,
            'telphone'   => $model->telphone,
            'qq'         => (int) $model->qq,
            'wechat'     => $model->wechat,

            'created_at' => is_numeric($model->created_at) ? Carbon::createFromTimestamp($model->created_at) : $model->created_at,
            'updated_at' => is_numeric($model->updated_at) ? Carbon::createFromTimestamp($model->updated_at) : $model->created_at
        ];
    }
}
