<?php


namespace app\admin\controller;
use app\admin\helper\EncryptionHelper;
use app\admin\helper\MenuHelper;
use app\admin\helper\OriginalSqlHelper;
use app\admin\helper\MangerHelper;
use app\admin\constant\SystemConstant;
use app\admin\constant\ManagerConstant;

class Manager extends Base
{
    protected $manager_model;
    protected $manager_cate_model;

    public function __construct()
    {
        parent::__construct();
        $this->manager_model = model('manager');
        $this->manager_cate_model = model('ManagerCate');
    }

    /**
     * 管理员列表
     */
    public function managerList()
    {
        /*$where = ['is_del' => 0];
        $keyword = request()->param('keyword');
        if ($keyword) {
            $where['manager_name'] = ['like', "%{$keyword}%"];
        }*/

        $where = 'is_del = 0';
        $keyword = request()->param('keyword');
        if ($keyword) {
            $where .= " AND manager_name like '%".$keyword."%'";
        }

        $manager = $this->manager_model->field('id, manager_cate_id')->where(['id' => $this->manager_id])->find();

        if ($manager['id'] != ManagerConstant::SUPREME_AUTHORITY) {
            $where .= ' AND ((manager_cate_id ='.$manager['manager_cate_id'].' AND id = '.$manager['id'];
            $where .= ') OR manager_cate_id > '.$manager['manager_cate_id'].')';
        }

        $list = $this->manager_model->where($where)->order('id asc')->paginate(10);

        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 添加管理员列表
     */
    public function managerAdd()
    {
        $manager_id = request()->param('manager_id');
        $cache = $this->manager_model->where(['is_del' => 0, 'id' => $manager_id])->find();
        $this->assign("cache", $cache);

        $manager_cate = $this->manager_cate_model->where(['is_del' => 0])->select();

        $uid = session('manager_id');

        $manager = $this->manager_model->field('id, manager_cate_id')->where(['id' => $uid])->find();

        foreach ($manager_cate as $k => $v) {

            if ($manager['id'] == 1) {
                if ($manager_id == $manager['id']) {
                    if ($cache['manager_cate_id'] == $manager['manager_cate_id'] && $v['id'] != $manager['manager_cate_id']) {
                        unset($manager_cate[$k]);
                    }
                }
            } else {
                if ($manager_id) {
                    if ($cache['manager_cate_id'] == $manager['manager_cate_id'] && $v['id'] != $manager['manager_cate_id']) {
                        unset($manager_cate[$k]);
                    }
                } else {
                    if ($v['id'] <= $manager['manager_cate_id']) {
                        unset($manager_cate[$k]);
                    }
                }
            }

        }
        $this->assign('manager_cate', $manager_cate);
        return $this->fetch();
    }

    /**
     * 删除管理员
     */
    public function managerHandle()
    {
        if (request()->isPost()) {
            $data = [];
            $data['manager_name'] = request()->post('manager_name');
            $data['telephone'] = request()->post('telephone');
            $password = request()->post('password');
            $data['manager_cate_id'] = request()->post('manager_cate_id');
            $data['head_image'] = request()->post('head_image');
            $data['work_no'] = request()->post('work_no');

            if (!$data['head_image']) {
                return ['status' => 0, 'msg' => '请上传头像', 'data' => []];
            }

            if (!$data['manager_cate_id']) {
                return ['status' => 0, 'msg' => '请选择角色', 'data' => []];
            }
            if ($data['work_no'] == '') {
                return ['status' => 0, 'msg' => '请填写工号', 'data' => []];
            }
            if (!$data['manager_name']) {
                return ['status' => 0, 'msg' => '请填写用户名', 'data' => []];
            }

            if (!$data['telephone']) {
                return ['status' => 0, 'msg' => '请填写手机号', 'data' => []];
            }

            if(!preg_match("/^1[345789]\d{9}$/", $data['telephone'])){
                return ['status' => 0, 'msg' => '手机号格式不正确', 'data' => []];
            }

            $id = request()->post('id');
            $helper_obj = new EncryptionHelper();
            if ($password) {
                $data['password'] = $helper_obj->md5_encryption($password);
            }
            if ($id) {
                $manager = $this->manager_model->where(['id' => ['neq', $id], 'telephone' => $data['telephone']])->find();
                if ($manager) {
                    return ['status' => 0, 'msg' => '手机号已存在', 'data' => []];
                }
                $data['update_time'] = time();
                $content = '修改管理员信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $this->manager_model->field($field)->where(['id' =>  $id])->find();
                $result = $this->manager_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;

            } else {
                $manager = $this->manager_model->where(['telephone' => $data['telephone']])->find();
                if ($manager) {
                    return ['status' => 0, 'msg' => '手机号已存在', 'data' => []];
                }
                $data['create_time'] = time();
                $content = '添加管理员信息';
                $before_json = [];
                $result = $this->manager_model->save($data);
                $data['id'] = $this->manager_model->getLastInsID();
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
     * 删除管理员
     */
    public function delManager()
    {
        if (request()->isPOST()) {

            $ids = request()->post('id');

            if (!$ids) {
                $this->error(SystemConstant::SYSTEM_NONE_PARAM);
            }

            $arr = array_unique(explode('-',($ids)));

            $data = $this->manager_model->where(['id' => ['in', $arr]])->find();

            $del = $this->manager_model->destroy($arr);

            if($del){
                $before_json = $data;
                $after_json = [];
                $content = '删除管理员';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];

            }else{

                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];

            }

        }
    }

    public function managerLog()
    {
        $list = model('manager_log')->where(['is_del' => 0])->order('add_time desc')->paginate(15);
        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 管理员分类列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function managerCateList()
    {
        $list = $this->manager_cate_model->where(['is_del' => 0])->paginate(10);
        $manager = $this->manager_model->field('id, manager_cate_id')->where(['id' => $this->manager_id])->find();

        foreach ($list as $k => $v) {

            $is_edit = 1;
            if ($manager['id'] != 1 && ($v['id'] <= $manager['manager_cate_id'] || $v['id'] == 1)) {
                $is_edit = 0;
            }
            $list[$k]['is_edit'] = $is_edit;
        }

        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 修改管理员分类
     */
    public function managerCateAdd()
    {
        $manager_id = request()->param('manager_id');
        $detail = $this->manager_cate_model->where(['is_del' => 0, 'id' => $manager_id])->find();
        $this->assign("detail", $detail);

        $right = model('manager_menu')->where(['is_del' => 0])->order('id')->select();
        foreach ($right as $val){
            $val['enable'] = 0;
            if(!empty($detail) && $detail['act_list'] && $detail['id'] != 1){
                $val['enable'] = in_array($val['id'], explode(',', $detail['act_list']));
            }
            $modules[$val['group']][] = $val;
        }
        //权限组
        $menu_helper = new MenuHelper();
        $group = $menu_helper->leftMenu();
        $modules = array_merge(array_flip(array_keys($group)), $modules);
        $this->assign('group',$group);
        $this->assign('modules',$modules);
        return $this->fetch();
    }

    /**
     * 添加删除管理员分类
     */
    public function managerCateHandle()
    {
        if (request()->isPost()) {
            $post = request()->post();
            $data = $post['data'];
            if (!$data['manager_cate_name']) {
                return ['status' => 0, 'msg' => '请填写角色名称', 'data' => []];
            }
            $id = request()->post('id');

            if($id == ManagerConstant::SUPREME_AUTHORITY) {
                $data['act_list'] = 'all';
            } else {
                $post['right'] = isset($post['right'])?$post['right']:'';
                $data['act_list'] = is_array($post['right']) ? implode(',', $post['right']) : '';

                if(empty($data['act_list'])) {
                    return ['status' => 0, 'msg' => '请选择权限', 'data' => []];
                }
            }
            if ($id) {
                $admin_role = $this->manager_cate_model->where(['manager_cate_name'=>$data['manager_cate_name'],'id'=>['neq', $id]])->find();
                if($admin_role){
                    return ['status' => 0, 'msg' => '已存在相同的角色名称', 'data' => []];
                }
                $data['update_time'] = time();
                $content = '修改管理员角色信息';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json = $this->manager_cate_model->field($field)->where(['id' =>  $id])->find();
                $result = $this->manager_cate_model->save($data, ['id' => $id]);
                $data['id'] = $id;
                $after_json = $data;
            } else {
                $admin_role = $this->manager_cate_model->where(['manager_cate_name'=>$data['manager_cate_name']])->find();
                if($admin_role){
                    return ['status' => 0, 'msg' => '已存在相同的角色名称', 'data' => []];
                }
                $data['create_time'] = time();
                $before_json = [];
                $content = '添加管理员角色信息';
                $result = $this->manager_cate_model->save($data);
                $data['id'] = $this->manager_cate_model->getLastInsID();
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

    /*public function delManagerCate()
    {
        if (request()->isPOST()) {

            $ids = input('post.id');

            $del = $this->mySql_del($ids, 'manager_cate');

            if($del){

                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];

            }else{

                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];

            }

        }
    }*/


    /**
     * 权限列表
     * @return mixed
     */
    function rightList(){
        $menu_helper = new MenuHelper();
        $group = $menu_helper->leftMenu();
        $name = request()->param('name');
        $is_group = request()->param('is_group');
        $condition['is_del'] = 0;
        if($name){
            $condition['name|right'] = ['like',"%$name%"];
        }
        if($is_group){
            $condition['group'] = $is_group;
        }
        $right_list = model('manager_menu')->where($condition)->order('group asc, id desc')->paginate(10);
        $this->assign('right_list',$right_list);
        $this->assign('group',$group);
        $this->assign('is_group',$is_group);
        return $this->fetch();
    }

    /**
     * 编辑权限列表
     * @return mixed
     */
    public function editRight(){
        $id = request()->param('id');
        $info['id'] = '';
        $info['name'] = '';
        $info['group'] = '';
        $info['right'] = '';
        if($id){
            $info = model('manager_menu')->where(['id'=>$id])->find();
            $info['right'] = explode(',', $info['right']);
        }
        $this->assign('info',$info);
        $menu_helper = new MenuHelper();
        $group = $menu_helper->leftMenu();
        $planPath = APP_PATH.'admin/controller';
        $planList = [];
        $dirRes   = opendir($planPath);
        while($dir = readdir($dirRes))
        {
            if(!in_array($dir,['.','..','.svn']))
            {
                $planList[] = basename($dir,'.php');
            }
        }
        $this->assign('planList',$planList);
        $this->assign('group',$group);
        return $this->fetch();
    }

    public function rightHandle()
    {
        if(request()->isPost()){
            $data = request()->post();
            $data['right'] = implode(',',$data['right']);
            if(!empty($data['id'])){
                $id = $data['id'];
                $data['update_time'] = time();
                $content = '修改权限';
                $field = array_keys($data);
                $field[] = 'id';
                $before_json =  model('manager_menu')->field($field)->where(['id' =>  $id])->find();
                $result = model('manager_menu')->save($data, ['id' => $data['id']]);
                $data['id'] = $id;
                $after_json = $data;
            }else{
                if(model('manager_menu')->where(['name'=>$data['name']])->count()>0){
                    return ['status' => 0, 'msg' => '该权限名称已添加', 'data' => []];
                }
                unset($data['id']);
                $data['create_time'] = time();
                $before_json = [];
                $content = '添加权限';
                $result = model('manager_menu')->save($data);
                $data['id'] =  model('manager_menu')->getLastInsID();
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
     * 删除权限列表
     * @return mixed
     */
    public function rightDel(){
        if (request()->isPOST()) {

            $ids = request()->post('id');

            $arr = array_unique(explode('-',($ids)));

            $data = model('manager_menu')->where(['id' => ['in', $arr]])->find();

            $del = model('manager_menu')->destroy($arr);

            if($del){
                $before_json = $data;
                $after_json = [];
                $content = '删除权限';
                $helper_obj = new MangerHelper();
                $helper_obj->managerLog($this->manager_id, $content, $before_json, $after_json);
                return ["status"=>1, "msg"=>SystemConstant::SYSTEM_OPERATION_SUCCESS, 'data' => []];

            }else{

                return ["status"=>0, "msg"=>SystemConstant::SYSTEM_OPERATION_FAILURE, 'data' => []];

            }

        }
    }

    function ajax_get_action()
    {
        $control = request()->post('controller');
        $advContrl = get_class_methods("app\\admin\\controller\\".str_replace('.php','',$control));
        $baseContrl = get_class_methods('app\\admin\\controller\\Base');
        $diffArray  = array_diff($advContrl,$baseContrl);
        $html = '';
        foreach ($diffArray as $val){
            $html .= "<option value='".$val."'>".$val."</option>";
        }
        exit($html);
    }
}