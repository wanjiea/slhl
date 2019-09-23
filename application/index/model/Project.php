<?php

namespace app\index\model;

use think\Model;

class Project extends Model
{
    //获取器 用于读取字段值的修改
    protected function getCateNameAttr($value,$data)
    {

        $result = model('ProjectCate')->where(['is_del' => 0, 'id' => $data['cate_id']])->value('class_name');

        return $result;
    }


}


?>