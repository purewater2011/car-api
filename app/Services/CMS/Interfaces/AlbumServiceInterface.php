<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS\Interfaces;


interface AlbumServiceInterface {

    const SIZE = 15;

    public function getAlbumListBycid($cid, $page = 1, $size = self::SIZE);

    public function getAlbumListBysid($sid, $page = 1, $size = self::SIZE);

    public function getAlbum($aid);

    public function getPictures($aid);

    public function addAlbum(Array $data);

    public function addPictures(Array $data, $aid);

    public function updateAlbum(Array $data, $aid);

    public function updateAlbums(Array $data, Array $aids);

    public function updatePicture(Array $data, $id);

    public function updatePicturesByaid(Array $data, $aid);

    public function deleteAlbum($aid);

    public function deletePicture($id);

    public function deletePicturesByids(Array $ids);

    public function deletePictureByaids(Array $aids);

    public function getQrcode($qid);

    public function addQrcode(Array $data);

    public function updateQrcode(Array $data, $qid);

    public function deleteQrcode($qid);

}