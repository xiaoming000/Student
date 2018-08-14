<?php

namespace Model;
use Think\Model;
use Think\Model\ViewModel;
//为sw_goods数据表创建一个Model模型类
//父类Model: ThinkPHP/Library/Think/Model.class.php
class DormitoryViewModel extends ViewModel{   
		 public $viewFields = array(    
			 'dormitory'=>array('id','dormitoryid','name','number','sex','bed','xueyuan','class','major', '_type'=>'LEFT'),    
			 'fangyuan'=>array('school','building','floor','bnumber', '_on'=>'dormitory.dormitoryid=fangyuan.id', '_type'=>'LEFT'), 
);
             
}