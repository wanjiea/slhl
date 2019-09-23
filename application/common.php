<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function ajaxReturn($data) {
   exit(json_encode(removeNull($data)));
}

function removeNull($data)
{
    if (is_array($data)) {
        foreach ($data as $k => $v) {
            if (is_null($v)) {
                $data[$k] = '';
            } else {
                $data[$k] = removeNull($data[$k]);
            }
        }
    }
    return $data;
}
/**
 * 对查询结果集进行排序
 *
 * @access public
 * @param array $list
 *        	查询结果
 * @param string $field
 *        	排序的字段名
 * @param array $sortby
 *        	排序类型
 *        	asc正向排序 desc逆向排序 nat自然排序
 * @return array
 *
 */
function list_sort_by($list, $field, $sortby = 'asc') {
    if (is_array ( $list )) {
        $refer = $resultSet = array ();
        foreach ( $list as $i => $data )
            $refer [$i] = &$data [$field];
        switch ($sortby) {
            case 'asc' : // 正向排序
                asort ( $refer );
                break;
            case 'desc' : // 逆向排序
                arsort ( $refer );
                break;
            case 'nat' : // 自然排序
                natcasesort ( $refer );
                break;
        }
        foreach ( $refer as $key => $val )
            $resultSet [] = &$list [$key];
        return $resultSet;
    }
    return false;
}

/**
 * @param $arr
 * @param $key_name
 * @param $key_name2
 * @return array
 * 将数据库中查出的列表以指定的 id 作为数组的键名 数组指定列为元素 的一个数组
 */
function get_id_val($arr, $key_name,$key_name2)
{
    $arr2 = array();
    foreach($arr as $key => $val){
        $arr2[$val[$key_name]] = $val[$key_name2];
    }
    return $arr2;
}

/**
 * 获取数组中的某一列
 * @param type $arr 数组
 * @param type $key_name  列名
 * @return type  返回那一列的数组
 */
function get_arr_column($arr, $key_name)
{
    $arr2 = array();
    foreach($arr as $key => $val){
        $arr2[] = $val[$key_name];
    }
    return $arr2;
}

/**
 * @param $arr
 * @param $key_name
 * @return array
 * 将数据库中查出的列表以指定的 id 作为数组的键名
 */
function convert_arr_key($arr, $key_name)
{
    $arr2 = array();
    foreach($arr as $key => $val){
        $arr2[$val[$key_name]] = $val;
    }
    return $arr2;
}

/**
 * 上传图片
 * @param $base64_img 图片
 * @param $up_dir 存储路径
 * @return array 返回图片
 */
function uploadImage($base64_img, $up_dir)
{
    if(!file_exists($up_dir)){
        mkdir($up_dir,0777,true);
    }
    if(preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $result)){
        $type = $result[2];
        if(in_array($type,array('pjpeg','jpeg','jpg','gif','bmp','png'))){
            $new_file = $up_dir.date('YmdHis').'.'.$type;
            if(file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_img)))){
                $img_path = substr(str_replace('../../..', '', $new_file), 1);
                //$img_path_arr[] = $img_path;
                //$pic_show[] = $this->PictureUrlDispose($img_path);
                $json_arr =  ["status"=>1, "msg"=>'图片上传成功', 'data' => ['pic' => $img_path]];
                return $json_arr;
            }else{
                $json_arr =  ["status"=>0, "msg"=>'图片上传失败', 'data' => []];
                return $json_arr;
            }
        }else{
            //文件类型错误
            $json_arr =  ["status"=>0, "msg"=>'图片上传类型错误', 'data' => []];
            return $json_arr;
        }
    }else{
        //文件错误
        $json_arr =  ["status"=>0, "msg"=>'文件错误', 'data' => []];
        return $json_arr;
    }
}

/**
 *  商品缩略图 给于标签调用 拿出商品表的 original_img 原始图来裁切出来的
 * @param type $goods_id  商品id
 * @param type $width     生成缩略图的宽度
 * @param type $height    生成缩略图的高度
 */
