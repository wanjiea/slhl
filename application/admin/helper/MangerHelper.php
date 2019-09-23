<?php


namespace app\admin\helper;


class MangerHelper
{

    /**
     * 添加操作日志
     * @param $manage_id 管理员ID
     * @param $content 操作内容
     * @param $before_json 操作前值
     * @param $after_json 操作后值
     */
    public function managerLog($manage_id, $content, $before_json, $after_json)
    {
        $data = [];
        $data['manager_id'] = $manage_id;
        $data['content'] = $content;
        $data['add_time'] = date('Y-m-d H:i:s', time());
        $data['login_ip'] = request()->ip();
        $data['control'] = request()->controller();
        $data['act'] = request()->action();
        $data['after_json'] = json_encode($after_json);
        $data['before_json'] = json_encode($before_json);
        model('ManagerLog')->create($data);
    }

}