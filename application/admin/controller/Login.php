<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2019/10/12
 * Time: 16:44
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;


class Login extends Controller
{
    public function login()
    {
        if (request()->isGet()) {
            return view();
        }
        if (request()->isPost()){
            //接旨
            $admin_name=request()->post("user_admin","");
            $admin_pwd=md5(request()->post("user_pwd",""));
            //验证
            $admin=Db::table("shopmall_admin")
                ->field(["admin_id","admin_name"])
                ->where("admin_name",$admin_name)
                ->where("admin_pwd",$admin_pwd)
                ->find();
            if($admin !=$admin_name){
                //存入sesion
                session("admin",$admin);
                $this->success("登陆成功",'Index/index');
            }else{
                $this->error("登陆失败","login");
            }

            }

    }
}