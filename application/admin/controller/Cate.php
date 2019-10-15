<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/13
 * Time: 16:52
 */
namespace app\admin\controller;
use app\admin\model\Commoncate;
use think\Db;

class Cate extends Common
{
    public function show(){
        $cate=new Commoncate();
        $cates=$cate->getCates();
        return  view('',["cates"=>$cates]);
    }
    public function add(){
        if(request()->isGet()){
            $cate=new Commoncate();
            $cates=$cate->getCates();
            return  view('',["cates"=>$cates]);
        }
        if(request()->isPost()){
             $data=input('post.','');
             $cate =new Commoncate();
             $catess=$cate->cateadd($data);
            if($catess){
                $this->success("添加分类成功",'Cate/show');
            }
                $this->error("添加分类失败","add");
        }
    }
}