<?php


namespace app\admin\controller;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;
use app\admin\constant\ContentConstant;

class HomePage extends Base
{
    protected $content_model;

    public function __construct()
    {
        parent::__construct();
        $this->content_model = model('content');

    }


     //优势
    public function advantage()
    {
        $where = [ 'class_id' => ContentConstant::CONTENT_INDEX_ADVANTAGE];

        $name  = request()->param('keyword','','trim');

        if ($name) {
            $where['title'] = ['like', '%'.$name.'%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);
        $this->assign('class_id', ContentConstant::CONTENT_INDEX_ADVANTAGE);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_SURE);

        return $this->fetch();

    }

    public function addEditadvantage()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_INDEX_ADVANTAGE);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

    public function ad()
    {
        $where = [ 'class_id' => ContentConstant::CONTENT_AD];

        $name  = request()->param('keyword','','trim');

        if ($name) {
            $where['title'] = ['like', '%'.$name.'%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);
        $this->assign('class_id', ContentConstant::CONTENT_AD);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_SURE);

        return $this->fetch();

    }

    public function addEditad()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_AD);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

    public function seoList()
    {

        $res = model("Seo")->paginate(10);

        $this->assign('list',$res);
        $this->assign('a_action_name', 'seo');
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_NONE);
        return $this->fetch();

    }

    public function addEditSeo()
    {

        $id = input('param.id');
        $m = model('Seo');
        $res =  $m->where(['id'=>$id])->find();

        if ($id) {
            $cid    =   $res['cid'];

        }else{

            $cid    =   $m->max('cid');
            $cid    =   $cid+1;

        }
        $this->assign('cache',$res);
        $this->assign('cid',$cid);
        $this->assign('action_name','seoList');

        return $this->fetch();
    }

    public function seoHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $seo_model = model('Seo');
            if (!$data['seo_title']) {
                return ['status' => 0, 'msg' => "请填写seo标题", 'data' => []];
            }
            //$helper_obj = new OriginalSqlHelper();
            //$where = [];
            //$data['sort'] = $helper_obj->getSort($data['sort'], $seo_model, $id, $where);

            if ($id) {
                $data['update_time'] = time();
                $content = '修改SEO信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $seo_model->field($field)->where(['id' =>  $id])->find();
                $result = $seo_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $content = '添加SEO信息';
                $before_json = [];
                $result = $seo_model->save($data);
                $data['id'] = $seo_model->getLastInsID();
                $after_json = $data;
            }
            $helper_obj = new MangerHelper();
            $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
            if ($result) {
                return ['status' => 1, 'msg' => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            } else {
                return ['status' => 0, 'msg' => SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }
        }
    }
}