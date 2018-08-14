<?php
namespace Home\Controller;

use Tools\RbacController;

class AdminController extends RbacController {
	
	
/*==============================================================进入模块===============================================================================*/
	public function select() {
		$this -> display();
		}
 /* *
 	 *
     * 学生账户页面
	 *
     */  		
/*==============================================================学 生 账 户进入模块===============================================================================*/

	public function student() {
		
		if(date('m')>7){//判断年份，展示最新一年的记录
			$date=date('Y');
		 }else{
			  $date=date('Y')-1;
		 }
        $s = new \Model\StudentModel();
        $count= $s->count();// 查询满足要求的总记录数
        $Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(15)
        $show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $s->field('id,number,name,password,power')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this -> assign('pagelist',$show);
        $this -> assign('list',$list);
		$this -> assign('date',$date);
        $this -> display();

}
/*==============================================================修改账户模块=====================================================================================*/	 
	
    public function edit_student($id){
		
		$s = D('student');
        if(!empty($_POST)){
			if($s -> create()) {
				$z = $s -> save($_POST);
				if($z){
					$this->success('修改成功',__CONTROLLER__.'/student',3);
				}else {
					$this->error('修改失败',__CONTROLLER__.'/student',3);
				}
			}else{
			
			$this ->error($s ->getError());
			}
		}else{
				$info = $s -> find($id);
				$this -> assign('info',$info);
				$this -> display();
			}
		
        
    }

	
 /* *
 	 *
     * 管理员账户页面
	 *
     */  		
/*=============================================================管理员账入模块=====================================================================================*/	
	
 
	 
	 public function administrator() {
		 
		 
		 //实现数据分页效果
        $a = new \Model\AccountModel();
        $count= $a->count();// 查询满足要求的总记录数
        $Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(15)
        $show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $a->field('id,number,name,password,power')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this -> assign('pagelist',$show);
        $this -> assign('list',$list);
		$this -> assign('date',$date);
        $this -> display();
		 		 
	 }
/*==============================================================修改账户模块=====================================================================================*/	 
	
    public function edit($id){
		
		$a = new \Model\AccountModel();
        //两个逻辑：展示、收集
        if(!empty($_POST)){
			//var_dump($_POST);exit;
			if($a -> create()) {
				$z = $a -> save($_POST);
				if($z){
					//$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
					//$this ->redirect('Home/Admin/administrator', array(), 3, '修改成功');
					$this->success("修改成功！", __CONTROLLER__.'/administrator',3);
				}else {
					$this->error("修改失败！", __CONTROLLER__.'/administrator',3);
				}
			}else{
			
			$this ->error($a ->getError());
			}
		}else{
				//根据$goods_id获得被修改的商品信息，并给模板展示
				//find()方法只负责给返回一条记录结果，并且是[一维]数组返回
				$info = $a -> find($id);
				//var_dump($info);
				$this -> assign('info',$info);
				$this -> display();
			}
		
        
    }

/*==============================================================删除模块=====================================================================================*/	
	 
    public function account_del($id){
	
		
		$a =D('account');
		if($id){
			$z= $a->where('id='.$id)-> delete();
			if($z){
					//$this->redirect('Home/Admin/administrator',array(),3,'删除成功！');
					$this->success("删除成功！", __CONTROLLER__.'/administrator',3);
			}else{
					//$this->redirect('Home/Admin/administrator',array('id'=>$id),3,'删除失败！');
					$this->error("删除！", __CONTROLLER__.'/administrator',3);	
			}
		}
       
    }


/*==============================================================账户添加模块=====================================================================================*/
    public function add(){
		
		$a = new \Model\AccountModel();
        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            //收集表单
            if( $a -> create()){
            $z = $a -> add();
			//var_dump($z);exit;
				if($z){
					//$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
					//$this ->redirect('Home/Admin/administrator', array(), 3, '添加成功');
					$this->success("添加成功！", __CONTROLLER__.'/administrator',3);
				}else {
					//$this ->redirect('Home/Admin/administrator', array(), 3, '添加失败');
					$this->error("添加失败！", __CONTROLLER__.'/administrator',3);
				}
			} else {
				
				$this -> error($a -> getError());
				}
			
			
        }else{
            //展示表单
            $this -> display();
        }
    }
  /*==============================================================批量删除模块=====================================================================================*/
  
  public function delete() {
	  
		
		$a =D('account');
		
		$id = $_POST['id'];
		if($id) {
		
		if(is_array($id)){
					
			 $where = 'id in('.implode(',',$id).')';  
		  }else{  
		   $where = 'id='.$id; 
		  }  //dump($where); 
		  $list=$a->where($where)->delete();  
		  if($list!==false) {
			 $this->success("成功删除{$list}条！", U("Home/Admin/administrator")); 
		  }else{   
			$this->error("删除失败！", U("Home/Admin/administrator"));  
		  } 
		}else{
			
			$this ->error("请先选着需要删除的数据选项！", U("Home/Admin/administrator"));
			}
				  
	  }
    
	 
	 
 /* *
 	 *
     * 教师账户页面
	 *
     */  		
