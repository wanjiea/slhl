<?php
namespace app\index\controller;

use \think\Controller;

class Base extends Controller{


    public function __construct()
    {
        parent::__construct();

        //Seo
        $get_seo = $this->getSeo(1);
        $this->assign('get_seo', $get_seo);

    }

    public function getSeo($cid)
    {
        $seo_model = model('Seo');
        $get_seo = $seo_model->where(['cid' => $cid])->field('seo_title,seo_key,seo_des')->find();
        return $get_seo;
    }

}