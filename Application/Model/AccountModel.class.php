<?php

namespace Model;
use Think\Model;

//为sw_goods数据表创建一个Model模型类
//父类Model: ThinkPHP/Library/Think/Model.class.php
class AccountModel extends Model{
   // 可以自定义方法并访问

 /**
	*	校验登入函数
	*/
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

	protected $_validate =array(

		//1、教职工号必须为11为数的纯数字
		array('number','require','教职工号名不能为空'),
		array('number','number','教职工号必须为纯数字！'),

		//用户名不能为空
		array('name','require','姓名不能为空！'),

		//密码不能为空
		array('password','require','密码不能为空！'),
		//密码必须为8-12
		array('password','5,20','密码必须在5-20为之间！',2,'length'),
		
		//禁止插入教职工号相同的用户
		array('number','','该管理员已存在！',0,'unique'),

		);
		
	
	
		
}
