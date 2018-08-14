<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller{
    public function login(){
        
        if (IS_POST){
            
            return ;
        }
        
        $this->display();
    }
    
    public function code(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 30;
        $Verify->length   = 3;
        $Verify->useNoise = false;
        $Verify->entry();
    }
    
    public function logout(){
        $admin=D('admin');
        $admin->logout();
        $this->success('退出成功！',U('login'));
    }
}

?>