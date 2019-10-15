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
class  Webmaster extends Model{
    protected $pk = 'webmaster_id';
//    public function webmasteradd($data){
//        $cate=Db::table("shopmall_webmaster")->insert($data);
//        if($cate){
//            return true;
//        }else{
//            return  false;
//        }
//    }
}