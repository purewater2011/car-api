<?php
/**
 * author: Eric.chen
 * Date: 16/2/21
 * Description:
 */

namespace App\Services\CMS;


use App\Repositories\Interfaces\AlbumRepository;
use App\Repositories\Interfaces\CarRepository;
use App\Repositories\Interfaces\PictureRepository;
use App\Repositories\Interfaces\QrcodeRepository;
use App\Repositories\Interfaces\ShopRepository;
use App\Services\CMS\Interfaces\AlbumServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AlbumService implements AlbumServiceInterface{

    protected $album;
    protected $picture;
    protected $qrcode;
    protected $car;
    protected $shop;

    /**
     * 初始化相册服务,注入仓库:相册,照片,二维码,汽车,店铺
     * @param AlbumRepository $album
     * @param PictureRepository $picture
     * @param QrcodeRepository $qrcode
     * @param CarRepository $car
     * @param ShopRepository $shop
     */
    public function __construct(AlbumRepository $album, PictureRepository $picture, QrcodeRepository $qrcode, CarRepository $car, ShopRepository $shop){
        $this->album = $album;
        $this->picture = $picture;
        $this->qrcode = $qrcode;
        $this->car = $car;
        $this->shop = $shop;
    }

    /**
     * 根据汽车id获取相册列表
     * 根据cid获取相册列表
     * @param $cid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getAlbumListBycid($cid, $page = 1, $size = self::SIZE)
    {
        try{
            $data = $this->car->with('album')->find($cid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'cid:'.$cid.'is not found!');
            abort(404, 'cid is invalid!');
        }
        return $data;
    }

    /**
     * 根据店铺id获取相册id
     * 根据sid获取相册列表
     * @param $sid
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getAlbumListBysid($sid, $page = 1, $size = self::SIZE)
    {
        try{
            $data = $this->shop->with('album')->find($sid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'sid:'.$sid.'is not found!');
            abort(404, 'sid is invalid!');
        }
        return $data;
    }

    /**
     * 根据相册id获取相册详情
     * @param $aid
     * @return mixed
     */
    public function getAlbum($aid)
    {
        try{
            $data = $this->album->find($aid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'aid:'.$aid.'is not found!');
            abort(404, 'aid is invalid!');
        }
        return $data;
    }

    /**
     * 根据相册id获取照片列表
     * @param $aid
     * @return mixed
     */
    public function getPictures($aid)
    {
        try{
            $data = $this->picture->with('album')->findByField('aid', $aid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'aid:'.$aid.'is not found!');
            abort(404, 'aid is invalid!');
        }
        return $data;
    }

    /**
     * 添加相册
     * @param array $data
     * @return mixed
     */
    public function addAlbum(Array $data)
    {
        $result = $this->album->create($data);
        return $result;
    }

    /**
     * 相册中添加多张图片
     * @param array $data
     * @param $aid
     * @return mixed
     */
    public function addPictures(Array $data, $aid)
    {
        $data['aid'] = $aid;
        $result = $this->picture->create($data);
        return $result;
    }

    /**
     * 更新相册信息
     * @param array $data
     * @param $aid
     * @return mixed
     */
    public function updateAlbum(Array $data, $aid)
    {
        $result = $this->album->update($data, $aid);
        return $result;
    }

    public function updateAlbums(Array $data, Array $aids)
    {
        // TODO: Implement updateAlbums() method.
    }

    /**
     * 更新照片信息
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updatePicture(Array $data, $id)
    {
        $result = $this->picture->update($data, $id);
        return $result;
    }

    /**
     * 更新相册下的所有图片信息
     * @param array $data
     * @param $aid
     * @return array
     */
    public function updatePicturesByaid(Array $data, $aid)
    {
        $pictures = $this->picture->findByField('aid', $aid);
        foreach($pictures as $picture){
            $result[] = $picture->update($data);
        }
        return $result;
    }

    /**
     * 删除相册
     * @param $aid
     * @return int
     */
    public function deleteAlbum($aid)
    {
        return $this->album->delete($aid);
    }

    /**
     * 删除单张图片
     * @param $id
     * @return int
     */
    public function deletePicture($id)
    {
        return $this->picture->delete($id);
    }

    /**
     * 删除多张照片
     * @param array $ids
     * @return array
     */
    public function deletePicturesByids(Array $ids)
    {
        $pictures = $this->picture->findWhereIn('id', $ids);
        foreach($pictures as $picture){
            $result[] = $picture->delete();
        }
        return $result;
    }

    public function deletePictureByaids(Array $aids)
    {
        // TODO: Implement deletePictureByaids() method.
    }

    /**
     * 获取二维码信息
     * @param $qid
     * @return mixed
     */
    public function getQrcode($qid)
    {
        try{
            $data = $this->qrcode->find($qid);
        }catch (NotFoundHttpException $e){
            Log::error(Carbon::now().' class:'.__CLASS__.' method:'.__METHOD__.' PARAMS:'.'qid:'.$qid.'is not found!');
            abort(404, 'qid is invalid!');
        }
        return $data;
    }

    /**
     * 添加二维码信息
     * @param array $data
     * @return mixed
     */
    public function addQrcode(Array $data)
    {
        return $this->qrcode->create($data);
    }

    /**
     * 更新二维码信息
     * @param array $data
     * @param $qid
     * @return mixed
     */
    public function updateQrcode(Array $data, $qid)
    {
        return $this->qrcode->update($data, $qid);
    }

    /**
     * 删除二维码
     * @param $qid
     * @return int
     */
    public function deleteQrcode($qid)
    {
        return $this->qrcode->delete($qid);
    }


}