<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS;


use App\Repositories\Interfaces\CarCommentRepository;
use App\Repositories\Interfaces\ShopCommentRepository;
use App\Services\CMS\Interfaces\CommentServiceInterface;

class CommentService implements CommentServiceInterface{

    protected $carcomment;
    protected $shopcomment;

    /**
     * 评论服务,注入仓库:汽车评论,店铺评论
     * @param CarCommentRepository $carcomment
     * @param ShopCommentRepository $shopcomment
     */
    public function __construct(CarCommentRepository $carcomment, ShopCommentRepository $shopcomment){
        $this->carcomment = $carcomment;
        $this->shopcomment = $shopcomment;
    }

    /**
     * 获取店铺评论列表
     * @param $sid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getListBysid($sid, $page = 1, $size = self::SIZE)
    {
        return $this->shopcomment->findByField('sid', $sid)->paginate($size);
    }

    public function getListBycid($cid, $page = 1, $size = self::SIZE)
    {
        return $this->carcomment->findByField('cid', $cid)->paginate($size);
    }

    public function getCarCommentListByuid($uid, $page = 1, $size = self::SIZE)
    {
        return $this->carcomment->findByField('uid', $uid)->paginate($size);
    }

    public function getCarCommentListByuidAndcid($uid, $cid, $page = 1, $size = self::SIZE)
    {
        $condition = [
            'uid' => $uid,
            'cid' => $cid
        ];
        return $this->carcomment->findWhere($condition)->paginate($size);
    }

    public function getShopCommentListByuid($uid, $page = 1, $size = self::SIZE)
    {
        return $this->shopcomment->findByField('uid', $uid)->paginate($size);
    }

    public function getShopCommentListByuidAndsid($uid, $sid, $page = 1, $size = self::SIZE)
    {
        $condition = [
            'uid' => $uid,
            'sid' => $sid
        ];
        return $this->shopcomment->findWhere($condition)->paginate($size);
    }

    public function getListBysids(Array $sids, $page = 1, $size = self::SIZE)
    {
        // TODO: Implement getListBysids() method.
    }

    public function getListBycids(Array $cids, $page = 1, $size = self::SIZE)
    {
        // TODO: Implement getListBycids() method.
    }

    public function addBycid(Array $data, $cid, $uid, $pid = 0)
    {
        $array = [
            'cid' => $cid,
            'uid' => $uid
        ];
        $data = array_merge($data, $array);
        return $this->carcomment->create($data);
    }

    public function addBysid(Array $data, $sid, $uid, $pid = 0)
    {
        $array = [
            'sid' => $sid,
            'uid' => $uid
        ];
        $data = array_merge($data, $array);
        return $this->shopcomment->create($data);
    }

    public function updateCarCommentByid(Array $data, $id)
    {
        return $this->carcomment->update($data, $id);
    }

    public function updateShopCommentByid(Array $data, $id)
    {
        return $this->shopcomment->update($data, $id);
    }

    public function deleteCarComment($id)
    {
        return $this->carcomment->delete($id);
    }

    public function deleteShopComment($id)
    {
        return $this->shopcomment->delete($id);
    }

    public function deleteBycid(Array $cids)
    {
        // TODO: Implement deleteBycid() method.
    }

    public function deleteBysid(Array $sids)
    {
        // TODO: Implement deleteBysid() method.
    }

    public function deleteCarCommentByuid(Array $uids)
    {
        // TODO: Implement deleteCarCommentByuid() method.
    }

    public function deleteShopCommentByuid(Array $uids)
    {
        // TODO: Implement deleteShopCommentByuid() method.
    }
}