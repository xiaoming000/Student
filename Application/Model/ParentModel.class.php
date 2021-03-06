<?php

namespace Model;
use Think\Model;

//为sw_goods数据表创建一个Model模型类
//父类Model: ThinkPHP/Library/Think/Model.class.php
class ParentModel extends Model{
function checkNamePwd1($nm, $pwd){
        //① 根据$nm判断名字是否存在
        $info = $this -> where("number='$nm'")->find();
        //dump($info);//有结果返回结果的记录信息，否则返回null
        //② 如果$nm的记录存在，就让记录的密码和 $pwd做比较
        if($info){
            if($info['password']===$pwd)
                return $info;
        }
        return null;
    }



/**
	*	自动验证
	*/


	protected $_patchvalidate = true;
	
	protected $_validate = array(
	
	//1、父亲姓名不能为空
	array('father_name','require','父亲姓名不能为空！'),
	array('mother_name','require','母亲姓名不能为空！'),
        array('home_address','require','家庭地址不能为空！'),
	);


}
