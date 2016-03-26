<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS\Interfaces;


interface CollectionServiceInterface {

    const SIZE = 15;

    public function getListBysid($sid, $page = 1, $size = self::SIZE);

    public function getListBycid($cid, $page = 1, $size = self::SIZE);

    public function getCarCollectionListByuid($uid, $page = 1, $size = self::SIZE);

    public function getCarCollectionListByuidAndcid($uid, $cid, $page = 1, $size = self::SIZE);

    public function getShopCollectionListByuid($uid, $page = 1, $size = self::SIZE);

    public function getShopCollectionListByuidAndsid($uid, $sid, $page = 1, $size = self::SIZE);

    public function getListBysids(Array $sids, $page = 1, $size = self::SIZE);

    public function getListBycids(Array $cids, $page = 1, $size = self::SIZE);

    public function addBycid(Array $data, $cid, $uid, $pid = 0);

    public function addBysid(Array $data, $sid, $uid, $pid = 0);

    public function updateCarCollectionByid(Array $data, $id);

    public function updateShopCollectionByid(Array $data, $id);

    public function updateByid(Array $data, $id);

//    public function delete(Array $ids);

    public function deleteCarCollection($id);

    public function deleteShopCollection($id);

    public function deleteBycid(Array $cids);

    public function deleteBysid(Array $sids);

    public function deleteCarCollectionByuid(Array $uids);

    public function deleteShopCollectionByuid(Array $uids);
}