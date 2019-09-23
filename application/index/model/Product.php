<?php


namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class Product extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

//    protected function setDpecificationAttr($value){
//        return serialize($value);
//    }
//    protected function setAdvantageAttr($value){
//        return serialize($value);
//    }
//    protected function setScenesAttr($value){
//        return serialize($value);
//    }
    protected function getSpecificationAttr($value)
    {
        return unserialize($value);
    }

    protected function getAdvantageAttr($value)
    {
        return unserialize($value);
    }

    protected function getScenesAttr($value)
    {
        return unserialize($value);
    }

}