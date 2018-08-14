<?php
namespace Teacher\Controller;
use Think\Controller;

class SubsidyController extends Controller {
    
    /******************************前台展示***********************************/
    public function Subsidy(){
		$cla=D('class');
		$cla1=$cla->field('class')->where('number='.session('admin_number'))->find();//根据班主任工号查询最近一次该班主任所带的班级名称
	  if(date('m')>=9){//判断年份，展示最新一年的记录
		$date=date('Y');
	  }else{
		$date=date('Y')-1;
	  }
	  $date2=$date+1;
	  $sub=new \Model\SubsidyViewModel();//定义视图模型
	  $total=$sub->where('time='."'{$date}-{$date2}' ".'and class.class='."'{$cla1['class']}'")->count();
	  $per=10;
	  $page=new \Tools\Page($total,$per);//实例化分页类
	  $result=$sub->field('id,stuid,type,money,time,name,sex,class,professional')->order('id desc ')->limit($page->limit)->where('time='."'{$date}-{$date2}' ".'and class.class='."'{$cla1['class']}'")->select();
	  $list=$page->fpage(array(2,3,4,5,6,7,8));//调用fpage方法得到分页信息
	  $this->assign('list',$list);
	  $this->assign('sub',$result);
	  $this->assign('date',$date);
	  $this->display();
    }
	
	/*******************************导出***********************************/
	public function out(){/*导出表控制器*/
		$exportObj = new \Tools\Excel();//实例化
		$exportData = array('stuid','type','money','time');//字段名
		$exportName = array('学号','资助类型','资助金额','资助时间');//导出excel表头,注意表头与字段名相对应
		$dataBase = 'subsidy';//操作的数据库表名
		$exportObj -> expUser($exportData,$exportName,$dataBase);//调用导出方法
	}
	/*******************************按条件查询*************************************/
	public function search(){
		$cla=D('class');
		$cla1=$cla->field('class')->where('number='.session('admin_number'))->find();//根据班主任工号查询最近一次该班主任所带的班级名称
		if($_POST['stuid']){//有学号则按学号查询,但是只能查询本班学生
		  $sql="stuid={$_POST['stuid']}"." and class.class="."'{$cla1['class']}'";
		}else{//无学号则按时间查询
			$sql="time="."'{$_POST[school_year]}'"." and class.class="."'{$cla1['class']}'";
		}
		$sub=new \Model\SubsidyViewModel();//定义视图模型
		  $total=$sub->where($sql)->count();
		  $per=10;
		  $page=new \Tools\Page($total,$per);//实例化分页类
		  $result=$sub->field('id,stuid,type,money,time,name,sex,class,professional')->order('id desc ')->limit($page->limit)->where($sql)->select();
		  $list=$page->fpage(array(2,3,4,5,6,7,8));//调用fpage方法得到分页信息
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
}