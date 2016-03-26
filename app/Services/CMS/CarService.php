<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS;


use App\Repositories\Interfaces\CarRepository;
use App\Services\CMS\Interfaces\CarServiceInterface;
use Carbon\Carbon;
use Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CarService implements CarServiceInterface{

    protected $car;

    /**
     * 汽车服务
     * @param CarRepository $car
     */
    public function __construct(CarRepository $car){
        $this->car = $car;
    }

    /**
     * 获取一辆车的详细信息
     * @param $cid
     * @return mixed
     */
    public function getOneBycid($cid)
    {
        try{
            return $this->car->find($cid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'id:'.$cid.'is not found!');
            abort(404, 'id is invalid!');
        }
    }

    /**
     * 获取某个店铺下,汽车信息列表
     * @param $sid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getListBysid($sid, $page = 1, $size = self::SIZE)
    {
        try{
            return $this->car->findByField('sid', $sid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'sid:'.$sid.'is not found!');
            abort(404, 'sid is invalid!');
        }
    }

    /**
     * 根据车型,获取车信息列表
     * @param $tid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getListBytid($tid, $page = 1, $size = self::SIZE)
    {
        try{
            return $this->car->findByField('tid', $tid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'tid:'.$tid.'is not found!');
            abort(404, 'tid is invalid!');
        }
    }

    /**
     * 根据查询条件,查询车列表信息
     * @param $where
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getListBywhere($where, $page = 1, $size = self::SIZE)
    {
        try{
            return $this->car->findWhere($where);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'where:'.var_export($where, true).'is not found!');
            abort(404, 'condition is invalid!');
        }
    }

    /**
     * 添加车信息
     * @param CarRepository $car
     * @return mixed
     */
    public function add(CarRepository $car)
    {
        return $this->car->create($car->toArray());
    }

    /**
     * 一次添加多辆信息
     * @param array $cars
     * @return array
     */
    public function addList(Array $cars)
    {
        foreach($cars as $car){
            $result[] = $this->car->create($car);
        }
        return $result;
    }

    /**
     * 更新车信息
     * @param array $data
     * @param $cid
     * @return mixed
     */
    public function update(Array $data, $cid)
    {
        try{
            return $this->car->update($data, $cid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'id:'.$cid.'is not found!');
            abort(404, 'id is invalid!');
        }
    }

    public function updateList(Array $data, Array $cids)
    {
        // TODO: Implement updateList() method.
    }

    /**
     * 删除车信息
     * @param $cid
     * @return int
     */
    public function deleteBycid($cid)
    {
        return $this->car->delete($cid);
    }

    public function deleteBysid(Array $sids)
    {
        // TODO: Implement deleteBysid() method.
    }

    public function forcedeleteBycid(Array $cids)
    {
        // TODO: Implement forcedeleteBycid() method.
    }

    public function forcedeleteBysid(Array $sids)
    {
        // TODO: Implement forcedeleteBysid() method.
    }
}