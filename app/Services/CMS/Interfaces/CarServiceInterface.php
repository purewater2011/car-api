<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS\Interfaces;


use App\Repositories\Interfaces\CarRepository;

Interface CarServiceInterface {

    const SIZE = 15;

    public function getOneBycid($cid);

    public function getListBysid($sid, $page = 1, $size = self::SIZE);

//    public function getListByoid($oid, $page = 1, $size = self::SIZE);

    public function getListBytid($tid, $page = 1, $size = self::SIZE);

    public function getListBywhere($where, $page = 1, $size = self::SIZE);

    public function add(CarRepository $car);

    public function addList(Array $cars);

    public function update(Array $data, $cid);

    public function updateList(Array $data, Array $cids);

    public function deleteBycid($cid);

    public function deleteBysid(Array $sids);

    public function forcedeleteBycid(Array $cids);

    public function forcedeleteBysid(Array $sids);


/*    public function getListCommentByuid($uid);

    public function getCommentByuidAndcid($uid, $cid);

    public function getListCommentBycid($cid);*/
}