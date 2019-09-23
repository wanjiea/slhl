<?php

namespace app\index\model;

use think\Model;

class JobResume extends Model
{
    protected $auto =  ['ip', 'add_time'];
    protected $insert = [];
    protected $update = [];

    protected function setAddTimeAttr()
    {
        return time();
    }

    protected function setIpAttr()
    {
        return real_ip();
    }

}


?>