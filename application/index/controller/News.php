<?php

namespace app\index\controller;
use app\admin\constant\ContentConstant;
use app\admin\constant\BannerConstant;
use app\admin\constant\SystemConstant;

class News extends Base {

    public function __construct()
    {
        parent::__construct();
        $get_seo = $this->getSeo(3);
        $this->assign('get_seo', $get_seo);
    }

    public function index()
    {
        if (request()->isPost()){
            $banner= model('banner')->where('cate_id',2)->field('title,en_title,pic')->find();
            $news = model('news_cate')->field(['id'=>'news_cate_id','class_name','en_class_name'])->select();
            foreach ($news as $k=>$v){
                $news[$k]['news_detail'] = model('news')->where('cate_id',$v['news_cate_id'])->field(['title','describe','pic','add_time'])->select();
            }
            $data = [
                'banner' => $banner,
                'news' => $news,
            ];
            $json_arr = ['status' => 1, 'msg' => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => $data];
             ajaxReturn($json_arr);
            }else{
            return $this->fetch();
        }
    }


}