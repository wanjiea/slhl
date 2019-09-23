<?php


namespace app\admin\controller;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;
use app\admin\constant\ContentConstant;

class Business extends Base
{
    protected $content_model;

    public function __construct()
    {
        parent::__construct();
        $this->content_model = model('content');

    }

    public function business()
    {
        $where = [ 'class_id' => ContentConstant::CONTENT_BUSINESS_CLASS_ONE];

        $name  = request()->param('keyword');

        if ($name) {
            $where['title'] = ['like', '%'.$name.'%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);

        $this->assign('class_id', ContentConstant::CONTENT_BUSINESS_CLASS_ONE);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_SURE);

        return $this->fetch();

    }


    public function addEditBusiness()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_BUSINESS_CLASS_ONE);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

}