<?php
namespace Teacher\Controller;
use Think\Controller;

class PinkunshengkuController extends Controller {
    
   /******************************前台展示****************************/
    public function Pinkunshengku(){
		$cla=D('class');
		$cla1=$cla->field('class')->where('number='.session('admin_number'))->find();//根据班主任工号查询最近一次该班主任所带的班级名称
	  if(date('m')>=9){//判断年份
		$date=date('Y');
	  }else{
		$date=date('Y')-1;
	  }
	  $pin=new \Model\PinkunshengkuViewModel();//定义视图模型
	  $total=$pin->where('class.class='."'{$cla1['class']}'")->count();
	  $per=10;
	  $page=new \Tools\Page($total,$per);//实例化分页类
	  $result=$pin->field('id,stuid,state,in_time,out_time,grade,name,sex,id_number,class,professional')->order('id desc ')->limit($page->limit)->where('class.class='."'{$cla1['class']}'")->select();
	  $list=$page->fpage(array(2,3,4,5,6,7,8));//调用fpage方法得到分页信息
	  $this->assign('list',$list);
	  $this->assign('pin',$result);
	  $this->assign('date',$date);
	  $this->display();
    }
	/*******************************导出***********************************/
	public function out(){/*导出表控制器*/
		$exportObj = new \Tools\Excel();//实例化
		$exportData = array('stuid','state','in_time','out_time','grade');//字段名
		$exportName = array('学号','在库状态','入库时间','出库时间','认定等次');//导出excel表头,注意表头与字段名相对应
		$dataBase = 'subsidylibrary';//操作的数据库表名
		$exportObj -> expUser($exportData,$exportName,$dataBase);//调用导出方法
	}
	/*******************************按条件查询*************************************/
	public function search(){
		$cla=D('class');
		$cla1=$cla->field('class')->where('number='.session('admin_number'))->find();//根据班主任工号查询最近一次该班主任所带的班级名称
		if($_POST['stuid']){//有学号则按学号查询,但是只能查询本班学生
		  $sql="stuid={$_POST['stuid']}"." and class.class="."'{$cla1['class']}'";
		}else{//无学号则按时间查询
			if(!$_POST[school_year]){//没有选择确切时间则查询全部记录
				$sql="class.class="."'{$cla1['class']}'";
			}else{//选择了时间则按时间查
				$sql="in_time="."'{$_POST[school_year]}'"." and class.class="."'{$cla1['class']}'";
			}	
		}
		if($_POST['state']){//选择了状态则加上状态筛选
			$sql=$sql." and state="."'{$_POST[state]}'";
		}
		$pin=new \Model\PinkunshengkuViewModel();//定义视图模型
		  $total=$pin->where($sql)->count();
		  $per=10;
		  $page=new \Tools\Page($total,$per);//实例化分页类
		  $result=$pin->field('id,stuid,state,in_time,out_time,grade,name,sex,id_number,class,professional')->order('id desc ')->limit($page->limit)->where($sql)->select();
		  $list=$page->fpage(array(2,3,4,5,6,7,8));//调用fpage方法得到分页信息
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
}