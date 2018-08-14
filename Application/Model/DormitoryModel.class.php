<?php

namespace Model;
use Think\Model;

//为sw_goods数据表创建一个Model模型类
//父类Model: ThinkPHP/Library/Think/Model.class.php
class DormitoryModel extends Model{
/**
	*登入验证
	*/	
function checkNamePwd2($nm, $pwd){
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
	
	
               
//		array('xueyuan','require','学院不能为空'),
//		array('major','require','专业不能为空！'),
//		array('class','require','班级不能为空！'),
//                array('number','require','学号不能为空！'),
//		array('number','number','学号必须为纯数字！'),
//                array('number','11,11','学号必须11位！'),//禁止插入学号相同的用户
////		array('number','','该学生已存在！',0,'unique'),
//                array('name','require','姓名不能为空'),//用户名不能为空
//		array('bed','require','床位不能为空！'),
		
		
);

}
