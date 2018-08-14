<?php

namespace Model;
use Think\Model;

//为sw_goods数据表创建一个Model模型类
//父类Model: ThinkPHP/Library/Think/Model.class.php
class ClassModel extends Model{
   // 可以自定义方法并访问
function checkNamePwd3($nm, $pwd){
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
 
	
/*
	*自动验证
*/
protected $_patchvalidate = true;	
protected $_validate = array(
//专业不能为空
 array('professional','require','专业不能为空！'),
 //array('class','require','班级不能为空'),
 //array('class','/^[A-B][0-9]{4}$/','班级名称格式不正确',3,'regex'),
 array('qqq','/[1-9][0-9]{4,}/','QQ格式不正确',3,'regex'),
 array('qqq','number','QQ号必须为纯数字'),   
 array('monitor_tel','11','注意电话号码为11位',3,'length'),
 array('monitor_tel','number','电话号码必须为纯数字'), 
 array('monitor','require','班长姓名不能为空'),
 array('name','require','班主任姓名不能为空'),
 array('league_secretary','require','团支书姓名不能为空'),
    
);
}
