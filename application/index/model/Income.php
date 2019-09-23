<?php


namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class Income extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}