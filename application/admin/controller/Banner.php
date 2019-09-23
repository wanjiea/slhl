<?php


namespace app\admin\controller;
use app\admin\helper\MangerHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\constant\SystemConstant;
use app\admin\constant\BannerConstant;

class Banner extends Base
{
    public function __construct()
    {
        parent::__construct();

    }

    public function banner()
    {
        $banner = [
            1=>'首页',
            2=>'产品介绍',
            3=>'新闻资讯',
            4=>'代理加盟',
        ];
        return $banner;
    }

    /**
     * banner列表
     */
    public function bannerList()
    {
        $banner_model = model('banner');

        $keyword = request()->param('keyword');
        if ($keyword) {
            $where['title'] = ['like', "%{$keyword}%"];
        }

        $list = $banner_model->order('sort asc, id desc')->paginate(10);
        $cate_list = $this->banner();
        $this->assign('cate_list', $cate_list);
        $this->assign('list', $list);
        $this->assign('keyword', $keyword);
        return $this->fetch();
    }

    /**
     * 添加banner列表
     */
    public function bannerAdd()
    {

        $banner_model = model('banner');
        $banner_id = request()->param('banner_id');
        $class_id = request()->param('class_id');
        $where = ['id' => $banner_id];
        $cache = $banner_model->where($where)->find();

        $cate_list = $this->banner();
        $this->assign('cate_list', $cate_list);
        $this->assign("cache", $cache);
        $this->assign("class_id", $class_id);
        return $this->fetch();
    }


    /**
     * 操作banner
     */
    public function bannerHandle()
    {
        if (request()->isPost()) {
            $data = request()->post();
            $id = request()->post('id', 0);
            $class_id = input('class_id');
//            echo $class_id;die;
            $banner_model = model('banner');
         

            if (empty($data['title'])) {
                return ['status' => 0, 'msg' => '请填写标题', 'data' => []];
            }
            if (empty($data['sub_title'])) {
                return ['status' => 0, 'msg' => '请填写副标题', 'data' => []];
            }
            if (empty($data['en_title'])) {
                return ['status' => 0, 'msg' => '请填写英文标题', 'data' => []];
            }
            if (empty($data['pic'])) {
                return ['status' => 0, 'msg' => '请填上传图片', 'data' => []];
            }
            $helper_obj = new OriginalSqlHelper();
            $data['sort'] = $helper_obj->getSort($data['sort'], $banner_model, $id);
            $banner = $this->banner();
            $msg = $banner[$class_id];
//            if ($id) {
                $data['update_time'] = time();
                $content = '修改'.$msg.'banner信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $banner_model->field($field)->where(['class_id' =>  $class_id])->find();
                $result = $banner_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;
//            }
//            else {
//                $data['add_time'] = time();
//                $data['create_time'] = time();
//                $data['manager_id'] = $this->manager_id;
//                $content = '添加'.$msg.'banner信息';
//                $before_json = [];
//                $result = $banner_model->save($data);
//                $data['id'] = $banner_model->getLastInsID();
//                $after_json = $data;
//            }
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
    public function delBanner()
    {
        if (request()->isPOST()) {

            $ids = request()->post('id');

            $banner_model = model('banner');
            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-',($ids)));

            $data = $banner_model->where(['id' => ['in', $arr]])->find();

            $del = $banner_model->destroy($arr);

            if($del){
                $before_json = $data;
                $after_json = [];
                $content = '删除Banner';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];
            }else{
                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];
            }

        }
    }

    public function upDown()
    {
        if (request()->isPOST()) {
            $data   = request()->post('');
            $id = $data['id'];
            $num = $data['num'];
            $search = $data['search'];
            $helper_obj = new OriginalSqlHelper();
            $result = $helper_obj->getUpDown('Banner', $id, $num, $search?$search:[]);

            if ($result['status']  == 1) {
                $helper_obj = new MangerHelper();
                $content = '首页Banner排序移动';
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


}