<?php
namespace Home\Controller;
use Think\Controller;

class PinkunshengkuController extends Controller {
    
   /******************************前台展示****************************/
    public function Pinkunshengku(){
	  if(date('m')>=9){//判断年份，展示最新一年的记录
		$date=date('Y');
	  }else{
		$date=date('Y')-1;
	  }
	  $date2=$date+1;
	  $pin=new \Model\PinkunshengkuViewModel();//定义视图模型
	  $total=$pin->where('in_time='."'{$date}-{$date2}'")->count();
	  $per=10;
	  $page=new \Think\Page($total,$per);//实例化分页类
	  $list= $page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	  $result=$pin->field('id,stuid,state,in_time,out_time,grade,name,sex,id_number,class,professional')->order('id desc ')->limit($page->firstRow.','.$page->listRows)->where('in_time='."'{$date}-{$date2}'")->select();
	  $this->assign('list',$list);
	  $this->assign('pin',$result);
	  $this->assign('date',$date);
	  $this->display();
    }
	/*****************************修改*****************************/
	public function edit($id){
		if($_POST){//有post信息传入则修改用户信息
			$pin=D('Subsidylibrary');
			$arr=array(
				'stuid'   => $_POST['stuid'],
				'state'   => $_POST['state'],
				'in_time' => $_POST['in_time'],
				'out_time'=> $_POST['out_time'],
				'grade'	  => $_POST['grade']
			);
			$result=$pin->where("id=".$id)->save($arr);
			if($result){
				$this->success('修改成功！',__CONTROLLER__.'/Pinkunshengku');
			}else{
				if($pin->getError()){//判断出错原因并根据情况给出提示(因为信息未改会返回0)
					$error=$pin->getError();
				}else $error="信息未改动！";
				$this->error($error);
			}
		}else{//无post信息传入则展示用户原信息
			 $pin=new \Model\PinkunshengkuViewModel();
			 $result=$pin->field('id,stuid,state,in_time,out_time,grade,name,sex,id_number,class,professional')->where("Subsidylibrary.id={$id}")->find();
			 $this->assign('pin',$result);
			 $this->display();
		}  
	}
	/*****************************删除************************************/
	public function del($id=0){
		$pin=D('Subsidylibrary');	
		if($_POST){//有post信息传入则批量删除，将批量删除和单个删除分开操作
				$arr=implode(',',$id);
				$result=$pin->delete($arr);
				if($result){
					$this->success('删除了'.$result.'条数据！');
				}else{
					$this->error('删除失败！');
				}
		}else{
			if($id!=0){
				$result=$pin->delete($id);
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
			$pin=new \Model\SubsidylibraryModel();
			if($pin->create()){
				$arr=array(
					'stuid'   => $_POST['stuid'],
					'state'   => $_POST['state'],
					'in_time' => $_POST['in_time'],
					'out_time'=> $_POST['out_time'],
					'grade'	  => $_POST['grade']
				);
				$result=$pin->add($arr);
				if($result){
					$this->success('添加成功！',__CONTROLLER__.'/Pinkunshengku');
				}else{
					$this->error('添加失败！');
				}
			}else{
				$this->assign('info',$pin->getError());
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
			$exportData = array('stuid','grade','state','in_time','out_time');/*字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
			$dataBase = 'subsidylibrary';//数据库表名
			$action = 'Home/Pinkunshengku/pinkunshengku';//导入成功后跳转页面
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
						$where['in_time'] = $_GET['school_year'];
					}
					if($_GET['state2']){
						$where['state'] = $_GET['state2'];
					}
				}
			}
			$exportObj = new \Tools\Excel();//实例化
			$pin=new \Model\PinkunshengkuViewModel();
			$xlsName  = "subsidylibrary";          //excel生成表名
			$xlsCell  = array(
			array('stuid','学号'),
			array('name','姓名'),
			array('sex','性别'),
			array('id_number','身份证号'),
			array('professional','专业'),
			array('class','班级'),
			array('grade','认定等次'),
			array('state','在库状态'),
			array('in_time','入库时间'),
			array('out_time','出库时间')
			);
			$xlsData = $pin->field('stuid,name,sex,id_number,professional,class,grade,state,in_time,out_time')->where($where)->select();//查询数据
			$exportObj -> exportExcel($xlsName,$xlsCell,$xlsData);//调用导出方法
	}
	/*******************************按条件查询*************************************/
	public function search(){
		if($_POST['stuid']){//有学号则按学号查询
		  $where['stuid']=$_POST['stuid'];
		}else{				//无学号则按时间或班级或状态查询
			if($_POST['school_year']){
				$where['in_time']=$_POST['school_year'];
			}
			if($_POST['class']){
				$where['class']=$_POST['class'];
			}
			if($_POST['state']){//选择了状态则加上状态筛选
				$where['state']=$_POST['state'];
			}
		}
		$pin=new \Model\PinkunshengkuViewModel();//定义视图模型
		  $total=$pin->where($where)->count();
		  $per=10;
		  $page=new \Think\Page($total,$per);//实例化分页类
		  $list= $page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		  $result=$pin->field('id,stuid,state,in_time,out_time,grade,name,sex,id_number,class,professional')->order('id desc ')->limit($page->firstRow.','.$page->listRows)->where($where)->select();
		  if(date('m')>=9){
			$date=date('Y');
		  }else{
			$date=date('Y')-1;
		  }
		  $this->assign('list',$list);
		  $this->assign('pin',$result);
		  $this->assign('date',$date);
		  $this->display('Pinkunshengku');
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