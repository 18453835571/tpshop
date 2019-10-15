<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Role extends Controller
{

    public function add()
    {
       if(request()->isGet()){
           $cate=new \app\admin\model\Role();
           $cates=$cate->notCates();
           return  view('',["cates"=>$cates]);
       }
       if(request()->isPost()){
           $node_id=request()->post("node_id");
           $user =new \app\admin\model\Role();
           $user->allowField(true)->save(request()->post());
           $user->node()->saveAll($node_id);
           $this->success("添加角色成功");
       }

    }


    public function show()
    {
        $role=new \app\admin\model\Role();
        $role=$role->all();
        return  view('',["role"=>$role]);
    }




    public function update(Request $request, $id)
    {
        //我是修改
    }

    public function delete($id)
    {
        //我是删除
    }
}
