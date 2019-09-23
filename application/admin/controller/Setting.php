<?php

namespace app\admin\controller;
use app\admin\constant\SystemConstant;

class Setting extends Base {

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 系统配置
     * */
    public function index()
    {
        $setting_msg = getSetting('system');

        if (!$setting_msg) {

            $setting_msg = array();

        }

        if (request()->isAjax()) {

            $data = $setting_msg;

            $title = input('post.title','','trim');

            $copyright = input('post.copyright','','trim');

            $link_logo = input('post.link_logo','','trim');

            $header_logo = input('post.header_logo','','trim');

            $token_key = input('post.token_key','','trim');

            $records = input('post.records','','trim');


            if (!$title) {

                return ['status' => 0, 'msg' => '请填写网站标题'];

            }

            if (!$copyright) {

                return ['status' => 0, 'msg' => '请填写网站版权'];

            }

          /*  if (!$link_logo) {

                return ['status' => 0, 'msg' => '请填写网站logo图小'];


            }*/

            if (!$header_logo) {

                return ['status' => 0, 'msg' => '请上传网站logo图'];

            }

           /* if (!$records) {

                return ['status' => 0, 'msg' => '请填写备案号'];

            }*/

            /*if (!$header_logo) {

                return ['status' => 0, 'msg' => '请填写登录token密钥'];

            }*/

            $data['title'] = $title;

            $data['copyright'] = $copyright;

            $data['link_logo'] = $link_logo;

            $data['header_logo'] = $header_logo;

            $data['records'] = $records;

            $data['token_key'] = $token_key;


            $data = json_encode($data, JSON_UNESCAPED_UNICODE);

            $setting_db = model('Setting');

            if ($setting_msg) {
                $setting_db->save(['value' => $data], ['name' => 'system']);
                $res = true;
            } else {

                $res =$setting_db->save(['name' => 'system', 'value' => $data]);

            }

            if ($res) {

                return ['status' => 1, 'msg' => SystemConstant::SYSTEM_OPERATION_SUCCESS];

            } else {
                return ['status' => 0, 'msg' => SystemConstant::SYSTEM_OPERATION_FAILURE];
            }


        } else {

            $this->assign('setting_info', $setting_msg);

            return $this->fetch();
        }
    }


    /**
     * 客户配置
     * */
    public function customer()
    {
        $setting_msg = getSetting('customer');

        if (!$setting_msg) {

            $setting_msg = array();

        }

        if (request()->isAjax()) {

            $data = $setting_msg;


            $max_customer_protect = input('post.max_customer_protect', 0 ,'intval');
            $customer_develop_num = input('post.customer_develop_num', 0 ,'intval');

            if (!$max_customer_protect) {

                return ['status' => 0, 'msg' => '请填写客户最大保护数量'];

            }

            if (!$customer_develop_num) {

                return ['status' => 0, 'msg' => '请填写当天需开发客户'];

            }

            $data['max_customer_protect'] = $max_customer_protect;
            $data['customer_develop_num'] = $customer_develop_num;

            $data = json_encode($data, JSON_UNESCAPED_UNICODE);

            $setting_db = model('Setting');

            if ($setting_msg) {
                $setting_db->save(['value' => $data], ['name' => 'customer']);
                $res = true;
            } else {

                $res =$setting_db->save(['name' => 'customer', 'value' => $data]);

            }

            if ($res) {

                return ['status' => 1, 'msg' => SystemConstant::SYSTEM_OPERATION_SUCCESS];

            } else {
                return ['status' => 0, 'msg' => SystemConstant::SYSTEM_OPERATION_FAILURE];
            }


        } else {

            $this->assign('setting_info', $setting_msg);

            return $this->fetch();
        }
    }
}