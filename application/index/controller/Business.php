<?php


namespace app\index\controller;
use app\admin\constant\ContentConstant;
use app\admin\constant\BannerConstant;
use app\admin\constant\SystemConstant;

class Business extends Base
{
    public function __construct()
    {
        parent::__construct();
        $get_seo = $this->getSeo(5);
        $this->assign('get_seo', $get_seo);
    }

    public function index()
    {
        return $this->fetch();
    }

    /**
     * 组织架构接口
     * http://localhost/Business/business
     */
    public function business()
    {
        if (request()->isPost()) {
            $content_model = model('content');
            $banner = model('banner')->field('title,en_title,pic,phone_pic')->where(['class_id' => BannerConstant::BANNER_TYPE_BUSINESS])->find();
            $business = $content_model->field('title,describe,pic')->where(['class_id' => ContentConstant::CONTENT_BUSINESS_CLASS_ONE])->order('sort asc')->select();

            $data = [
                'banner' => $banner,
                'list' => $business,
            ];
            $json_arr =  ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => $data];
            echo json_encode($json_arr) ;
        }
    }
}