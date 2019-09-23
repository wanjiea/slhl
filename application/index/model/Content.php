<?php

namespace app\index\model;

use think\Model;

class Content extends Model
{
    protected $fields = array(
        'id',
        '_pk' => 'id',
        '_autoinc' => true
    );
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
    protected function getPicpAttr($value)
    {

        if (empty($value)) {
            $pic = '/static/home/images/news_logo.jpg';
        } else {
            $pic = $value;
        }

		$pic = cur_host().$pic;
		
        return $pic;
    }
    protected function getPicbgAttr($value)
    {

        if (empty($value)) {
            $pic = '/static/home/images/news_logo.jpg';
        } else {
            $pic = $value;
        }

		$pic = cur_host().$pic;
		
        return $pic;
    }


    protected function getNewPriceAttr($value, $data)
    {
        $result = '';

        if ($data['class_id'] == 13) {
            $result = $data['month'] * 12;
        }

        return $result;
    }

}


?>