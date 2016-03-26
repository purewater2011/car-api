<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS\Interfaces;


interface CarOwnerServiceInterface {

    const SIZE = 15;

    public function getOwner($id);

    public function addOwner(Array $data);

    public function updateOwner(Array $data, $id);

    public function deleteOwner($id);
}