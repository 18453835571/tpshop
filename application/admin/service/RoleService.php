<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/16
 * Time: 9:58
 */
namespace app\admin\service;
use app\admin\model\Role;
use think\Db;
class RoleService
{
    public function notCates()
    {
        $cates = Db::table("shopmall_node")->select();
        return $this->getorderCate($cates);
    }

    public function getorderCate($cates, $pid = 0, $lerver = 0)
    {
        static $newcate = [];
        foreach ($cates as $key => $value) {
            if ($value['node_pid'] == $pid) {
                $value['lerver'] = $lerver;
                $newcate[] = $value;
                $this->getorderCate($cates, $value['node_id'], $lerver + 1);
            }
        }
        return $newcate;
    }
}