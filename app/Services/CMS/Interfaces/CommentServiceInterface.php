<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS\Interfaces;


Interface CommentServiceInterface {

    const SIZE = 15;

    public function getListBysid($sid, $page = 1, $size = self::SIZE);

    public function getListBycid($cid, $page = 1, $size = self::SIZE);

    public function getCarCommentListByuid($uid, $page = 1, $size = self::SIZE);

    public function getCarCommentListByuidAndcid($uid, $cid, $page = 1, $size = self::SIZE);

    public function getShopCommentListByuid($uid, $page = 1, $size = self::SIZE);

    public function getShopCommentListByuidAndsid($uid, $sid, $page = 1, $size = self::SIZE);

    public function getListBysids(Array $sids, $page = 1, $size = self::SIZE);

    public function getListBycids(Array $cids, $page = 1, $size = self::SIZE);

    public function addBycid(Array $data, $cid, $uid, $pid = 0);

    public function addBysid(Array $data, $sid, $uid, $pid = 0);

    public function updateCarCommentByid(Array $data, $id);

    public function updateShopCommentByid(Array $data, $id);

    public function deleteCarComment($id);

    public function deleteShopComment($id);

    public function deleteBycid(Array $cids);

    public function deleteBysid(Array $sids);

    public function deleteCarCommentByuid(Array $uids);

    public function deleteShopCommentByuid(Array $uids);
}