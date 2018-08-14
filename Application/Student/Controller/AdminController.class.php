<?php
namespace Student\Controller;

use Tools\RbacController;

class AdminController extends RbacController {
	
	/*8
	    * 修改密码
     */
  
  public function xiugai() {
	  
	   //获得登录系统管理员信息，进而获得角色id        
        $a =D('class');
		session_start();
		$admin_id  = session('admin_id');
		
		
	    if(!empty($_POST)){
		  
		   $pwd=$_POST['password'];
		   $data['password']=$pwd;
		   //var_dump($pwd);exit;
		   if($a -> create($date)){
		   		$z = $a  -> where(array("id"=>$admin_id))->save($data);
		   
				if($z){
					//$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
					$this ->redirect('Home/Admin/xiugai', array(), 3, '修改密码成功');
				}else {
					$this ->redirect('Home/Admin/xiugai', array(), 3, '修改密码失败');
				}
		   }else{
			   $this ->error($a -> getError());
			   }
		 }else{
		
			$this ->display();
		   }
	  }
	
}