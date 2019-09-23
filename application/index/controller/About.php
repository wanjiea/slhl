<?php

namespace app\index\controller;

use app\admin\constant\ContentConstant;
use app\admin\constant\BannerConstant;
use app\admin\constant\SystemConstant;

class About extends Base {

    public function __construct()
    {
        parent::__construct();
        $get_seo = $this->getSeo(2);
        $this->assign('get_seo', $get_seo);
    }

    public function index()
    {
        return $this->fetch();
    }

    /**
     * 集团简介
     */
    public function cases()
    {
        return $this->fetch();
    }
    /**
     * 公司架构
     */
    public function companyStructure()
    {
        return $this->fetch();
    }
    /**
     * 千里眼文化
     */
    public function education()
    {
        return $this->fetch();
    }

    /**
     * 关于我们接口
     * http://localhost/About/about
     */
    public function about()
    {
        if (request()->isPost()) {
            $content_model = model('content');
            $banner = model('banner')->field('title,en_title,pic,phone_pic')->where(['class_id' => BannerConstant::BANNER_TYPE_ABOUT])->find();
            $about_1 = $content_model->field('describe')->where(['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_ONE])->find();
            $about_2 = $content_model->field('title,sub_title,describe,pic,link')->where(['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_TREE])->order('sort asc')->select();
            $about_3 = $content_model->field('pic')->where(['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_FOUR])->find();
            $about_4 = $content_model->field('title,en_title,sub_title,describe')->where(['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_FIVE])->find();
            $about_5 = $content_model->field('pic')->where(['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_SIX])->order('sort asc')->select();

            $data = [
                'banner' => $banner,
                'about_1' => $about_1,
                'about_2' => $about_2,
                'about_3' => $about_3,
                'about_4' => $about_4,
                'about_5' => $about_5,
            ];
            $json_arr =  ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => $data];
            echo json_encode($json_arr) ;
        }
    }


}