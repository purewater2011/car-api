<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS;


use App\Repositories\Interfaces\OwnerRepository;
use App\Services\CMS\Interfaces\CarOwnerServiceInterface;

class CarOwnerService implements CarOwnerServiceInterface{

    protected $owner;

    /**
     * 车主服务,初始化,注入仓库:车主
     * @param OwnerRepository $owner
     */
    public function __construct(OwnerRepository $owner){
        $this->owner = $owner;
    }

    /**
     * 获取车主信息
     * @param $id
     * @return mixed
     */
    public function getOwner($id)
    {
        try{
            return $this->owner->find($id);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'id:'.$id.'is not found!');
            abort(404, 'id is invalid!');
        }
    }

    /**
     * 添加车主信息
     * @param array $data
     * @return mixed
     */
    public function addOwner(Array $data)
    {
        return $this->owner->create($data);
    }

    /**
     * 更新车主信息
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateOwner(Array $data, $id)
    {
        try{
            return $this->owner->update($data, $id);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'id:'.$id.'is not found!');
            abort(404, 'id is invalid!');
        }
    }

    /**
     * 删除车主信息
     * @param $id
     * @return int
     */
    public function deleteOwner($id)
    {
        try{
            return $this->owner->delete($id);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'id:'.$id.'is not found!');
            abort(404, 'id is invalid!');
        }
    }
}