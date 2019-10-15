<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/13
 * Time: 20:54
 */
namespace app\admin\model;
use think\Db;
use think\Model;

class  Commoncate extends Model{
    public function  getCates(){
        $cates = Db::table("shopmall_cate")->select();
        return $this->getorderCate($cates);
    }
    public  function  getorderCate($cates,$pid=0,$lerver=0){
        static $newcate=[];
        foreach($cates as $key=>$value){
            if($value['cate_pid']==$pid){
                $value['lerver']=$lerver;
                $newcate[]=$value;
                $this->getorderCate($cates,$value['cate_id'],$lerver+1);
            }
        }
        return $newcate;
    }
    public function cateadd($data){
        $cate=Db::table("shopmall_cate")->insert($data);
        if($cate){
            return true;
        }else{
            return  false;
        }

    }
}