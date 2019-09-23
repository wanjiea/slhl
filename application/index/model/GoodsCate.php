<?php

namespace app\index\model;

use think\Model;

class GoodsCate extends Model
{
	protected function getPicAttr($value) 
	{
		$host_url = cur_host();
		$pic = $host_url.$value;
		return $pic;
	}
	
	protected function getLogoPicAttr($value) 
	{
		$host_url = cur_host();
		$pic = $host_url.$value;
		return $pic;
	}
	
	protected function getBannerPicAttr($value) 
	{
		$host_url = cur_host();
		$pic = $host_url.$value;
		return $pic;
	}
		
	protected function getHomePicAttr($value) 
	{
		$host_url = cur_host();
		$pic = $host_url.$value;
		return $pic;
	}

    protected function getAnchorAttr($value, $data)
    {
        $array = [1 => 'zxl', 2 => 'shcx', 3 => 'yyt', 4 => 'ps', 5 => 'tpqfd'];
        return $array[$data['id']];
    }

}


?>