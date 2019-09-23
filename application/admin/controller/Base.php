<?php
namespace app\admin\controller;

use \think\Controller;
use app\admin\helper\MenuHelper;
use app\admin\constant\SystemConstant;

class Base extends Controller{

    protected $manager_id;

    public function __construct()
    {
        parent::__construct();

        $this->assign('controller_name', request()->controller());
        $this->assign('a_action_name', request()->action());

        $this->manager_id = session('manager_id');

        if(!$this->manager_id) {
            //判断用户是否已经登录
            $this->redirect(url('Admin/login'));
        }

        $prefix = config('prefix');
        $manager = model('manager')
            ->alias('m')
            ->join($prefix.'manager_cate m_c', 'm.manager_cate_id = m_c.id','INNER')
            ->field('m.*,m_c.act_list')
            ->where(['m.id' => $this->manager_id])
            ->find();
        if ($manager['act_list'] == 'all') {
            $act_list = $manager['act_list'];
        } else {
            $act_list = explode(',', $manager['act_list']);
        }
        $menu_helper = new MenuHelper();
        $leftMenu = $menu_helper->getMenuList($act_list);
        $this->assign('left_menu', $leftMenu);
        $this->assign('manager', $manager);

        $ctl = request()->controller();

        $act = request()->action();


        if($ctl == 'Index' || $act_list == 'all'){
            //后台首页控制器无需验证,超级管理员无需验证
        } else{
            $right = model('manager_menu')->where("id", "in", $act_list)->field('right')->select();
            $role_right = '';
            foreach ($right as $val){
                $role_right .= $val['right'].',';
            }
            $role_right = explode(',', $role_right);
            //检查是否拥有此操作权限
            $is_true = 0;
            foreach ($role_right as $v) {
                if (strnatcasecmp($ctl.'@'.$act, $v) == 0) {
                    $is_true = 1;
                }
            }

            if($is_true == 0){
                if (request()->isPost()) {
                    echo json_encode(['status' => 0, 'msg' => '['.($ctl.'@'.$act).']'.SystemConstant::SYSTEM_NONE_OPTION_PERMISSION, 'data' => []]);
                } else {
                    $this->error('['.($ctl.'@'.$act).']'.SystemConstant::SYSTEM_NONE_OPTION_PERMISSION);
                }
                die;
            }
        }
    }


    /*   protected function delFile($srcfile)
       {   //删除文件
           $srcfile=str_replace(__ROOT__.'/', '', str_replace('//', '/', $srcfile));
           if (file_exists($srcfile))
               unlink($srcfile);
           print_r($srcfile);
           exit;
       }

       public function emojiToImg($text){
           $biaoqing = array();
           $bqimg = array();
           for ($i = 1; $i <= 75; $i++) {
               $biaoqing[] = '/\[em_'.$i.'\]/';
               $bqimg[] = '<img src="/Base/Home/images/arclist/'.$i.'.gif">';
           }
           return preg_replace($biaoqing,$bqimg,$text);
       }*/


}