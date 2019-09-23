<?php

namespace app\index\model;

use think\Model;

class ContentCate extends Model
{
    protected $fields = array(
        'id',
        '_pk' => 'id',
        '_autoinc' => true
    );
    protected function getPicAttr($value)
    {

		$pic = cur_host().$value;
		
        return $pic;
    }
    protected function getPicpAttr($value)
    {

		$pic = cur_host().$value;
		
        return $pic;
    }
    protected function getPicbgAttr($value)
    {

		$pic = cur_host().$value;
		
        return $pic;
    }
}


?>