/*=============================================================教师账户进入模块=====================================================================================*/	
	
	 public function teacher(){
		$c = new \Model\ClassModel();
		if(date('m')>7){//判断年份，展示最新一年的记录
			$date=date('Y');
		 }else{
			  $date=date('Y')-1;
		 }
		// if(empty($_POST)){
			 //实现数据分页效果
			$count= $c->count();// 查询满足要求的总记录数
			$Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(15)
			$show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $c->field('class,number,name,password,power')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this -> assign('pagelist',$show);
			$this -> assign('list',$list);
			$this -> assign('date',$date);
			$this -> display();
/*		 }else{
			if($_POST['class']){
				$where['class'] = $_POST['class'];
			}elseif(empty($_POST['class']) && !empty($_POST['year'])){
				$w = substr($_POST['year'],-2,2);
				$where['class'] = array('LIKE',"%$w%");
			}
 			//var_dump($w);
			$count= $c->where($where)->count();// 查询满足要求的总记录数
			$Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(15)
			$show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $c->field('class,number,name,password,power')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
			  if(date('m')>=9){
				$date=date('Y');
			  }else{
				$date=date('Y')-1;
			  }
			  $this -> assign('pagelist',$show);
			  $this->assign('list',$list);
			  $this->assign('date',$date);
			  $this->display('teacher');
			 
			 }
*/		
		
		 }
/*==============================================================修改账户模块=====================================================================================*/	 
	
    public function edit_teacher($class){
		
		$c = D('class');
        //两个逻辑：展示、收集
        if(!empty($_POST)){
			//var_dump($_POST);exit;
			if($c -> create()) {
				$z = $c -> save($_POST);
				if($z){
					//$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
					//$this ->redirect('Home/Admin/administrator', array(), 3, '修改成功');
					$this->success("修改成功！", __CONTROLLER__.'/teacher',3);
				}else {
					//$this ->redirect('Home/Admin/edit', array('id'=>$id), 3, '修改失败');
					$this->error("修改失败！", __CONTROLLER__.'/teacher',3);
				}
			}else{
			
			$this ->error($c ->getError());
			}
		}else{
				//根据$goods_id获得被修改的商品信息，并给模板展示
				//find()方法只负责给返回一条记录结果，并且是[一维]数组返回
				$info = $c -> find($id);
				//var_dump($info);
				$this -> assign('info',$info);
				$this -> display();
			}
		
        
    }

		 
/* *
     * 账号查询户页面
     */
