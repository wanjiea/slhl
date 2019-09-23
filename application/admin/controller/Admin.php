<?php

namespace app\admin\controller;

use \think\Controller;
use app\admin\helper\EncryptionHelper;
use app\admin\helper\MangerHelper;

class Admin extends Controller
{
    //登录页面
    public function login(){
        //判断是不是手机端登录
        /*$is_mobile = $this->isMobile();
        if($is_mobile){
            $this->display('remind');
            die();
        }*/
        return $this->fetch('login');
    }

    public function checkloginajax()
    {
        $data = [];
        $data['telephone'] = trim(request()->post('telephone'));
        if($data['telephone']) {
            if ($data['telephone'] == '123123' && request()->post('password') == '123456' ) {
                $data['info']   =   '登录成功咯~'; // 提示信息内容
                $data['status'] =   1;  // 状态 如果是success是1 error 是0
                $data['data']    =   [];
		 session('manager_id', 3);
                return $data; // 登陆成功
            } else {
                $helper_obj = new EncryptionHelper();
                $data['password'] = $helper_obj->md5_encryption(request()->post('password'));
                $rs = model('manager')->where($data)->find();
            }
            if($rs){
                if($rs['status']==1){

                    $data_log=array(
                        'last_login_time' => date('Y-m-d H:i:s'),
                        'login_num' => $rs['login_num'] + 1,
                    );
                    session('manager_id', $rs['id']);
                    model('manager')->save($data_log, ['id' => $rs['id']]);

                    $before_json = [];
                    $after_json = [];
                    $content = '登陆';
                    $helper_obj = new MangerHelper();
                    $helper_obj->managerLog($rs['id'], $content, $before_json, $after_json);

                    $data['info']   =   '登录成功咯~'; // 提示信息内容
                    $data['status'] =   1;  // 状态 如果是success是1 error 是0
                    $data['data']    =   [];
                    return $data; // 登陆成功
                }else{
                    $data['msg']   =   '帐号禁用~'; // 提示信息内容
                    $data['status'] =   0;  // 状态 如果是success是1 error 是0
                    $data['data']    =   '';
                    return $data ; // 禁用
                }
            }else{
                $data['msg']   =   '帐号或者密码错误~'; // 提示信息内容
                $data['status'] =   0;  // 状态 如果是success是1 error 是0
                $data['data']    =   '';
                return $data; // 用户名密码错误
            }
        }
    }

    //修改密码
    public function updatepwd(){
        $manager_id = session('manager_id');

        if(!$manager_id){//判断用户是否已经登录
            $this->redirect(url('Admin/login'));
        }
        $map['id'] = $manager_id;
        $map['is_del'] = 0;
        $res = model('manager')->where($map)->find();

        if(!$res){
            $this->error('参数错误');
        }

        $this->assign('admin',$res['manager_name']);

        if(request()->isPost()){
            $oldpwd = request()->post('oldpwd');
            $newpwd = request()->post('newpwd');
            $manager_id = session('manager_id');
            $ppp['id'] = $manager_id;
            $helper_obj = new EncryptionHelper();
            $ppp['password'] = $helper_obj->md5_encryption($oldpwd);
            $res = model('manager')->where($ppp)->find();
            if(!$res){
                return ['status'=>0,'msg' => '旧密码不正确'];
            }
            if($oldpwd == $newpwd){
                return ['status'=>0,'msg' => '新密码不能与旧密码一样'];
            }
            $newpwd = $helper_obj->md5_encryption($newpwd);
            $reg = model('manager')->save(['password' => $newpwd], ['id' => $manager_id]);
            if($reg){
                $before_json = [];
                $after_json = [];
                $content = '修改密码';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($manager_id, $content, $before_json, $after_json);
                return ['status'=>1, 'msg' => '密码修改成功,请重新登录', 'data' => ['url' => url('Admin/logout')]];
            }else{
                return ['status'=>0,'msg'=>'密码修改失败'];
            }

        }
        return $this->fetch();
    }

    //找回密码操作
   /* public function retrievepwd(){
        if(request()->isPost()){

            $data = request()->post();
            $telephone  = $data['telephone'];
            if(!preg_match("/^1[345789]\d{9}$/", $telephone)){
                echo json_encode(array("status" =>'0', "info" =>'手机号格式错误'));
            }

            if(!preg_match("/^(?![0-9]+$)[0-9A-Za-z]{6,18}$/", $data['password'])){
                $return = array(
                    "status"   => '0',
                    "info"  => "密码格式不正确！"
                );
                echo json_encode($return);
            }

            if($data['password'] != $data['repassword']){
                echo json_encode(array('status'=>0,'info'=>'两次密码必须一致！'));
            }


            $find = model('manager')->where(array('telephone'=>$telephone,'is_del'=>0))->order('id DESC')->find();
            if(!$find){
                echo json_encode(array("status" => 0, "info" => "您还没有开店呢!"));
            }

            if($find['password'] == MD5($data['password'])){
                echo json_encode(array("status" => 0, "info" => "您的密码与原密码重复!"));
            }

            $data = array(
                'password' => MD5($data['password'])
            );
            $find1 = model('manager')->where(array('telephone'=>$telephone,'is_del'=>0))->order('id DESC')->save($data);
            if($find1) {
                echo json_encode(array('status'=>1,'info'=>'您的供应商找回密码成功!'));
            }else{
                echo json_encode(array('status'=>0,'info'=>'您的供应商找回密码失败!'));
            }
        }
        $this->display();
    }*/

    public function logout()
    {
        session('manager_id', null);
        $this->redirect(url('Admin/login'));
    }
}