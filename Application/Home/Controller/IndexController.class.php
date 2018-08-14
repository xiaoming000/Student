<?php
namespace Home\Controller;

use Tools\RbacController;


class IndexController extends RbacController {
	
	//网站登入页面
    public function index(){

		//两个逻辑：展示、收集
//        if(!empty($_POST)){
//            $vry = new \Think\Verify();
//            if($vry -> check($_POST['captcha'])){
//					//用户名和密码校验
				$a = new \Model\AccountModel();
				$t = new \Model\ClassModel();
				$s = new \Model\StudentModel();
				$info_account = $a ->checkNamePwd1($_POST['number'],$_POST['password']);
				$info_student = $s ->checkNamePwd2($_POST['number'],$_POST['password']);
				$info_teacher = $t ->checkNamePwd3($_POST['number'],$_POST['password']);
	            //var_dump($info_teacher);

				if($info_account) {

					//session持久化用户信息(id/name)，页面跳转到后台
						session('admin_id',$info_account['id']);
						session('admin_number',$info_account['number']);
						session('admin_name',$info_account['name']);
						session('admin_power',$info_account['power']);
						$this -> redirect('Home/Index/zhuye');

				}else if($info_teacher) {


					//session持久化用户信息(id/name)，页面跳转到后台
						session('admin_id',$info_teacher['id']);
						session('admin_name',$info_teacher['name']);
						session('admin_number',$info_teacher['number']);
						session('admin_power',$info_teacher['power']);
						$this -> redirect('Teacher/Index/zhuye');
				}else if($info_student) {


					//session持久化用户信息(id/name)，页面跳转到后台
						session('admin_id',$info_student['id']);
						session('admin_name',$info_student['name']);
						session('admin_number',$info_student['number']);
						session('admin_power',$info_student['power']);
						$this -> redirect('Student/Index/zhuye');

				}
//				else {
//				 $this->error('用户名或密码错误！',$this,2);
//
//				}

//            }else
//            $this->error('验证码错误！',$this,2);
//        }
        $this -> display();

    }
	
	//系统退出操作
	public function logout() {
		
		session(null);
		$this -> redirect('index');
		
		}
	
	
	
	
	//网站进入主页
	 public function zhuye(){
        $this->display();
    }
	public function head(){
        $this->display();
    }
	public function left(){
        $this->display();
    }
	public function right(){
        $this->display();
    }
	public function verifyImg(){
		
		$cfg =array(
		
		'imageH'    =>  45,               // 验证码图片高度
        'imageW'    =>  100,               // 验证码图片宽度
		'fontSize'  =>  15,              // 验证码字体大小(px)
        'length'    =>  4,               // 验证码位数
	    'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取


		);

		$v = new \Think\Verify($cfg);
		$v ->entry();//输出验证码
		
		}
		
}