<?php


namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class News extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    //获取器 用于读取字段值的修改
    protected function getClassNameAttr($value, $data)
    {
        if ($data['cate_id']) {
            $class_name = model('news_cate')->where(['id' => $data['cate_id']])->value('class_name');
        } else {
            $class_name = '';
        }

        return $class_name;
    }
}