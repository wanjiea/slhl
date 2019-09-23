<?php

namespace app\index\model;

use think\Model;

class GoodsContent extends Model
{
    //获取器 用于读取字段值的修改
    protected function getMultiplePicAttr($value)
    {

        $multiple_pic = explode(',', $value);
		
		$host_url = cur_host();
		
		foreach ($multiple_pic as $k => $v) {
			$multiple_pic[$k] = $host_url.$v;
		}

        return $multiple_pic;
    }

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
	
    protected function getCateNameAttr($value,$data)
    {

        $result = model('GoodsCate')->where(['is_del' => 0, 'id' => $data['cate_id']])->value('class_name');

        return $result;
    }

    protected function getSeriesNameAttr($value,$data)
    {

        $result = model('GoodsSeries')->where(['is_del' => 0, 'id' => $data['series_id']])->value('class_name');

        return $result;
    }

    protected function getMaterialNameAttr($value,$data)
    {

        if ($data['material_id']) {
            $material = model('GoodsMaterial')->where(['is_del' => 0, 'id' => $data['material_id']])->value('class_name');
            $result = '-'.$material;
        } else {
            $result = '';
        }

        return $result;
    }

    protected function getSameNameAttr($value,$data)
    {

        $same = [0 => '否', 1 => '是'];

        return $same[$data['is_same']];
    }
}


?>