<?php
namespace app\index\controller;
use app\admin\constant\SystemConstant;
use app\admin\constant\BannerConstant;
use app\admin\helper\DatetimeHelper;

class Contact extends Base {

    public function __construct(){
        parent::__construct();
        $get_seo = $this->getSeo(7);
        $this->assign('get_seo', $get_seo);
    }

    public function index()
    {
        return $this->fetch();
    }

    /**
     * 组织架构接口
     * http://localhost/Contact/contact
     */
    public function contact()
    {
        if (request()->isPost()) {
            $contact_model = model('contact');
            $banner = model('banner')->field('title,en_title,pic,phone_pic')->where(['class_id' => BannerConstant::BANNER_TYPE_CONTACT])->find();
            $contact = $contact_model->field('title,tel,email,postal_code,address,en_address')->find();
            $data = [
                'banner' => $banner,
                'list' => $contact,
            ];
            $json_arr =  ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => $data];
            echo json_encode($json_arr) ;
        }
    }

    public function online()
    {
        if(request()->isPost()){


            $name = request()->post('name'); //姓氏
            $tel = request()->post('tel'); //电话
            $address = request()->post('address'); //地址


            if (empty($name)) {
                $json_arr = ['status' => '0', 'msg' => "缺少姓名"];
                echo json_encode($json_arr);die;
            };

            if (empty($tel)) {
                $json_arr = ['status' => '0', 'msg' => "缺少手机号"];
                echo json_encode($json_arr);die;
            };

            if (!preg_match('/^(13[0-9]|14[579]|15[0-3,5-9]|16[6]|17[0135678]|18[0-9]|19[89])\\d{8}$/', $tel)) {
                $json_arr = ['status' => 0, 'msg' => '手机格式错误！'];
                echo json_encode($json_arr);die;
            }


            if (empty($address)) {
                $json_arr = ['status' => '0', 'msg' => "缺少省份"];
                echo json_encode($json_arr);die;
            };
            $m = model('feedback');
            $ip = real_ip();

            $obj_helper = new DatetimeHelper();
            $arrayTime = $obj_helper->todayTimestamp();
            $check = $m->where(['ip' => $ip, 'add_time' => ['between', $arrayTime]])->count();

            if ($check > 1000) {
                $json_arr = ['status' => 0, 'msg' => '您今天提交过于频繁'];
                echo json_encode($json_arr);die;
            }

            $arrayTime = [time()-60, time()];
            $check = $m->where(['ip' => $ip, 'add_time' => ['between', $arrayTime]])->count();

            if ($check >= 10) {
                $json_arr = ['status' => 0, 'msg' => '提交过于频繁，请稍后再试'];
                echo json_encode($json_arr);die;
            }

            $data = [
                'name' => $name, //姓氏
                'tel' => $tel,
                'ip' => $ip,
                'address'=>$address,
                'add_time' => time(),
            ];
            $res = $m->save($data);

            if ($res) {
                $json_arr = ['status' => 1, 'msg' => '申请成功', 'data' => []];

            } else {
                $json_arr = ['status' => 0, 'msg' => '申请失败', 'data' => []];

            }
            echo json_encode($json_arr) ;

        }

    }

}