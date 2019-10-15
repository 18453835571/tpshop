<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/14
 * Time: 17:00
 */
namespace app\admin\model;
use think\Db;
use think\Model;
class  Node extends Model{
    protected $pk = 'node_id';
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
//    public function nodeadd($data){
//        $cate=Db::table("shopmall_node")->insert($data);
//        if($cate){
//            return true;
//        }else{
//            return  false;
//        }
//    }
}