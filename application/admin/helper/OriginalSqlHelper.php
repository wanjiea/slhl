<?php


namespace app\admin\helper;


class OriginalSqlHelper
{

    /**
     * 排序
     * @param $sort
     * @param $m
     * @return int
     */
    public function getSort($sort, $m, $id = 0, $where=[])
    {

        if (!$m ) {
            return 0;
        }

        if ($sort != '') {

            $map = ['sort' => $sort];

            if ($id != 0) {
                $map['id'] = ['neq', $id];
            }

            $sale_find = $m->where($map)->find();

            if ($sale_find) {
                $where['sort'] = ['gt', $sort - 1];
                $m->where($where)->setInc('sort');

            }

        } else {
            if ($id == 0) {
                //$sort   =   $m->max('sort');
                $sort = 0;
                $map = ['sort' => $sort];
                $sale_find = $m->where($map)->find();

                if ($sale_find) {
                    $where['sort'] = ['egt', 0];
                    $m->where($where)->setInc('sort');

                }
            }


        }

        return $sort;

    }

    /**
     * 上下移
     * @param $tab
     * @param $id
     * @param $num
     * @param $search
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getUpDown($tab, $id, $num, $search)
    {
        if (!$tab || !$id || !$num) {
            return ['status'=>0, 'msg' => '移动失败', 'data' => []];
        }

        $m = model($tab);

        $find = $m->find($id);

        $news  = $m->where($search)->order('sort asc')->select();
        $count  = $m->where($search)->count();

        $sum = 0;

        foreach ($news as $k => $v) {
            if ($news[$k]['id'] == $id) {
                $sum = $k + $num;
            }
        }

        if ($sum < 0) {
            return ['status' => 2, 'msg'=>'不能再上移了' , 'data' => []];
        }

        if ($sum >= $count) {
            return ['status' => 2, 'msg'=>'不能再下移了' , 'data' => []];
        }

        $search['sort'] =  $news[$sum]['sort']; //新排序号

        $upnews = $m->where($search)->find();

        $upid   = $upnews['id'];

        $res1   = $m->save(['sort'=> $search['sort']], ['id'=>$id]);
        $res2   = $m->save(['sort'=> $find['sort']], ['id'=>$upid]);

        if($res1&&$res2){
            return ['status'=>1, 'msg' => '移动成功', 'data' => ['old_sort' => $search['sort'],'new_sort' => $find['sort']]];
        }else{
            return ['status'=>0, 'msg' => '移动失败', 'data' => []];
        }
    }
}