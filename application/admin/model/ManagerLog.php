<?php


namespace app\admin\model;

use think\Model;

class ManagerLog extends Model
{
    //获取器 用于读取字段值的修改
    protected function getManagerNameAttr($value, $data)
    {
        if ($data['manager_id']) {
            $manager_name = model('Manager')->where(['is_del' => 0, 'id' => $data['manager_id']])->value('manager_name');
        } else {
            $manager_name = '';
        }

        return $manager_name;
    }
}