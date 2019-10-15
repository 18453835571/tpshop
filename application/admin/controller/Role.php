<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Role extends Controller
{

    public function add()
    {
        return  view();
    }


    public function show()
    {
        return  view();
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
