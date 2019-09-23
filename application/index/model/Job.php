<?php

namespace app\index\model;

use think\Model;

class Job extends Model
{


    protected function getLinkAttr($value)
    {

        if (empty($value)) {
            $link = 'https://jobs.51job.com/hangzhou/co4456770.html';
        } else {
            $link = $value;
        }

        return $link;
    }


}


?>