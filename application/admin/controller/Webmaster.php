<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/14
 * Time: 14:23
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Webmaster extends Common{
    public  function add(){
       if(request()->isGet()){
           return view();
       }
       if(request()->isPost()){
           $data=input('post.','');
           $webmaster_pwd=md5($data['webmaster_pwd']);
           $data['webmaster_pwd']=$webmaster_pwd;
           $data['webmaster_time']=time();
           $user =new \app\admin\model\Webmaster();
           $user->webmaster_name   = $data['webmaster_name'];
           $user->webmaster_email =  $data['webmaster_email'];
           $user->webmaster_pwd =  $data['webmaster_pwd'];
           $user->webmaster_time =  $data['webmaster_time'];
           $catess=$user->save();
          // $catess=$cate->webmasteradd($data);
           if($catess){
               $this->success("添加管理员成功",'Webmaster/show');
           }
           $this->error("添加管理员失败","add");
       }
    }
    public function show(){
        $webmaster=Db::table('shopmall_webmaster')->select();
        return  view('',["webmaster"=>$webmaster]);
    }

}