function goods_thum_images($goods_id,$width,$height){

    if(empty($goods_id))
        return '';
    //判断缩略图是否存在
    $path = "uploads/goods/thumb/$goods_id/";
    $goods_thumb_name ="goods_thumb_{$goods_id}_{$width}_{$height}";

    // 这个商品 已经生成过这个比例的图片就直接返回了
    if(file_exists($path.$goods_thumb_name.'.jpg'))  return '/'.$path.$goods_thumb_name.'.jpg';
    if(file_exists($path.$goods_thumb_name.'.jpeg')) return '/'.$path.$goods_thumb_name.'.jpeg';
    if(file_exists($path.$goods_thumb_name.'.gif'))  return '/'.$path.$goods_thumb_name.'.gif';
    if(file_exists($path.$goods_thumb_name.'.png'))  return '/'.$path.$goods_thumb_name.'.png';

    $original_img = model('Goods')->where("id", $goods_id)->value('goods_logo');
    if(empty($original_img)) return '';

//    $original_img = '.'.$original_img; // 相对路径
    if(!file_exists($original_img)) return '';

    //$image = new \think\Image();
    $image = \think\Image::open($original_img);

    $goods_thumb_name = $goods_thumb_name. '.'.$image->type();
    //生成缩略图
    if(!is_dir($path))
        mkdir($path,0777,true);

    //参考文章 http://www.mb5u.com/biancheng/php/php_84533.html  改动参考 http://www.thinkphp.cn/topic/13542.html
    $image->thumb($width, $height,2)->save($path.$goods_thumb_name,NULL,100); //按照原图的比例生成一个最大为$width*$height的缩略图并保存

    //图片水印处理
   /* $water = tpCache('water');
    if($water['is_mark']==1){
        $imgresource = './'.$path.$goods_thumb_name;
        if($width>$water['mark_width'] && $height>$water['mark_height']){
            if($water['mark_type'] == 'img'){
                $image->open($imgresource)->water(".".$water['mark_img'],$water['sel'],$water['mark_degree'])->save($imgresource);
            }else{
                //检查字体文件是否存在
                if(file_exists('./zhjt.ttf')){
                    $image->open($imgresource)->text($water['mark_txt'],'./zhjt.ttf',20,'#000000',$water['sel'])->save($imgresource);
                }
            }
        }
    }*/
    return '/'.$path.$goods_thumb_name;
}

/**
 * 商品相册缩略图
 */
function get_sub_images($sub_img,$goods_id,$width,$height){
    //判断缩略图是否存在
    $path = "uploads/goods/thumb/$goods_id/";
    $goods_thumb_name ="goods_sub_thumb_{$sub_img['img_id']}_{$width}_{$height}";
    //这个缩略图 已经生成过这个比例的图片就直接返回了
    if(file_exists($path.$goods_thumb_name.'.jpg'))  return '/'.$path.$goods_thumb_name.'.jpg';
    if(file_exists($path.$goods_thumb_name.'.jpeg')) return '/'.$path.$goods_thumb_name.'.jpeg';
    if(file_exists($path.$goods_thumb_name.'.gif'))  return '/'.$path.$goods_thumb_name.'.gif';
    if(file_exists($path.$goods_thumb_name.'.png'))  return '/'.$path.$goods_thumb_name.'.png';

    $original_img = '.'.$sub_img['image_url']; //相对路径
    if(!file_exists($original_img)) return '';

    //$image = new \think\Image();
    //$image->open($original_img);
    $image = \think\Image::open($original_img);

    $goods_thumb_name = $goods_thumb_name. '.'.$image->type();
    // 生成缩略图
    if(!is_dir($path))
        mkdir($path,777,true);
    $image->thumb($width, $height,2)->save($path.$goods_thumb_name,NULL,100); //按照原图的比例生成一个最大为$width*$height的缩略图并保存
    return '/'.$path.$goods_thumb_name;
}

/**
 * 多个数组的笛卡尔积
 *
 * @param unknown_type $data
 */
