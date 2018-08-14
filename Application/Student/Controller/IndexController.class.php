<?php
namespace Student\Controller;

use Tools\RbacController;


class IndexController extends RbacController {
	
	
	
	//系统退出操作
	public function logout() {
		session(null);
		$this -> redirect('Home/Index/index');
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