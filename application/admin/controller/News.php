<?php


namespace app\admin\controller;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;

class News extends Base
{
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * 新闻
     */
    public function newsList()
    {
        $news_model = model('news');
        $where = [];
        $keyword = request()->param('keyword');
        $cate_id = request()->param('cate_id');
        if ($keyword) {
            $where['title'] = ['like', "%{$keyword}%"];
        }

        if ($cate_id) {
            $where['cate_id'] = $cate_id;
        }
        $list = $news_model->where($where)->order('add_time desc, sort asc, id desc')->paginate(10);

        $this->assign('list', $list);
        $this->assign('keyword', $keyword);
        $this->assign('cate_id', $cate_id);

        $cate_list = model('news_cate')->order('sort asc, id desc')->select();
        $this->assign("cate_list", $cate_list);
        return $this->fetch();
    }

    /**
     * 添加新闻
     */
    public function newsAdd()
    {
        $news_model = model('news');
        $news_id = request()->param('news_id');
        $where = ['id' => $news_id];
        $cache = $news_model->where($where)->find();

        $this->assign("cache", $cache);

        $cate_list = model('news_cate')->order('sort asc, id desc')->select();
        $this->assign("cate_list", $cate_list);
        return $this->fetch();
    }


    /**
     * 操作news
     */
    public function newsHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $news_model = model('news');

            if (!$data['title']) {
                return ['status' => 0, 'msg' => '请填写标题', 'data' => []];
            }

            $helper_obj = new OriginalSqlHelper();
            $data['sort'] = $helper_obj->getSort($data['sort'], $news_model, $id);


            if ($id) {
                $data['update_time'] = time();
                $content = '修改新闻信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $news_model->field($field)->where(['id' =>  $id])->find();
                $result = $news_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $content = '添加新闻信息';
                $before_json = [];
                $result = $news_model->save($data);
                $data['id'] = $news_model->getLastInsID();
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

    public function newsStatus()
    {
        if (request()->isPOST()) {
            $id = request()->post('id');
            $item = request()->post('item');
            if (!$id) {
                exit(json_encode(['status' => 0, 'msg' => SystemConstant::SYSTEM_NONE_PARAM, 'data' => []]));
            }
            $data =['id' => $id];
            $coupon = model('news')->where($data)->field($item)->find();
            $result = model('news')->where($data)->setField($item, 1-$coupon[$item]);
            if($result){
                $content = '修改新闻显示状态';
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

    public function newsChange()
    {
        if (request()->isPOST()) {
            $id = request()->post('id');
            $cate_id = request()->post('news_cate_id');

            if (!$id || !$cate_id) {
                exit(json_encode(['status' => 0, 'msg' => SystemConstant::SYSTEM_NONE_PARAM, 'data' => []]));
            }
            $arr = array_unique(explode('-',($id)));
            $data =['id' => ['in', $arr]];
            $coupon = model('news')->where($data)->field('cate_id')->find();
            $result = model('news')->where($data)->setField('cate_id', $cate_id);
            if($result){
                $content = '修改新闻所属分类';
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
     * 删除News
     */
    public function delNews()
    {
        if (request()->isPOST()) {

            $ids = request()->post('id');

            $news_model = model('news');
            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-',($ids)));

            $data = $news_model->where(['id' => ['in', $arr]])->find();

            $del = $news_model->destroy($arr);

            if($del){
                $before_json = $data;
                $after_json = [];
                $content = '删除新闻';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            }else{
                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }

        }
    }

    /**
     * 新闻
     */
    public function newsCateList()
    {
        $news_model = model('news_cate');
        $where = [];
        $keyword = request()->param('keyword');
        if ($keyword) {
            $where['title'] = ['like', "%{$keyword}%"];
        }

        $list = $news_model->where($where)->order('sort asc, id desc')->paginate(10);

        $this->assign('list', $list);
        $this->assign('keyword', $keyword);
        $this->assign('is_del', SystemConstant::SYSTEM_IS_DEL_NONE);
        return $this->fetch();
    }

    /**
     * 添加新闻
     */
    public function newsCateAdd()
    {
        $news_model = model('news_cate');
        $news_id = request()->param('news_id');
        $where = ['id' => $news_id];
        $cache = $news_model->where($where)->find();

        $this->assign("cache", $cache);
        return $this->fetch();
    }


    /**
     * 操作news
     */
    public function newsCateHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $news_model = model('news_cate');

            if (!$data['class_name']) {
                return ['status' => 0, 'msg' => '请填写分类名称', 'data' => []];
            }

            $helper_obj = new OriginalSqlHelper();
            $data['sort'] = $helper_obj->getSort($data['sort'], $news_model, $id);

            if ($id) {
                $data['update_time'] = time();
                $content = '修改新闻分类';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $news_model->field($field)->where(['id' =>  $id])->find();
                $result = $news_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $content = '添加新闻分类';
                $before_json = [];
                $result = $news_model->save($data);
                $data['id'] = $news_model->getLastInsID();
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
     * 删除News
     */
    public function delNewsCate()
    {
        if (request()->isPOST()) {

            $ids = request()->post('id');

            $news_model = model('news_cate');

            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-',($ids)));

            $data = $news_model->where(['id' => ['in', $arr]])->find();

            $del = $news_model->destroy($arr);

            if($del){
                $before_json = $data;
                $after_json = [];
                $content = '删除新闻分类';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            }else{
                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }

        }
    }

}