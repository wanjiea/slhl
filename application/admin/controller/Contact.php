<?php


namespace app\admin\controller;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;
use app\admin\constant\ContentConstant;

class Contact extends Base
{
    protected $contact_model;

    public function __construct()
    {
        parent::__construct();
        $this->contact_model = model('contact');

    }

    public function contact()
    {
        $id = request()->param('id', 1);

        $cache = $this->contact_model->where(['id' => $id])->find();

        $this->assign("cache", $cache);

        $action_name = strtolower(substr(request()->action(), 7));

        $this->assign('action_name', $action_name);

        $this->assign('class_id', ContentConstant::CONTENT_BUSINESS_CLASS_ONE);

        return $this->fetch();


    }

    public function contactHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);

            if (empty($data['name'])) {
                return ['status' => 0, 'msg' => "公司名称", 'data' => []];
            }

            if (empty($data['tel'])) {
                return ['status' => 0, 'msg' => "请填写电话", 'data' => []];
            }

            if (empty($data['address'])) {
                return ['status' => 0, 'msg' => "请填写地址", 'data' => []];
            }
            if (empty($data['pic'])) {
                return ['status' => 0, 'msg' => "请上传二维码", 'data' => []];
            }

            if ($id) {
                $data['update_time'] = time();
                $content = '修改联系我们信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $this->contact_model->field($field)->where(['id' =>  $id])->find();
                $result = $this->contact_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $content = '添加联系我们信息';
                $before_json = [];
                $result = $this->contact_model->save($data);
                $data['id'] = $this->contact_model->getLastInsID();
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

    public function feedback()
    {

        $feedback_db = model('Feedback');
        $where = [ ];

        $name  = request()->param('keyword');

        if ($name) {
            $where['name|tel'] = ['like', '%'.$name.'%'];
        }

        $this->assign('keyword', $name);
        $cache = $feedback_db->where($where)->order('add_time desc')->paginate(10,false);
        foreach ($cache as $k => $v) {
            $cache[$k]['add_time']=date('Y-m-d H:i:s',$v['add_time']);
        }

        $this->assign('list', $cache);

        return $this->fetch();

    }

    public function feedbackDetail()
    {
        $feedback_db = model('Feedback');

        $id = input('param.id');

        if ($id) {

            $cache = $feedback_db->where(['id' => $id])->order('add_time desc')->find();

            $cache['add_time']=date('Y-m-d H:i:s',$cache['add_time']);

            $this->assign('cache', $cache);

        }

        return $this->fetch();

    }

    public function delFeedback()
    {
        if (request()->isPOST()) {
            $ids = request()->post('id');

            $feedback_db = model('Feedback');

            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-',($ids)));

            $data = $feedback_db->where(['id' => ['in', $arr]])->find();

            $del = $feedback_db->destroy($arr);

            if($del){
                $before_json = $data;
                $after_json = [];
                $content = '删除留言';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            }else{
                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }

        }
    }
}