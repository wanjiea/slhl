<?php

namespace app\index\model;

use think\Model;

class Banner extends Model
{
    //自定义初始化
    protected function initialize()
   {
       //需要调用`Model`的`initialize`方法
        parent::initialize();
       //TODO:自定义的初始化
    }
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

}


?>