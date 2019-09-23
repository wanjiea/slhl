<?php


namespace app\admin\helper;

use app\admin\constant\EncryptionConstant;

class EncryptionHelper
{

    /**
     * 密码加密
     * @param $password
     * @return string
     */
    public function md5_encryption($password)
    {
        return md5(md5($password).EncryptionConstant::MD5_KEY);
    }
}