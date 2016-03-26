<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS\Interfaces;


interface CarRepairServiceInterface {

    public function getRepair($id);

    public function getRepairBycid($cid);

    public function addRepair(Array $data);

    public function updateRepair(Array $data, $id);

    public function updateRepairBycid(Array $data, $cid);

    public function deleteRepair($id);

    public function deleteRepairBycid($cid);


}