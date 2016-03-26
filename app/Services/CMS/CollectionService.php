<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS;


use App\Repositories\Interfaces\CarCollectionRepository;
use App\Repositories\Interfaces\ShopCollectionRepository;
use App\Repositories\Modules\Cms\CarCollectionRepositoryEloquent;
use App\Services\CMS\Interfaces\CollectionServiceInterface;

class CollectionService implements CollectionServiceInterface{

    protected $carcollection;
    protected $shopcollection;

    /**
     * 收藏服务,注入仓库:汽车收藏,店铺收藏
     * @param CarCollectionRepository $carcollection
     * @param ShopCollectionRepository $shopcollection
     */
    public function __construct(CarCollectionRepository $carcollection, ShopCollectionRepository $shopcollection){
        $this->carcollection = $carcollection;
        $this->shopcollection = $shopcollection;
    }

    /**
     * 获取店铺收藏列表
     * @param $sid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getListBysid($sid, $page = 1, $size = self::SIZE)
    {
        return $this->shopcollection->findByField('sid', $sid)->paginate($size);
    }

    /**
     * 获取车辆收藏列表
     * @param $cid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getListBycid($cid, $page = 1, $size = self::SIZE)
    {
        return $this->carcollection->findByField('cid', $cid)->paginate($size);
    }

    /**
     * 根据用户查询汽车收藏列表
     * @param $uid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getCarCollectionListByuid($uid, $page = 1, $size = self::SIZE)
    {
        return $this->carcollection->findByField('uid', $uid)->paginate($size);
    }

    /**
     * 根据用户和汽车获取收藏信息
     * @param $uid
     * @param $cid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getCarCollectionListByuidAndcid($uid, $cid, $page = 1, $size = self::SIZE)
    {
        $condition = [
            'uid' => $uid,
            'cid' => $cid
        ];
        return $this->carcollection->findWhere($condition)->paginate($size);
    }

    /**
     * 根据用户,获取店铺收藏信息
     * @param $uid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getShopCollectionListByuid($uid, $page = 1, $size = self::SIZE)
    {
        return $this->shopcollection->findByField('uid', $uid)->paginate($size);

    }

    /**
     * 根据用户和店铺,获取店铺的收藏信息
     * @param $uid
     * @param $sid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getShopCollectionListByuidAndsid($uid, $sid, $page = 1, $size = self::SIZE)
    {
        $condition = [
            'uid' => $uid,
            'sid' => $sid
        ];
        return $this->shopcollection->findWhere($condition)->paginate($size);
    }

    public function getListBysids(Array $sids, $page = 1, $size = self::SIZE)
    {
        // TODO: Implement getListBysids() method.
    }

    public function getListBycids(Array $cids, $page = 1, $size = self::SIZE)
    {
        // TODO: Implement getListBycids() method.
    }

    /**
     * 添加汽车收藏
     * @param array $data
     * @param $cid
     * @param $uid
     * @param int $pid
     * @return mixed
     */
    public function addBycid(Array $data, $cid, $uid, $pid = 0)
    {
        $array = [
            'cid' => $cid,
            'uid' => $uid
        ];
        $data = array_merge($data, $array);
        return $this->carcollection->create($data);
    }

    /**
     * 添加店铺收藏
     * @param array $data
     * @param $sid
     * @param $uid
     * @param int $pid
     * @return mixed
     */
    public function addBysid(Array $data, $sid, $uid, $pid = 0)
    {
        $array = [
            'sid' => $sid,
            'uid' => $uid
        ];
        $data = array_merge($data, $array);
        return $this->shopcollection->create($data);
    }

    /**
     * 更新汽车收藏
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateCarCollectionByid(Array $data, $id)
    {
        return $this->carcollection->update($data, $id);
    }

    /**
     * 更细店铺收藏
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateShopCollectionByid(Array $data, $id)
    {
        return $this->shopcollection->update($data, $id);
    }

    public function updateByid(Array $data, $id)
    {
        // TODO: Implement updateByid() method.
    }

    /**
     * 删除车辆收藏
     * @param $id
     * @return int
     */
    public function deleteCarCollection($id)
    {
        return $this->carcollection->delete($id);
    }

    /**
     * 删除店铺收藏
     * @param $id
     * @return int
     */
    public function deleteShopCollection($id)
    {
        return $this->shopcollection->delete($id);
    }

    /**
     * 删除某车所有收藏信息
     * @param array $cids
     */
    public function deleteBycid(Array $cids)
    {
        // TODO: Implement deleteBycid() method.
    }

    public function deleteBysid(Array $sids)
    {
        // TODO: Implement deleteBysid() method.
    }

    public function deleteCarCollectionByuid(Array $uids)
    {
        // TODO: Implement deleteCarCollectionByuid() method.
    }

    public function deleteShopCollectionByuid(Array $uids)
    {
        // TODO: Implement deleteShopCollectionByuid() method.
    }
}