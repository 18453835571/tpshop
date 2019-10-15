<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/14
 * Time: 14:23
 */
namespace app\admin\controller;
use app\admin\model\Role;
use think\Controller;
use think\Db;

class Webmaster extends Common{
    public  function add(){
       if(request()->isGet()){
           $role=(new Role())->all();
           return view('',["role"=>$role]);
       }
       if(request()->isPost()){
           $webmaster_id=request()->post("role_id");
           $user =new \app\admin\model\Webmaster();
           $user->allowField(true)->save(request()->post());
           $user->role()->saveAll($webmaster_id);
           $this->success("添加角色成功","show");
       }
    }
    public function show(){
        $webmaster=new \app\admin\model\Webmaster();
        $webmaster=$webmaster->all();
        return  view('',["webmaster"=>$webmaster]);
    }

}