<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS;


use App\Repositories\Interfaces\ShopRepository;
use App\Services\CMS\Interfaces\ShopServiceInterface;

class ShopService implements ShopServiceInterface{

    protected $shop;
    public function __construct(ShopRepository $shop){
        $this->shop = $shop;
    }

    public function getShopsBywhere(Array $where, $page = 1, $size = SIZE)
    {
        return $this->shop->findWhere($where)->paginate($size);
    }

    public function getShopByid($sid)
    {
        return $this->shop->find($sid);
    }

    public function add(Array $data)
    {
        return $this->shop->create($data);
    }

    public function update(Array $data, $sid)
    {
        return $this->shop->update($data, $sid);
    }

    public function updateList(Array $data, Array $sids)
    {
        return $this->shop->findWhereIn('id', $sids);
    }

    public function delete($sid)
    {
        return $this->shop->delete($sid);
    }
}