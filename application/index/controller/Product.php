<?php


namespace app\index\controller;


use app\admin\constant\SystemConstant;

class Product extends Base
{
    public function __construct()
    {
        parent::__construct();
        $get_seo = $this->getSeo(2);
        $this->assign('get_seo', $get_seo);
    }

    public function index()
    {
        if (request()->isPost()) {
            $banner = model('banner')->where('cate_id', 2)->field("title,en_title,pic")->find();
            $where = [
                'is_display' => 1,
            ];

            $product = model('product')->where($where)->field(['title', 'en_title', 'pic', 'big_pic', 'describe', 'advantage', 'scenes', 'specification'])->select();
            $data = [
                'banner' => $banner,
                'product' => $product,
            ];
            $json_arr = ["status" => 1, "msg" => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => $data];
            ajaxReturn($json_arr);
        } else {
            return $this->fetch();
        }
    }

}