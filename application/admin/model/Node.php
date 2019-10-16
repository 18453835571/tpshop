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

//    public function nodeadd($data){
//        $cate=Db::table("shopmall_node")->insert($data);
//        if($cate){
//            return true;
//        }else{
//            return  false;
//        }
//    }
}