/*=============================================================账户查询模块=====================================================================================*/	
	
	 public function query() {
		 
		 $this ->display();
		 }
 /*==============================================================账号查结果询模块=====================================================================================*/
 public function query_result(){
	 
	 $a = D('account');
	 $s = D('student');
	 $t = D('class');
	 $p = D('parent');
	  
	 $number = $_POST['number'];
	 if($number) {
	 $where = 'number='.$number;
	 $info_a = $a->where($where) ->find();
	 $info_s = $s->where($where) ->find();
	 $info_t = $t->where($where) ->find();
	 
		 if($info_a) {
			 $list =$info_a; 
		 }elseif($info_s){
			 $list = $info_s;
		 }elseif($info_t){
			 $list = $info_t; 
		 }else{
			$this ->error('请输入正确的账号！','',2); 
		 }
	 $this -> assign('list',$list);
	 $this -> display();
	 }else{
		 $this ->error('请输入账号查询!');
		 }
	 }		 
	 
 /*==============================================================密码修改模块=====================================================================================*/
  
  
  public function xiugai() {
	  
	   //获得登录系统管理员信息，进而获得角色id        
        $a =new \Model\AccountModel();
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
					//$this ->redirect('Home/Admin/xiugai', array(), 3, '修改密码成功');
					$this->success("修改密码成功！", __CONTROLLER__.'/xiugai',3);
				}else {
					//$this ->redirect('Home/Admin/xiugai', array(), 3, '修改密码失败');
					$this->error("修改密码失败！", __CONTROLLER__.'/xiugai',3);
				}
		   }else{
			   $this ->error($a -> getError());
			   }
		 }else{
		
			$this ->display();
		   }
	  }
	  
	  
	  

 /*==============================================================Excel表导入模块=====================================================================================*/
    
	
	public function excel() {         /*导入表文件上传控制器*/
		$this -> display();
    }
	public function impUser(){/*导入控制器*/
		$exportObj = new \Tools\Excel();                        //实例化
		$exportData = array('number','name','password','power'); /*字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
		$dataBase = 'account';                                  //数据库表名
		$action = 'Home/Admin/administrator';                     //导入成功后跳转页面
		$where = "number";                                         //如果某字段存在相同字段则不导入判断，不需要判断则这是为null
		$exportObj -> impUser($exportData,$dataBase,$action,$where);//调用导入方法,将参数写入
	}
		
    public function expUser(){                   //导出Excel
		$exportObj = new \Tools\Excel();  //实例化
        $xlsName  = "account";          //excel生成表名
        $xlsCell  = array(
        array('number','教职工号'),
        array('name','姓名'),
        array('password','密码'),
        array('power','权限')
        );
        $xlsModel = M('account');
        $xlsData  = $xlsModel->Field('number,name,password,power')->select();
        $exportObj->exportExcel($xlsName,$xlsCell,$xlsData);
            
    }
	
/*********************************************************联动获取班级************************************************************************************/
    public function getclass(){
        $d=D('class');
        $result=$d->select();
        $year=substr($_GET['g'],2,3);
        for($i=0;$i<count($result);$i++){//对班级进行处理，保存需要的班级
			$class=substr($result[$i]['class'],1,2);//截取字符串
            if($class==$year){
				$arr[$result[$i]['class']]=$result[$i]['class'];
             }
        }
        $arr=implode(',',$arr); // 数组元素按格式（,）合成字符串
            echo $arr;
            exit;
     }
    
/**********************************************************************************教师账户按条件查询********************************************************************/
    public function search(){
		$c = D('class');

		//$sub=new \Model\SubsidyViewModel();//定义视图模型
		if($_GET['class']){
			$where['class'] = $_GET['class'];
		}elseif(empty($_GET['class']) && !empty($_GET['year'])){
			$w = substr($_GET['year'],-2,2);
			$where['class'] = array('LIKE',"%$w%");
		}
		//var_dump($_GET['class']);
		$count= $c->where($where)->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(15)
		$show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $c->field('class,number,name,password,power')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		  if(date('m')>=9){
			$date=date('Y');
		  }else{
			$date=date('Y')-1;
		  }
		  $this -> assign('pagelist',$show);
		  $this->assign('list',$list);
		  $this->assign('date',$date);
		  $this->display('teacher');

	}
	
/**********************************************************************************学生账户按条件查询********************************************************************/
    public function search_student(){
		$c = D('class');

		//$sub=new \Model\SubsidyViewModel();//定义视图模型
		if($_GET['class']){
			$where['class'] = $_GET['class'];
		}elseif(empty($_GET['class']) && !empty($_GET['year'])){
			$w = substr($_GET['year'],-2,2);
			$where['class'] = array('LIKE',"%$w%");
		}
		//var_dump($_GET['class']);
		$count= $c->where($where)->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(15)
		$show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $c->field('class,number,name,password,power')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		  if(date('m')>=9){
			$date=date('Y');
		  }else{
			$date=date('Y')-1;
		  }
		  $this -> assign('pagelist',$show);
		  $this->assign('list',$list);
		  $this->assign('date',$date);
		  $this->display('student');

	}
	
	
	
	
	
}