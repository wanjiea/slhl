<?php


namespace app\admin\controller;

use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;
use Think\Db;

class Product extends Base
{
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * 案例
     */
    public function productList()
    {
        $product_model = model('product');
        $where = [];
        $keyword = request()->param('keyword');
        $cate_id = request()->param('cate_id');
        if ($keyword) {
            $where['title'] = ['like', "%{$keyword}%"];
        }

        if ($cate_id) {
            $where['cate_id'] = $cate_id;
        }
        $list = $product_model->where($where)->order('sort asc')->paginate(10);

        $this->assign('list', $list);
        $this->assign('keyword', $keyword);
        $this->assign('cate_id', $cate_id);

        $cate_list = model('product_cate')->order('sort asc, id desc')->select();
        $this->assign("cate_list", $cate_list);
        return $this->fetch();
    }

    /**
     * 添加案例
     */
    public function productAdd()
    {

        $product_model = model('product');
        $product_id = request()->param('product_id');
        $where = ['id' => $product_id];
        $cache = $product_model->where($where)->find();
        if ($cache) {
            $cache['param'] = model('product_param')->where(['product_id' => $product_id])->order('sort asc')->select();
        }
//        dump($cache['advantage']);
//        dump($cache['specification']);
//        dump($cache['scenes']);
        $this->assign("cache", $cache);

        $cate_list = model('product_cate')->order('sort asc, id desc')->select();
        $this->assign("cate_list", $cate_list);
        return $this->fetch();
    }


    /**
     * 操作product
     */
    public function productHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $product_model = model('product');

            if (!$data['title']) {
                return ['status' => 0, 'msg' => '请填写名称', 'data' => []];
            }
            if (!$data['en_title']) {
                return ['status' => 0, 'msg' => '请填写英文名称', 'data' => []];
            }
            if (!$data['describe']) {
                return ['status' => 0, 'msg' => '请填写描述', 'data' => []];
            }
            if (empty($data['pic'])) {
                return ['status' => 0, 'msg' => '请填上传主图', 'data' => []];
            }
            if (empty($data['big_pic'])) {
                return ['status' => 0, 'msg' => '请填上传副图', 'data' => []];
            }
            if (!isset($data['scenes_name'])) {
                return ['status' => 0, 'msg' => '请填写应用场景', 'data' => []];
            }
            if (!isset($data['advantage_name'])) {
                return ['status' => 0, 'msg' => '请填写产品优点', 'data' => []];
            }
            if (!isset($data['specification_name'])) {
                return ['status' => 0, 'msg' => '请填写产品规格', 'data' => []];
            }


            $scenes = [];
            foreach ($data['scenes_name'] as $k => $scenes_name_v) {
                $scenes [] = ['name' => $scenes_name_v, 'en_name' => $data['scenes_value'][$k], 'pic' => $data['scenes_pic'][$k]];
            }
            $data['scenes'] = $scenes;//场景
            $data['scenes'] = serialize($scenes);//规格
            unset($data['scenes_name']);
            unset($data['scenes_value']);
            unset($data['scenes_pic']);
            $advantage = [];
            foreach ($data['advantage_name'] as $k => $advantage_name_v) {
                $advantage [] = ['title' => $advantage_name_v, 'sub_title' => $data['advantage_value'][$k]];
            }
            $data['advantage'] = $advantage;//优点
            unset($data['advantage_name']);
            unset($data['advantage_value']);
            $data['advantage'] = serialize($advantage);//规格
            $specification = [];
            foreach ($data['specification_name'] as $k => $specification_name_v) {
                $specification [] = ['title' => $specification_name_v, 'sub_title' => $data['specification_value'][$k]];
            }
            unset($data['specification_name']);
            unset($data['specification_value']);
            $data['specification'] = serialize($specification);//规格

            $helper_obj = new OriginalSqlHelper();
            $data['sort'] = $helper_obj->getSort($data['sort'], $product_model, $id);

            if ($id) {
                $data['update_time'] = time();
                $content = '修改产品信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $product_model->field($field)->where(['id' => $id])->find();
                $result = $product_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $data['create_time'] = time();
                $content = '添加产品信息';
                $before_json = [];
                $result = $product_model->save($data);
                $data['id'] = $product_model->getLastInsID();
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

    public function productStatus()
    {
        if (request()->isPOST()) {
            $id = request()->post('id');
            $item = request()->post('item');
            if (!$id) {
                exit(json_encode(['status' => 0, 'msg' => SystemConstant::SYSTEM_NONE_PARAM, 'data' => []]));
            }
            $data = ['id' => $id];
            $coupon = model('product')->where($data)->field($item)->find();
            $result = model('product')->where($data)->setField($item, 1 - $coupon[$item]);
            if ($result) {
                $content = '修改案例显示状态';
                $before_json = ['id' => $id, $item => $coupon[$item]];
                $after_json = ['id' => $id, $item => 1 - $coupon[$item]];
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                $json_arr = ["status" => 1, "msg" => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => [$item => 1 - $coupon[$item]]];
                exit(json_encode($json_arr));
            } else {
                $json_arr = ["status" => 0, "msg" => SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
                exit(json_encode($json_arr));
            }
        }
    }

    public function productChange()
    {
        if (request()->isPOST()) {
            $id = request()->post('id');
            $cate_id = request()->post('product_cate_id');

            if (!$id || !$cate_id) {
                exit(json_encode(['status' => 0, 'msg' => SystemConstant::SYSTEM_NONE_PARAM, 'data' => []]));
            }
            $arr = array_unique(explode('-', ($id)));
            $data = ['id' => ['in', $arr]];
            $coupon = model('product')->where($data)->field('cate_id')->find();
            $result = model('product')->where($data)->setField('cate_id', $cate_id);
            if ($result) {
                $content = '修改案例所属分类';
                $before_json = ['id' => $id, 'cate_id' => $coupon['cate_id']];
                $after_json = ['id' => $id, 'cate_id' => $cate_id];
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                $json_arr = ["status" => 1, "msg" => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
                exit(json_encode($json_arr));
            } else {
                $json_arr = ["status" => 0, "msg" => SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
                exit(json_encode($json_arr));
            }
        }
    }

    public function productUpDown()
    {
        if (request()->isPOST()) {
            $data = request()->post('');
            $id = $data['id'];
            $num = $data['num'];
            $search = isset($data['search']) ? $data['search'] : '';
            $helper_obj = new OriginalSqlHelper();
            $result = $helper_obj->getUpDown('product', $id, $num, $search ? $search : []);
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

    /**
     * 删除product
     */
    public function delproduct()
    {
        if (request()->isPOST()) {

            $ids = request()->post('id');

            $product_model = model('product');
            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-', ($ids)));

            $data = $product_model->where(['id' => ['in', $arr]])->find();

            $del = $product_model->destroy($arr);

            if ($del) {
                $before_json = $data;
                $after_json = [];
                $content = '删除案例';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status" => 1, "msg" => SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            } else {
                return ["status" => 0, "msg" => SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }

        }
    }


}