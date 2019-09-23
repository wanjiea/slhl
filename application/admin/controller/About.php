<?php


namespace app\admin\controller;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;
use app\admin\constant\ContentConstant;

class About extends Base
{
    protected $content_model;

    public function __construct()
    {
        parent::__construct();
        $this->content_model = model('content');

    }


    public function about_1()
    {
        $where = ['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_ONE];

        $name = request()->param('keyword');

        if ($name) {
            $where['title'] = ['like', '%' . $name . '%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_ONE);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_NONE);

        return $this->fetch();

    }


    public function addEditAbout_1()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_ONE);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

    /*public function about_2()
    {
        $where = [ 'class_id' => ContentConstant::CONTENT_ABOUT_CLASS_TWO];

        $name  = request()->param('keyword');

        if ($name) {
            $where['title'] = ['like', '%'.$name.'%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_TWO);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_NONE);

        return $this->fetch();

    }


    public function addEditAbout_2()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_TWO);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }*/

    public function about_3()
    {
        $where = ['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_TREE];

        $name = request()->param('keyword');

        if ($name) {
            $where['title'] = ['like', '%' . $name . '%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_TREE);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_NONE);

        return $this->fetch();

    }


    public function addEditAbout_3()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_TREE);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

    public function about_4()
    {
        $where = ['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_FOUR];

        $name = request()->param('keyword');

        if ($name) {
            $where['title'] = ['like', '%' . $name . '%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_FOUR);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_NONE);

        return $this->fetch();

    }


    public function addEditAbout_4()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_FOUR);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

    public function about_5()
    {
        $where = ['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_FIVE];

        $name = request()->param('keyword');

        if ($name) {
            $where['title'] = ['like', '%' . $name . '%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_FIVE);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_NONE);

        return $this->fetch();

    }


    public function addEditAbout_5()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_FIVE);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

    public function about_6()
    {
        $where = ['class_id' => ContentConstant::CONTENT_ABOUT_CLASS_SIX];

        $name = request()->param('keyword');

        if ($name) {
            $where['title'] = ['like', '%' . $name . '%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_SIX);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_SURE);

        return $this->fetch();

    }


    public function addEditAbout_6()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_ABOUT_CLASS_SIX);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

    /**
     * 操作
     */
    public function addEditHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $this->content_model = model('content');
            if (!$data['title']) {
                return ['status' => 0, 'msg' => "请填写标题", 'data' => []];
            }
            $helper_obj = new OriginalSqlHelper();
            $where['class_id'] = $data['class_id'];
            $data['sort'] = $helper_obj->getSort($data['sort'], $this->content_model, $id, $where);

            if ($id) {
                $data['update_time'] = time();
                $content = '修改内容信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $this->content_model->field($field)->where(['id' => $id])->find();
                $result = $this->content_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $content = '添加内容信息';
                $before_json = [];
                $result = $this->content_model->save($data);
                $data['id'] = $this->content_model->getLastInsID();
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

    /**
     * 删除Banner
     */
    public function delHandle()
    {
        if (request()->isPOST()) {
            $ids = request()->post('id');

            $this->content_model = model('content');
            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-', ($ids)));

            $data = $this->content_model->where(['id' => ['in', $arr]])->find();

            $del = $this->content_model->destroy($arr);

            if ($del) {
                $before_json = $data;
                $after_json = [];
                $content = '删除内容';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status" => 1, "msg" => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            } else {
                return ["status" => 0, "msg" => SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }

        }
    }

    public function upDown()
    {
        if (request()->isPOST()) {
            $data = request()->post('');
            $id = $data['id'];
            $num = $data['num'];
            $search = $data['search'];
            $helper_obj = new OriginalSqlHelper();
            $result = $helper_obj->getUpDown('Content', $id, $num, $search ? $search : []);

            if ($result['status'] == 1) {
                $helper_obj = new MangerHelper();
                $content = '内容排序移动';
                $before_json = ['id' => $id, 'sort' => $result['data']['old_sort']];
                $after_json = ['id' => $id, 'sort' => $result['data']['new_sort']];
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ['status' => 1, 'msg' => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            } else if ($result['status'] == 2) {
                return ['status' => 0, 'msg' => $result['msg'], 'data' => []];
            } else {
                return ['status' => 0, 'msg' => SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }
        }
    }

    public function groupprofile()
    {
        return $this->fetch();
    }


}