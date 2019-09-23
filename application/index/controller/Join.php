<?php


namespace app\index\controller;

use app\admin\constant\BannerConstant;
use app\admin\constant\ContentConstant;
use app\admin\constant\SystemConstant;

class Join extends Base
{
    public function __construct()
    {
        parent::__construct();
        $get_seo = $this->getSeo(4);
        $this->assign('get_seo', $get_seo);
    }

    public function index()
    {
        if (request()->isPost()) {
            $banner = model('banner')->where('cate_id', 4)->field('title,en_title,pic')->find();
            $where = [
                'class_id' => ContentConstant::CONTENT_ADVANTAGE
            ];
            $Advantage = model('content')->where($where)->field('title,describe,pic')->select();
            $company = model('contact')->field('pic,tel,address')->find();
            $income['income'] = model('income')->field('create_time,update_time,delete_time,sort,manager_id', true)->select();
            $income['income_day'] = 0;
            $income['income_year'] = 0;
            foreach ($income['income'] as $v) {
                $income['income_day'] += $v['income_day'];
                $income['income_year'] += $v['income_year'];
            }
            $data = [
                'banner' => $banner,
                'Advantage' => $Advantage,
                'company' => $company,
                'income' => $income,//收益
            ];
            $json_arr = ["status" => 1, "msg" => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => $data];
            echo json_encode($json_arr);
        } else {
            return $this->fetch();
        }
    }

    public function income()
    {
        if (request()->isPost()) {
            $banner = model('banner')->where('class_id', 4)->field('title,en_title,pic')->find();
            $where = [
                'is_display' => 1,
            ];
            $product = model('product')->where($where)->field(['id', 'title', 'pic', 'describe', 'specification'])->select();
            $case_show = model('cases')->where($where)->field(["address", "order_num", "income", "cycle", "return"])->select();

            $need = model('need')->field('content,phone')->find();
            $data = [
                'banner' => $banner,
                'product' => $product,
                'need' => $need,
                'case_show' => $case_show,
            ];
            $json_arr = ["status" => 1, "msg" => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => $data];
            ajaxReturn($json_arr);
        } else {
            return $this->fetch();
        }
    }

}