<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/15
 * Time: 12:54
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class  Role extends Model
{
    protected $pk = 'role_id';
    public function  notCates(){
        $cates = Db::table("shopmall_node")->select();
        return $this->getorderCate($cates);
    }
    public  function  getorderCate($cates,$pid=0,$lerver=0){
        static $newcate=[];
        foreach($cates as $key=>$value){
            if($value['node_pid']==$pid){
                $value['lerver']=$lerver;
                $newcate[]=$value;
                $this->getorderCate($cates,$value['node_id'],$lerver+1);
            }
        }
        return $newcate;
    }
    public function node()
    {
        return $this->belongsToMany("Node","role_node","node_id","role_id");
    }
}