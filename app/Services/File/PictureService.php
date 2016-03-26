<?php
/**
 * author: Eric.chen
 * Date: 16/2/20
 * Description:
 */

namespace App\Services\File;


use Config;
use JohnLui\AliyunOSS\AliyunOSS;
use League\Flysystem\InvalidArgumentException;
class PictureService extends FileServiceAbstract{

    protected $bucket;
    protected $ossClient;
    protected $localstore;//本地存储对象
    public static $suffix = array('png', 'jpg', 'jpeg', 'gif', 'bmp');
    const ALLOWSIZE = 10485760;//10M


    public function __construct($isInternal = false)
    {
        $serverAddress = $isInternal ? Config::get('app.ossServerInternal') : Config::get('app.ossServer');
        $this->bucket = Config::get('app.Bucket');
        $this->ossClient = AliyunOSS::boot(
            $serverAddress,
            Config::get('app.AccessKeyId'),
            Config::get('app.AccessKeySecret')
        );
        $this->ossClient->setBucket($this->bucket);
        $this->localstore = !empty($this->localstore) ? $this->localstore : \Storage::disk('temp');
    }


    public static function upload($fileName, $filePath)
    {
        $oss = new self(true); // 上传文件使用内网，免流量费
//        $oss->ossClient->setBucket('你的 bucket 名称');
        if(!static::check($fileName, $filePath, $oss)){
            return false;
        }
        $oss->ossClient->uploadFile($fileName, $filePath);
    }

    protected static function check($fileName, $filePath, $oss){
        $suffix = end(explode('.', $fileName));
        if(!$oss->localstore->exits($filePath.$fileName)){
            return false;
        };
        if(!in_array(static::$suffix, $suffix)){
            return false;
        }
        if($oss->localstore->size($filePath.$fileName) > self::ALLOWSIZE){
            return false;
        };
    }
    /**
     * 直接把变量内容上传到oss
     * @param $fileName
     * @param $content
     */
    public static function uploadContent($fileName,$content)
    {
        $oss = new self(true); // 上传文件使用内网，免流量费
//        $oss->ossClient->setBucket('你的 bucket 名称');
        $oss->ossClient->uploadContent($fileName,$content);
    }

    /**
     * 删除存储在oss中的文件
     *
     * @param string $fileName 存储的key（文件路径和文件名）
     * @return
     */
    public static function deleteObject($fileName)
    {
        $oss = new PictureService(true); // 上传文件使用内网，免流量费

        return $oss->ossClient->deleteObject($oss->bucket, $fileName);
    }

    /**
     * 复制存储在阿里云OSS中的Object
     *
     * @param string $sourceBuckt 复制的源Bucket
     * @param string $sourceKey - 复制的的源Object的Key
     * @param string $destBucket - 复制的目的Bucket
     * @param string $destKey - 复制的目的Object的Key
     * @return Models\CopyObjectResult
     */
    public function copyObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        $oss = new PictureService(true); // 上传文件使用内网，免流量费

        return $oss->ossClient->copyObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }

    /**
     * 移动存储在阿里云OSS中的Object
     *
     * @param string $sourceBuckt 复制的源Bucket
     * @param string $sourceKey - 复制的的源Object的Key
     * @param string $destBucket - 复制的目的Bucket
     * @param string $destKey - 复制的目的Object的Key
     * @return Models\CopyObjectResult
     */
    public function moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey)
    {
        $oss = new PictureService(true); // 上传文件使用内网，免流量费

        return $oss->ossClient->moveObject($sourceBuckt, $sourceKey, $destBucket, $destKey);
    }

    public static function getUrl($fileName)
    {
        $oss = new PictureService();
//        $oss->ossClient->setBucket('你的 bucket 名称');
        return $oss->ossClient->getUrl($fileName, new \DateTime("+1 day"));
    }

    public static function createBucket($bucketName)
    {
        $oss = new PictureService();
        return $oss->ossClient->createBucket($bucketName);
    }

    public static function getAllObjectKey($bucketName)
    {
        $oss = new PictureService();
        return $oss->ossClient->getAllObjectKey($bucketName);
    }
}