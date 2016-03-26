<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS\Interfaces;


Interface ShopServiceInterface {

    const SIZE = 15;

    public function getShopsBywhere(Array $where, $page = 1, $size = SIZE);

    public function getShopByid($sid);

    public function add(Array $data);

    public function update(Array $data, $sid);

    public function updateList(Array $data, Array $sids);

    public function delete($sid);
}