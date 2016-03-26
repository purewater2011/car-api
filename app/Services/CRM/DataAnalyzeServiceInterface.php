<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CRM;


interface DataAnalyzeServiceInterface {

    public function CarPV();

    public function ShopPV();

    public function CarUV();

    public function ShopUV();
}