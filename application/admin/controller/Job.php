<?php


namespace app\admin\controller;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;


class Job extends Base
{
    protected $job_model;

    public function __construct()
    {
        parent::__construct();
        $this->job_model = model('job');

    }

    public function jobList()
    {
        $where = [];

        $name  = request()->param('keyword');

        if ($name) {
            $where['title'] = ['like', '%'.$name.'%'];
        }

        $this->assign('keyword', $name);

        $list = $this->job_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);

        $this->assign('a_action_name', 'Join');

        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_SURE);

        return $this->fetch();

    }


    public function addEditJob()
    {

        $id = request()->param('id');

        $cache = $this->job_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = 'JobList';

        $this->assign('action_name', $action_name);

        return $this->fetch();

    }

    public function handleJob()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);

            if (!$data['title']) {
                return ['status' => 0, 'msg' => "请填写职位", 'data' => []];
            }
            if (!$data['num']) {
                return ['status' => 0, 'msg' => "请填写招聘人数", 'data' => []];
            }
            if (!$data['place']) {
                return ['status' => 0, 'msg' => "请填写工作地点", 'data' => []];
            }
            if (!$data['add_time']) {
                return ['status' => 0, 'msg' => "请填写发布时间", 'data' => []];
            }
            if (!$data['summary']) {
                return ['status' => 0, 'msg' => "请填写职位概要", 'data' => []];
            }
            if (!$data['content']) {
                return ['status' => 0, 'msg' => "请填写工作内容", 'data' => []];
            }
            if (!$data['qualification']) {
                return ['status' => 0, 'msg' => "请填写任职资格", 'data' => []];
            }
            if (!$data['email']) {
                return ['status' => 0, 'msg' => "请填写投简邮箱和电话", 'data' => []];
            }
            $helper_obj = new OriginalSqlHelper();
            $where = [];
            $data['sort'] = $helper_obj->getSort($data['sort'], $this->job_model, $id, $where);

            if ($id) {
                $data['update_time'] = time();
                $content = '修改招聘信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $this->job_model->field($field)->where(['id' =>  $id])->find();
                $result = $this->job_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $content = '添加招聘信息';
                $before_json = [];
                $result = $this->job_model->save($data);
                $data['id'] = $this->job_model->getLastInsID();
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

    public function jobStatus()
    {
        if (request()->isPOST()) {
            $id = request()->post('id');
            $item = request()->post('item');
            if (!$id) {
                exit(json_encode(['status' => 0, 'msg' => SystemConstant::SYSTEM_NONE_PARAM, 'data' => []]));
            }
            $data =['id' => $id];
            $coupon = model('job')->where($data)->field($item)->find();
            $result = model('job')->where($data)->setField($item, 1-$coupon[$item]);
            if($result){
                $content = '修改招聘显示状态';
                $before_json = ['id' => $id, $item => $coupon[$item]];
                $after_json = ['id' => $id, $item => 1-$coupon[$item]];
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                $json_arr = ["status"=>1, "msg"=> SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => [$item => 1-$coupon[$item]]];
                exit(json_encode($json_arr));
            }else{
                $json_arr = ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
                exit(json_encode($json_arr));
            }
        }
    }

    /**
     * 删除Banner
     */
    public function delJob()
    {
        if (request()->isPOST()) {
            $ids = request()->post('id');
            
            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-',($ids)));

            $data = $this->job_model->where(['id' => ['in', $arr]])->find();

            $del = $this->job_model->destroy($arr);

            if($del){
                $before_json = $data;
                $after_json = [];
                $content = '删除招聘';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            }else{
                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }

        }
    }
}