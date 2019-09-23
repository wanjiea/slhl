<?php

namespace app\index\model;

use think\Model;

class News extends Model
{

	//获取器 用于读取字段值的修改
    protected function getPicAttr($value)
    {

        if (empty($value)) {
            $pic = '/static/home/images/news_logo.jpg';
        } else {
            $pic = $value;
        }

		$pic = cur_host().$pic;
		
        return $pic;
    }

    protected function getPicdesAttr($value)
    {

        $pic = cur_host().$value;
        
        return $pic;
    }

    protected function getPicindexAttr($value)
    {

        if (empty($value)) {
            $pic = '/static/home/images/news_logo.jpg';
        } else {
            $pic = $value;
        }

        $pic = cur_host().$pic;
        
        return $pic;
    }

    protected function getNewAddTimeAttr($value, $data)
    {

        $result = date('Y.m.d',strtotime($data['add_time']));

        return $result;
    }
	
}


?>