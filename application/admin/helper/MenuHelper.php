<?php


namespace app\admin\helper;


class MenuHelper
{

    public function leftMenu()
    {
        $left_menu = [
            'Index' => ['name' => '首页管理', 'icon' => 'fa fa-home', 'sub_menu' => [
                ['name' => '广告霸屏', 'act' => 'ad', 'control' => 'HomePage'],
                ['name' => '终端机优势', 'act' => 'advantage', 'control' => 'HomePage'],
                ['name' => 'SEO管理', 'act' => 'seoList', 'control' => 'HomePage'],
            ]],
            'Banner' => ['name' => 'banner图管理', 'icon' => 'fa-sticky-note', 'sub_menu' => [
//                ['name'=>'首页banner','act'=>'bannerList','control'=>'Banner'],
                ['name' => 'banner', 'act' => 'bannerList', 'control' => 'Banner'],
            ]],
//            'About' =>['name'=>'关于我们','icon'=>'fa fa-sticky-note','sub_menu'=>[
//                ['name'=>'关于我们','act'=>'about_1','control'=>'About'],
////                ['name'=>'股东背景','act'=>'about_2','control'=>'About'],
//                ['name'=>'控股股东','act'=>'about_3','control'=>'About'],
//                ['name'=>'中间背景','act'=>'about_4','control'=>'About'],
//                ['name'=>'我们的客户','act'=>'about_5','control'=>'About'],
//                ['name'=>'客户列表','act'=>'about_6','control'=>'About'],
//            ]],
            'News' => ['name' => '新闻中心', 'icon' => 'fa fa-sticky-note', 'sub_menu' => [
                ['name' => '新闻列表', 'act' => 'newsList', 'control' => 'News'],
                ['name' => '新闻分类', 'act' => 'newsCateList', 'control' => 'News'],
            ]],
            'Product' => ['name' => '产品', 'icon' => 'fa fa-sticky-note', 'sub_menu' => [
                ['name' => '产品列表', 'act' => 'productlist', 'control' => 'Product'],
            ]],

//            'Business' =>['name'=>'业务领域','icon'=>'fa fa-sticky-note','sub_menu'=>[
//                ['name'=>'业务领域','act'=>'business','control'=>'Business'],
//            ]],
            'Join' => ['name' => '代理加盟', 'icon' => 'fa fa-sticky-note', 'sub_menu' => [
                ['name' => '优势', 'act' => 'advantage', 'control' => 'Join'],
                ['name' => '收益预估及分配', 'act' => 'income', 'control' => 'Join'],
                ['name' => '招商流程', 'act' => 'advantage', 'control' => 'Join'],
                ['name' => '联系我们', 'act' => 'advantage', 'control' => 'Join'],
            ]],
            'Cases' => ['name' => '投资者收益', 'icon' => 'fa fa-sticky-note', 'sub_menu' => [
                ['name' => '案例展示', 'act' => 'caseslist ', 'control' => 'Cases'],
                ['name' => '投资者要求', 'act' => 'needlist ', 'control' => 'Cases'],
            ]],
            'Contact' => ['name' => '联系我们', 'icon' => 'fa fa-sticky-note', 'sub_menu' => [
                ['name' => '联系我们', 'act' => 'contact', 'control' => 'Contact'],
                ['name' => '招商入驻申请名单', 'act' => 'feedback', 'control' => 'Contact'],
            ]],
            'Setting' => ['name' => '系统配置', 'icon' => 'fa fa-envelope', 'sub_menu' => [
                ['name' => '系统配置', 'act' => 'index', 'control' => 'Setting'],
            ]],
            'Manager' => ['name' => '权限资源管理', 'icon' => 'fa-cog', 'sub_menu' => [
                ['name' => '管理员列表', 'act' => 'managerList', 'control' => 'Manager'],
                ['name' => '角色列表', 'act' => 'managerCateList', 'control' => 'Manager'],
                ['name' => '操作日志', 'act' => 'managerLog', 'control' => 'Manager'],
                //['name'=>'权限列表','act'=>'rightList','control'=>'Manager'],
            ]],
        ];
        return $left_menu;
    }

    public function getMenuList($act_list)
    {
        //根据角色权限过滤菜单
        $menu_list = $this->leftMenu();
        if ($act_list != 'all') {
            $right = model('manager_menu')->where(['id' => ['in', $act_list]])->field('right')->select();
            $role_right = '';
            foreach ($right as $val) {
                $role_right .= $val['right'] . ',';
            }
            $role_right = explode(',', $role_right);
            foreach ($menu_list as $k => $mrr) {
                $i = 0;
                $count = count($mrr['sub_menu']);
                foreach ($mrr['sub_menu'] as $j => $v) {
                    if (!in_array($v['control'] . '@' . $v['act'], $role_right)) {
                        $i++;
                        unset($menu_list[$k]['sub_menu'][$j]);//过滤菜单
                    }
                }
                if ($count != 0 && $i == $count) {
                    unset($menu_list[$k]);//过滤菜单
                }
            }
        } else {
            $manager_id = session('manager_id');
            if ($manager_id == 1) {
                array_push($menu_list['Manager']['sub_menu'], ['name' => '权限列表', 'act' => 'rightList', 'control' => 'Manager']);
            }
            //$menu_list['Comment']['sub_menu'][1]['name'] = '发布通知';
            //array_push($menu_list['Manager']['sub_menu'], ['name'=>'权限列表','act'=>'rightList','control'=>'Manager']);
        }
        return $menu_list;
    }
}