function combineDika() {
    $data = func_get_args();
    $data = current($data);
    $cnt = count($data);
    $result = array();
    $arr1 = array_shift($data);
    foreach($arr1 as $key=>$item)
    {
        $result[] = array($item);
    }

    foreach($data as $key=>$item)
    {
        $result = combineArray($result,$item);
    }
    return $result;
}
/**
 * 两个数组的笛卡尔积
 * @param unknown_type $arr1
 * @param unknown_type $arr2
 */
function combineArray($arr1,$arr2) {
    $result = array();
    foreach ($arr1 as $item1)
    {
        foreach ($arr2 as $item2)
        {
            $temp = $item1;
            $temp[] = $item2;
            $result[] = $temp;
        }
    }
    return $result;
}


/**
 * 刷新商品库存, 如果商品有设置规格库存, 则商品总库存 等于 所有规格库存相加
 * @param type $goods_id  商品id
 */
function refresh_stock($goods_id){
    $count = model("SpecGoodsPrice")->where("goods_id", $goods_id)->count();
    if($count == 0) return false; // 没有使用规格方式 没必要更改总库存

    $store_count = model("SpecGoodsPrice")->where("goods_id", $goods_id)->sum('store_count');
    model("Goods")->save(['stores' => $store_count], ["id" => $goods_id]); // 更新商品的总库存
}
/**20180312cx
* 获得配置
* 20180604 添加缓存
* */
function getSetting($name, $user_id = 0, $type = 1)
{
    $setting_info = cache('setting_info_'.$name);

    $detail = explode('.', $name);

    if (!$setting_info) {
        if ($detail[0] == 'sub') {
            $setting_model = model('setting_sub');
            $detail[0] = $detail[1];
            if (isset($detail[2])) {
                $detail[1] = $detail[2];
                unset($detail[2]);
            } else {
                unset($detail[1]);
            }
            $where = ['name' => $detail[0], 'type' => 1, 'user_id' => $user_id];
            $setting_info = $setting_model->where($where)->value('value');
        } else {
            $setting_model = model('setting');
            $setting_info = $setting_model->where('name',$detail[0])->value('value');
        }

        if ($setting_info) {
            $setting_info = json_decode($setting_info, true);
            cache('setting_info_'.$detail[0], $setting_info, 60*60*2);
        }
    }

    if (!$setting_info) {
        $setting_info = array();
    }

    if (isset($detail[1])) {
        $setting_info = isset($setting_info[$detail[1]])?$setting_info[$detail[1]]:'';
    }

    return $setting_info;
}

/**20180604cx
 * 清除缓存
 * */
function clearCache($name)
{
    cache($name, null);
}

/**
 * 获得城市合伙人等配置
 * @param $name
 * @param $type
 * @param $user_id
 * @return array|mixed
 */
function getSettingSub($name, $type, $user_id)
{
    $setting_info = cache('setting_info_'.$name.$type.$user_id);

    $detail = explode('.', $name);

    if (!$setting_info) {
        $setting_info = model('setting')->where('name',$detail[0])->value('value');
        if ($setting_info) {
            $setting_info = json_decode($setting_info, true);
            cache('setting_info_'.$detail[0], $setting_info, 60*60*2);
        }
    }

    if (!$setting_info) {
        $setting_info = array();
    }

    if (isset($detail[1])) {
        $setting_info = $setting_info[$detail[1]];
    }

    return $setting_info;
}


/**
 * 导出数据为excel表格
 *@param $data    一个二维数组,结构如同从数据库查出来的数组
 *@param $title   excel的第一行标题,一个数组,如果为空则没有标题
 *@param $filename 下载的文件名
 *@examlpe
 *$stu = db ('User');
 *$arr = $stu -> select();
 *exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
 */
function easyExcel($data = array(), $title = array(), $filename = 'report') {
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=" . $filename . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    //导出xls 开始
    if (!empty($title)) {
        foreach ($title as $k => $v) {
            $title[$k] = iconv("UTF-8", "GB2312", $v);
        }
        $title = implode("\t", $title);
        echo "$title\n";
    }
    if (!empty($data)) {
        foreach ($data as $key => $val) {
            foreach ($val as $ck => $cv) {
                $data[$key][$ck] = iconv("UTF-8", "GB2312", $cv);
            }
            $data[$key] = implode("\t", $data[$key]);

        }
        echo implode("\n", $data);
    }

}

