<?php

namespace app\index\model;

use think\Model;

class Contact extends Model
{
	protected function getPicAttr($value)
    {

		$pic = cur_host().$value;
		
        return $pic;
    }
}


?>