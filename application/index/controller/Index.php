<?php
namespace app\index\controller;




use app\admin\constant\ContentConstant;
use app\admin\constant\SystemConstant;

class Index extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->fetch();
    }
    public function homepage()
    {
        if (request()->isPost()) {
            $banner = model('banner')->where('class_id', 1)->field('title,en_title,pic')->find();

            $where['class_id'] = ContentConstant::CONTENT_INDEX_ADVANTAGE;
            $advantage = model('content')->where($where)->field('title,sub_title,pic')->select();
            $where['class_id'] = ContentConstant::CONTENT_AD;
            $ad = model('content')->where($where)->field('title,describe,pic')->select();
            $data = [
                'banner' => $banner,
                'advantage' =>$advantage,
                'ad' =>$ad,
            ];
            $json_arr = ["status" => 1, "msg" => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => $data];
           ajaxReturn($json_arr);
        } else {
            return $this->fetch();
        }
    }

}