<?php


namespace app\admin\controller;
use app\admin\constant\ContentConstant;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;
use Think\Db;

class Cases extends Base
{
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * 案例
     */
    public function casesList()
    {
        $cases_model = model('cases');
        $where = [];
        $keyword = request()->param('keyword');
        $cate_id = request()->param('cate_id');
        if ($keyword) {
            $where['title'] = ['like', "%{$keyword}%"];
        }

        if ($cate_id) {
            $where['cate_id'] = $cate_id;
        }
        $list = $cases_model->where($where)->order('create_time desc, sort asc, id desc')->paginate(10);

        $this->assign('list', $list);
        $this->assign('keyword', $keyword);
        $this->assign('cate_id', $cate_id);
        $cate_list = model('product')->order('sort asc, id desc')->field(['id','title'=>'class_name'])->select();
        $this->assign("cate_list", $cate_list);
        return $this->fetch();
    }

    /**
     * 添加案例
     */
    public function casesAdd()
    {
        $cases_model = model('cases');
        $cases_id = request()->param('cases_id');
        $where = ['id' => $cases_id];
        $cache = $cases_model->where($where)->find();

        $this->assign("cache", $cache);

        $cate_list = model('product')->order('sort asc, id desc')->field(['id','title'=>'class_name'])->select();
        $this->assign("cate_list", $cate_list);
        return $this->fetch();
    }


    /**
     * 操作cases
     */
    public function casesHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $banner_model = model('cases');
            if (empty($data['cate_id'])) {
                return ['status' => 0, 'msg' => '请填选择分类', 'data' => []];
            }
            if (empty($data['address'])) {
                return ['status' => 0, 'msg' => '请填写场所', 'data' => []];
            }
            if (empty($data['order_num'])) {
                return ['status' => 0, 'msg' => '填写订单数', 'data' => []];
            }
            if (empty($data['income'])) {
                return ['status' => 0, 'msg' => '填写收益数', 'data' => []];
            }
            if (empty($data['cycle'])) {
                return ['status' => 0, 'msg' => '请填写回本周期', 'data' => []];
            }
            if (empty($data['return'])) {
                return ['status' => 0, 'msg' => '请填写回报率', 'data' => []];
            }

            $helper_obj = new OriginalSqlHelper();
            $data['sort'] = $helper_obj->getSort($data['sort'], $banner_model, $id);

            if ($id) {
                $data['update_time'] = time();
                $content = '修改案例信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $banner_model->field($field)->where(['id' =>  $id])->find();
                $result = $banner_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $data['manager_id'] = $this->manager_id;
                $content = '添加案例信息';
                $before_json = [];
                $result = $banner_model->save($data);
                $data['id'] = $banner_model->getLastInsID();
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

    public function casesStatus()
    {
        if (request()->isPOST()) {
            $id = request()->post('id');
            $item = request()->post('item');
            if (!$id) {
                exit(json_encode(['status' => 0, 'msg' => SystemConstant::SYSTEM_NONE_PARAM, 'data' => []]));
            }
            $data =['id' => $id];
            $coupon = model('cases')->where($data)->field($item)->find();
            $result = model('cases')->where($data)->setField($item, 1-$coupon[$item]);
            if($result){
                $content = '修改案例显示状态';
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

    public function casesChange()
    {
        if (request()->isPOST()) {
            $id = request()->post('id');
            $cate_id = request()->post('cases_cate_id');

            if (!$id || !$cate_id) {
                exit(json_encode(['status' => 0, 'msg' => SystemConstant::SYSTEM_NONE_PARAM, 'data' => []]));
            }
            $arr = array_unique(explode('-',($id)));
            $data =['id' => ['in', $arr]];
            $coupon = model('cases')->where($data)->field('cate_id')->find();
            $result = model('cases')->where($data)->setField('cate_id', $cate_id);
            if($result){
                $content = '修改案例所属分类';
                $before_json = ['id' => $id, 'cate_id' => $coupon['cate_id']];
                $after_json = ['id' => $id, 'cate_id' => $cate_id];
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                $json_arr = ["status"=>1, "msg"=> SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
                exit(json_encode($json_arr));
            }else{
                $json_arr = ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
                exit(json_encode($json_arr));
            }
        }
    }

    /**
     * 删除cases
     */
    public function delcases()
    {
        if (request()->isPOST()) {

            $ids = request()->post('id');

            $cases_model = model('cases');
            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-',($ids)));

            $data = $cases_model->where(['id' => ['in', $arr]])->find();

            $del = $cases_model->destroy($arr);

            if($del){
                $before_json = $data;
                $after_json = [];
                $content = '删除案例';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            }else{
                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }

        }
    }



    /**
     * 要求
     */
    public function needList()
    {
        $need_model = model('need');
        $where = [];
        $keyword = request()->param('keyword');
        if ($keyword) {
            $where['name'] = ['like', "%{$keyword}%"];
        }

        $list = $need_model->where($where)->paginate(10);

        $this->assign('list', $list);
        $this->assign('keyword', $keyword);
        return $this->fetch();
    }

    /**
     * 要求天机添加
     */
    public function needAdd()
    {
        $need_model = model('need');
        $need_id = request()->param('need_id');
        $where = ['id' => $need_id];
        $cache = $need_model->where($where)->find();

        $this->assign("cache", $cache);

        return $this->fetch();
    }



    public function needHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $banner_model = model('need');
            if (empty($data['content'])) {
                return ['status' => 0, 'msg' => '请填要求', 'data' => []];
            }
            $helper_obj = new OriginalSqlHelper();
            $data['sort'] = $helper_obj->getSort($data['sort'], $banner_model, $id);

            if ($id) {
                $data['update_time'] = time();
                $content = '修改案例信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $banner_model->field($field)->where(['id' =>  $id])->find();
                $result = $banner_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $data['manager_id'] = $this->manager_id;
                $content = '添加案例信息';
                $before_json = [];
                $result = $banner_model->save($data);
                $data['id'] = $banner_model->getLastInsID();
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