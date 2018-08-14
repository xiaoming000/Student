<?php
namespace Home\Controller;
use Think\Controller;

class SubsidyController extends Controller {
    
    /******************************前台展示***********************************/
    public function Subsidy(){
	  if(date('m')>=9){//判断年份，展示最新一年的记录
		$date=date('Y');
	  }else{
		$date=date('Y')-1;
	  }
	  $date2=$date+1;
	  $sub=new \Model\SubsidyViewModel();//定义视图模型
	  $total=$sub->where('time='."'{$date}-{$date2}'")->count();
	  $per=10;
	  $page=new \Think\Page($total,$per);//实例化分页类
	  $list= $page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	  $result=$sub->field('id,stuid,type,money,time,name,sex,class,professional')->order('id desc ')->limit($page->firstRow.','.$page->listRows)->where('time='."'{$date}-{$date2}'")->select();
	  
	  $this->assign('list',$list);
	  $this->assign('sub',$result);
	  $this->assign('date',$date);
	  $this->display();
    }
	/*****************************修改*****************************/
	public function edit($id){
		if($_POST){//有post信息传入则修改用户信息
			$sub=D('Subsidy');
			$arr=array(
				'stuid'=>$_POST['stuid'],
				'type'=>$_POST['type'],
				'money'=>$_POST['money'],
				'time'=>$_POST['time']
			);
			$result=$sub->where("id=".$id)->save($arr);
			if($result){
				$this->success('修改成功！',__CONTROLLER__.'/Subsidy');
			}else{
				if($sub->getError()){//判断出错原因并根据情况给出提示(因为信息未改会返回0)
					$error=$sub->getError();
				}else $error="信息未改动！";
				$this->error($error);
			}
		}else{//无post信息传入则展示用户原信息
			 $sub=new \Model\SubsidyViewModel();
			 $result=$sub->field('id,stuid,type,money,time,name,sex,class,professional')->where("Subsidy.id={$id}")->find();
			 $this->assign('sub',$result);
			 $this->display();
		}  
	}
	
	/*****************************删除************************************/
	public function del($id=0){
		$sub=D('Subsidy');	
		if($_POST){//有post信息传入则批量删除，将批量删除和单个删除分开操作
				$arr=implode(',',$id);
				$result=$sub->delete($arr);
				if($result){
					$this->success('删除了'.$result.'条数据！');
				}else{
					$this->error('删除失败！');
				}
		}else{
			if($id!=0){
				$result=$sub->delete($id);
				if($result){
					$this->success('删除成功！');
				}else{
					$this->error('删除失败！');
				}
			}else{
				$this->error('请先选择删除项！');
			}
		}	
	}
	/******************************添加*************************************/
	public function add(){
		if($_POST){//有post信息传入则添加到数据库
			$sub=new \Model\SubsidyModel();
			if($sub->create()){
				$arr=array(
					'stuid' => $_POST['stuid'],
					'type'  => $_POST['type'],
					'money' => $_POST['money'],
					'time'  => $_POST['time']
				);
				$result=$sub->add($arr);
				if($result){
					$this->success('添加成功！',__CONTROLLER__.'/Subsidy');
				}else{
					$this->error('添加失败！');
				}
			}else{
				$this->assign('info',$sub->getError());
				$this->display();
			}
			
		}else{//无post信息传入
			$this->display();
		}
	}
	/*******************************导入***********************************/
	public function in(){/*导入控制器*/
		if($_POST){
			$exportObj = new \Tools\Excel();//实例化
			$exportData = array('stuid','type','money','time');/*字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
			$dataBase = 'subsidy';//数据库表名
			$action = 'Home/subsidy/Subsidy';//导入成功后跳转页面
			$exportObj -> impUser($exportData,$dataBase,$action);//调用导入方法
		}else{
			$this->display();
		}

	}
	/*******************************导出***********************************/
	public function out(){/*导出表控制器*/
			if($_GET){
				if($_GET['stuid']){
					$where['stuid'] = $_GET['stuid'];
				}else{
					if($_GET['class2']){
						$where['class'] = $_GET['class2'];
					}
					if(!empty($_GET['school_year'])){
						$where['time'] = $_GET['school_year'];
					}
				}
			}
			$exportObj = new \Tools\Excel();//实例化
			$sub=new \Model\SubsidyViewModel();
			$xlsName  = "Subsidy";          //excel生成表名
			$xlsCell  = array(
			array('stuid','学号'),
			array('name','姓名'),
			array('sex','性别'),
			array('class','班级'),
			array('professional','专业'),
			array('type','资助类型'),
			array('money','资助金额'),
			array('time','资助时间')
			);
			$xlsData = $sub->field('id,stuid,type,money,time,name,sex,class,professional')->where($where)->select();//查询数据
			$exportObj -> exportExcel($xlsName,$xlsCell,$xlsData);//调用导出方法
		
	}
	/*******************************按条件查询*************************************/
	public function search(){
		if($_POST['stuid']){//有学号则按学号查询
		  $where['stuid']=$_POST['stuid'];
		}else{				//无学号则按时间或班级查询
			if($_POST['school_year']){
				$where['time']=$_POST['school_year'];
			}
			if($_POST['class']){
				$where['class']=$_POST['class'];
			}
		}
		  $sub=new \Model\SubsidyViewModel();//定义视图模型
		  $total=$sub->where($where)->count();
		  $per=10;
		  $page=new \Think\Page($total,$per);//实例化分页类
		  $list= $page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		  $result=$sub->field('id,stuid,type,money,time,name,sex,class,professional')->order('id desc ')->limit($page->firstRow.','.$page->listRows)->where($where)->select();
		  if(date('m')>=9){
			$date=date('Y');
		  }else{
			$date=date('Y')-1;
		  }
		  $this->assign('list',$list);
		  $this->assign('sub',$result);
		  $this->assign('date',$date);
		  $this->display('Subsidy');
	}
	/*********************************联动获取班级**************************************/
	public function getclass(){
		$cla=D('class');
		$result=$cla->select();
		if(date('m')>=9){//如大三来说17年九月以前是14届的，九月以后是15届的
			$grade=date('y')-$_GET['g']+1;
		}else{
			$grade=date('y')-$_GET['g'];
		}
		for($i=0;$i<count($result);$i++){//对班级进行处理，保存需要的班级
			$class=substr($result[$i]['class'],1,2);//截取字符串
			if($class==$grade){
				$arr[$result[$i]['class']]=$result[$i]['class'];
			}
		}
		$arr=implode(',',$arr);
		echo $arr;exit;
	}
}