function get_new_array($arr,$number,$type=1){
    $nums        =   ceil(count($arr)/$number);
    $new      =   array();

    for($j=0; $j<$nums; $j++){
        for($i=0; $i<$number; $i++){
            if(isset($arr[$j*$number+$i])){
                if($type==1){
                    $new[$j][$i]  =   $arr[$j*$number+$i];
                }
                if($type==2){
                    $new[$i][$j]  =   $arr[$j*$number+$i];
                }
            }
        }
    }

    return $new;

}


/**

 * 生成随机字符串，由小写英文和数字组成。去掉了容易混淆的0o1l之类

 * @param int $int 生成的随机字串长度

 * @param boolean $caps 大小写，默认返回小写组合。true为大写，false为小写

 * @return string 返回生成好的随机字串

 */

function randStr($int = 6, $caps = false) {

    $strings = 'abcdefghjkmnpqrstuvwxyz23456789';

    $return = '';

    for ($i = 0; $i < $int; $i++) {

        srand();

        $rnd = mt_rand(0, 30);

        $return = $return . $strings[$rnd];

    }

    return $caps ? strtoupper($return) : $return;

}

/**

 * 生成随机字符串，由小写英文和数字组成。去掉了容易混淆的0o1l之类

 * @param int $int 生成的随机字串长度

 * @param boolean $caps 大小写，默认返回小写组合。true为大写，false为小写

 * @return string 返回生成好的随机字串

 */

function randInt($int = 6, $caps = false) {

    $strings = '0123456789';

    $return = '';

    for ($i = 0; $i < $int; $i++) {

        srand();

        $rnd = mt_rand(0, 9);

        $return = $return . $strings[$rnd];

    }

    return $caps ? strtoupper($return) : $return;

}



/**
 *时间差
 **/

function two_days ($day1, $day2)
{
    $second1 = strtotime($day1);
    $second2 = strtotime($day2);

    if ($second1 < $second2) {
        $tmp = $second2;
        $second2 = $second1;
        $second1 = $tmp;
    }
    return ($second1 - $second2) / 86400;
}

/**
 * 获得用户的真实IP地址
 *
 * @access  public
 * @return  string
 */
function real_ip() {

    $ch = curl_init('http://tool.huixiang360.com/zhanzhang/ipaddress.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $a  = curl_exec($ch);
    preg_match('/\[(.*)\]/', $a, $b);

    if ($b && $b[1]) {
        $ip = $b[1];
    } else {
        $ip = request()->ip();
    }

    return $ip;
}

/**
 * 获取当前完整URl
 *
 * @return strtime  （2015-08-26 17:31:00）
 * @author chandler_qjw
 */
function get_url() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}

/**
 * 获取当前域名
 *
 * @return strtime  （2015-08-26 17:31:00）
 * @author chandler_qjw
 */
function cur_host()
{
    $pageURL = 'http';

    if (isset($_SERVER["HTTPS"])) {
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
    }

    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"];
    }
    else {
        $pageURL .= $_SERVER["SERVER_NAME"];
    }
    return $pageURL;
}

/**
 * 根据ip地址获取地址信息
 * @param string $ip
 * @return bool|mixed
 */
function GetIpLookup($ip = ''){
    if(empty($ip)){
        $ip = request()->ip();
    }
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
    if(empty($res)){ return false; }
    $jsonMatches = array();
    preg_match('#\{.+?\}#', $res, $jsonMatches);
    if(!isset($jsonMatches[0])){ return false; }
    $json = json_decode($jsonMatches[0], true);
    if(isset($json['ret']) && $json['ret'] == 1){
        $json['ip'] = $ip;
        unset($json['ret']);
    }else{
        return false;
    }
    return $json;
}

function assoc_unique($arr, $key) {

    $tmp_arr = array();

    foreach ($arr as $k => $v) {

        if (in_array($v[$key], $tmp_arr)) {//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true

            unset($arr[$k]);

        } else {

            $tmp_arr[] = $v[$key];

        }

    }

    sort($arr); //sort函数对数组进行排序

    return $arr;

}