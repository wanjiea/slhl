<?php

namespace app\admin\controller;

class Index extends Base
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        /* $where = ['is_del' => 0, 'manager_id' => ['neq', $this->manager_id]];

         $comment =   model('comment')->where($where)->select();

         foreach ($comment as $k => $v) {
             if (in_array($this->manager_id, explode(',', $v['read_json']))) {
                 unset($comment[$k]);
             }
         }

         $where['reply_id'] = $this->manager_id;
         $comment_count = count($comment);
         $reply = model('comment_reply')->where($where)->select();

         foreach ($reply as $k => $v) {
             if (in_array($this->manager_id, explode(',', $v['read_json']))) {
                 unset($reply[$k]);
             }
         }

         $reply_count = count($reply);
         $this->assign('comment_count', $comment_count);
         $this->assign('reply_count', $reply_count);*/
        return $this->fetch();
    }

    public function main()
    {
        return $this->fetch();
    }


    /**
     * 图片上传 20180702 cx
     * @return array
     */
    public function addImage()
    {
        $type = input('post.type');

        switch ($type) {

            case 'mp3': //上传文件
                $ext = 'mp3';
                // 移动到框架应用根目录/public/uploads/picture 目录下
                $save_path = ROOT_PATH . 'public' . DS . 'uploads/mp3';
                break;
            case 'video': //上传视频
                $ext = 'mp4,swf,flv,webm,ogv';
                // 移动到框架应用根目录/public/uploads/picture 目录下
                $save_path = ROOT_PATH . 'public' . DS . 'uploads/video';
                break;
            case 'multiple': //多图
                $ext = 'jpg,png,gif,jpeg,ico';
                // 移动到框架应用根目录/public/uploads/picture 目录下
                $save_path = ROOT_PATH . 'public' . DS . 'uploads/picture';
                break;
            default: //单图
                $ext = 'jpg,png,gif,jpeg,ico';
                // 移动到框架应用根目录/public/uploads/picture 目录下
                $save_path = ROOT_PATH . 'public' . DS . 'uploads/picture';
        }

        // 获取表单上传文件 例如上传了001.jpg
        $upload = request()->file('upload_pic');

        $upload->validate(['size' => 1920 * 1024, 'ext' => $ext]); //设置附件上传类型

        $info = $upload->move($save_path);

        if ($info) {
            // 成功上传后 获取上传信息
            // 输出 jpg
            //echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            //echo $info->getSaveName();;
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            //echo $info->getFilename();
            $save_name = explode('\\', $info->getSaveName());
            return ['status' => 1, 'info' => '/uploads/picture/' . $save_name[0] . '/' . $save_name[1]];
        } else {
            // 上传失败获取错误信息
            //echo $upload->getError();
            return ['status' => 0, 'info' => $upload->getError()];
        }

    }
}