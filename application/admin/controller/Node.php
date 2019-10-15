<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/14
 * Time: 23:10
 */
namespace app\admin\controller;
use app\admin\model\Commonnode;

use think\Controller;
use think\Db;
class Node  extends  Common{
    public  function show(){
        $cate=new Commonnode();
        $cates=$cate->notCates();
        return  view('',["cates"=>$cates]);
    }
    public  function add(){
        if(request()->isGet()){
            $cate=new Commonnode();
            $cates=$cate->notCates();
            return  view('',["cates"=>$cates]);
        }
        if(request()->isPost()){
            $data=input('post.','');
            $cate =new Commonnode();
            $node=$cate->nodeadd($data);
            if($node){
                $this->success("添加权限成功",'show');
            }
                $this->error("添加权限失败");
        }
    }
}