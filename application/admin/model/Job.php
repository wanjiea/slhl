<?php


namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Job extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}