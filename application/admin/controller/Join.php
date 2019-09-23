<?php


namespace app\admin\controller;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;
use app\admin\constant\ContentConstant;

class Join extends Base
{
    protected $content_model;

    public function __construct()
    {
        parent::__construct();
        $this->content_model = model('content');

    }
    /**
     * 优势
     */
    public function advantage()
    {
        $where = [ 'class_id' => ContentConstant::CONTENT_ADVANTAGE];

        $name  = request()->param('keyword','','trim');

        if ($name) {
            $where['title'] = ['like', '%'.$name.'%'];
        }

        $this->assign('keyword', $name);

        $list = $this->content_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);
        $this->assign('class_id', ContentConstant::CONTENT_ADVANTAGE);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_NONE);

        return $this->fetch();

    }

    public function addEditadvantage()
    {

        $id = request()->param('id');

        $cache = $this->content_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_ADVANTAGE);

        return $this->fetch(ContentConstant::COMMON_VIEW);

    }

    /**
     * 收益分配
     */
      public function income()
      {
          $name  = request()->param('keyword','','trim');
          if ($name) {
              $where['name'] = ['like', '%'.$name.'%'];
          }
          $where['delete_time']=null;
          $list = model('income')->where($where)->order('sort asc, id desc')->paginate(10);
          $this->assign('list', $list);
          $this->assign('keyword', $name);
          $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_SURE);
         return $this->fetch();
      }

      public function incomeAdd()
    {
        $income_model = model('income');
        $income_id = request()->param('income_id');
        $where = ['id' => $income_id];
        $cache = $income_model->where($where)->find();
        $this->assign("cache", $cache);
        return $this->fetch();
    }

    /**
     * 添加产品收益信息
     */
    public function incomeHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $banner_model = model('income');
            if (empty($data['name'])) {
                return ['status' => 0, 'msg' => '请填写名称', 'data' => []];
            }
            if (empty($data['price'])) {
                return ['status' => 0, 'msg' => '请填写单价', 'data' => []];
            }
            if (empty($data['unit'])) {
                return ['status' => 0, 'msg' => '请填写计价单位', 'data' => []];
            }
            if (empty($data['profit'])) {
                return ['status' => 0, 'msg' => '请填写利润分配', 'data' => []];
            }
            if (empty($data['amount'])) {
                return ['status' => 0, 'msg' => '请填写预期单日量', 'data' => []];
            }
            if (empty($data['income_day'])) {
                return ['status' => 0, 'msg' => '请填写日收益', 'data' => []];
            }
            if (empty($data['income_year'])) {
                return ['status' => 0, 'msg' => '请填写年收益', 'data' => []];
            }
            if (empty($data['pic'])) {
                return ['status' => 0, 'msg' => '请上传图片', 'data' => []];
            }
            $helper_obj = new OriginalSqlHelper();
            $data['sort'] = $helper_obj->getSort($data['sort'], $banner_model, $id);
            if ($id) {

                $data['update_time'] = time();
                $content = '修改收益预估';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $banner_model->field($field)->where(['id' =>  $id])->find();
                $result = $banner_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $data['manager_id'] = $this->manager_id;
                $content = '添加收益预估';
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