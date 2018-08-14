<?php
namespace Student\Controller;
use Think\Controller;

class SubsidyController extends Controller {
    
    /******************************前台展示***********************************/
    public function Subsidy(){
		$stuid=session('admin_number');//获取学生学号
	  if(date('m')>=9){//判断年份，展示最新一年的记录
		$date=date('Y');
	  }else{
		$date=date('Y')-1;
	  }//单个学生来说资助记录里一年一条顶多也就有4条他的记录所以不用分页模型
	  $sub=new \Model\SubsidyViewModel();//定义视图模型
	  $result=$sub->field('id,stuid,type,money,time,name,sex,class,professional')->order('id desc ')->where("stuid={$stuid}")->select();
	  if($result){
		$this->assign('sub',$result);
		  $this->assign('date',$date);
		  $this->display();
	  }else{
		echo "<h1 align='center'>暂时没有您的相关资助信息！</h1>";
	  }
	  
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
		$stuid=session('admin_number');
		if(!$_POST[school_year]){//如果年份选择全部，即没有选择确切年份，则查询该学生全部记录
			$sql="stuid="."'{$stuid}'";
		}else{//按他选择的时间查询,但是只能查询自己的信息
			$sql="time="."'{$_POST[school_year]}'"." and stuid="."'{$stuid}'";
		}
		$sub=new \Model\SubsidyViewModel();//定义视图模型
		  $result=$sub->field('id,stuid,type,money,time,name,sex,class,professional')->order('id desc ')->where($sql)->select();
		  if(date('m')>=9){
			$date=date('Y');
		  }else{
			$date=date('Y')-1;
		  }
		  $this->assign('sub',$result);
		  $this->assign('date',$date);
		  $this->display('Subsidy');
	}
}