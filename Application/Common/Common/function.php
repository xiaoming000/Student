<?php
 function a1($where){
	//var_dump("公共函数！");
	$a = new \Model\StudentModel();
	$list = $a ->where($where)->limit(15)-> select();
	//var_dump($list);
	return $list;	
	}
