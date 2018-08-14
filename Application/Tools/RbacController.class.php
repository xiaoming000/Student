<?php

//后台分组 普通控制器的父类
namespace Tools;
use Think\Controller;

class RbacController extends Controller{
    //构造方法：实现各个方法访问过滤效果
    function __construct() {
        parent::__construct();//避免覆盖父类的构造方法，给其先执行
        
        //获得当前用户访问的"控制器/操作方法"权限信息
        $nowac = CONTROLLER_NAME."-".ACTION_NAME;
		$home = MODULE_NAME;
        //获得当前用户“允许”访问的权限信息
        //admin_id-----role------auth
        
        //获得登录系统管理员信息，进而获得角色id
        $admin_id   = session('admin_id');
        $admin_number = session('admin_number');
        $admin_power= session('admin_power');
		if($admin_power=="管理员"){
			$power = 1;
		}elseif($admin_power=="班主任"){
			$power = 2;
		}elseif($admin_power=="学生"){
			$power = 3;	
		}else{
			$power = 4;
		}
        //未登录系统用户判断，如果未登录则跳转到登录页面去
        //(如果访问的是"登录页、验证码、退出页"则允许访问)
        $loginac = "Index-index,Index-verifyImg,Index-logout";
        if(empty($admin_number)  && strpos($loginac,$nowac)===false){
            $moduleurl = __MODULE__;
            $js = <<<eof
                   <script type="text/javascript">
                   window.top.location.href="$moduleurl/Index/index"; 
                   </script>
eof;
             echo $js;
            exit;
        }
        
      if($power===1 && strpos($loginac,$nowac)===false){
            if(  $home!=="Home"  ){
                $this ->error("你没有权限访问！");exit;
        	}
    	}
      if($power===2 && strpos($loginac,$nowac)===false){
            if(  $home!=="Teacher"  ){
                $this ->error("你没有权限访问！");exit;
        	}
    	}
      if($power===3 && strpos($loginac,$nowac)===false){
            if(  $home!=="Student"  ){
                $this ->error("你没有权限访问！");exit;
        	}
    	}
      if($power===4 && strpos($loginac,$nowac)===false){
                $this ->error("你已经被禁止登入系统，请找管理员设置登入权限！");exit;
    	}
        
    }
}
