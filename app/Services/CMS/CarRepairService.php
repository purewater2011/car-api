<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS;


use App\Repositories\Interfaces\RepairRepository;
use App\Services\CMS\Interfaces\CarRepairServiceInterface;

class CarRepairService implements CarRepairServiceInterface{

    protected $repair;

    /**
     * 车维修服务,注入仓库:维修
     * @param RepairRepository $repair
     */
    public function __construct(RepairRepository $repair){
        $this->repair = $repair;
    }

    /**
     * 获取维修信息
     * @param $id
     * @return mixed
     */
    public function getRepair($id)
    {
        try{
            return $this->repair->find($id);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'id:'.$id.'is not found!');
            abort(404, 'id is invalid!');
        }
    }

    /**
     * 获取一辆车的所有维修信息
     * @param $cid
     * @return mixed
     */
    public function getRepairBycid($cid)
    {
        try{
            return $this->repair->findByField('cid', $cid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'cid:'.$cid.'is not found!');
            abort(404, 'cid is invalid!');
        }
    }

    /**
     * 添加维修信息
     * @param array $data
     * @return mixed
     */
    public function addRepair(Array $data)
    {
        return $this->repair->create($data);
    }

    /**
     * 更新维系信息
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateRepair(Array $data, $id)
    {
        try{
            return $this->repair->update($data, $id);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'id:'.$id.'is not found!');
            abort(404, 'id is invalid!');
        }
    }

    /**
     * 更新一辆车下的所有维修信息
     * @param array $data
     * @param $cid
     */
    public function updateRepairBycid(Array $data, $cid)
    {
        try{
            $repairs = $this->repair->findByField('cid', $cid);
            foreach($repairs as $repair){
                $repair->update($data, $repair->id);
            }
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'cid:'.$cid.'is not found!');
            abort(404, 'cid is invalid!');
        }
    }

    /**
     * 删除维修信息
     * @param $id
     * @return int
     */
    public function deleteRepair($id)
    {
        try{
            return $this->repair->delete($id);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'id:'.$id.'is not found!');
            abort(404, 'id is invalid!');
        }
    }

    /**
     * 删除一辆车下的所有维修信息
     * @param $cid
     */
    public function deleteRepairBycid($cid)
    {
        $repairs = $this->repair->findByField('cid', $cid);
        foreach($repairs as $repair){
            $repair->delete();
        }
    }
}