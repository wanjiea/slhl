<?php
namespace app\admin\helper;


class MessageHelper
{

    public function sendMessage($telephone, $msg)
    {
        if (!$telephone) {
            return false;
        }

        $post_data = array();
        $post_data['account'] = getSetting('sms', 'user');   //帐号
        $post_data['pswd'] = getSetting('sms', 'pwd');  //密码
        $post_data['msg'] = $msg; //短信内容需要用urlencode编码下
        $post_data['mobile'] = $telephone; //手机号码， 多个用英文状态下的 , 隔开
        $post_data['product'] = ''; //产品ID  不需要填写
        $post_data['needstatus']='false'; //是否需要状态报告，需要true，不需要false
        $post_data['extrno']='';  //扩展码   不用填写
        $post_data['resptype']='json';  //扩展码   不用填写
        $url = getSetting('sms', 'url');
        $o='';
        foreach ($post_data as $k=>$v)
        {
            $o.="$k=".urlencode($v).'&';
        }
        $post_data=substr($o,0,-1);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果需要将结果直接返回到变量里，那加上这句。
        $result = curl_exec($ch);
        $arr=json_decode($result,true);

        if($arr['result'] == "OK"){
            $data['add_time']  = date('Y-m-d H:i:s',time());
            $data['msg'] = $msg;
            $data['telephone'] = $telephone;
            model('UserVerify')->save($data);
            //return array('status'=>1,'info'=>"验证码发送成功！");
            return true;
        }else{
            return false;
        }
    }
}