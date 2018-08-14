<?php
namespace Student\Controller;
use Think\Controller;

class PinkunshengkuController extends Controller {
    
   /******************************前台展示****************************/
    public function Pinkunshengku(){
		$stuid=session('admin_number');//单个学生来说贫困生库里顶多有一条他的记录所以不用分页模型
	  $pin=new \Model\PinkunshengkuViewModel();//定义视图模型
	  $result=$pin->field('id,stuid,state,in_time,out_time,grade,name,sex,id_number,class,professional')->order('id desc ')->limit($page->limit)->where('stuid='."'{$stuid}'")->select();
	  if($result){
		$this->assign('pin',$result);
		$this->display();
	  }else{
		echo "<h1 align='center'>您暂时还没入库！</h1>";
		
	  }
	  
    }
	/*******************************导出***********************************/
	public function out(){/*导出表控制器*/
		$exportObj = new \Tools\Excel();//实例化
		$exportData = array('stuid','state','in_time','out_time','grade');//字段名
		$exportName = array('学号','在库状态','入库时间','出库时间','认定等次');//导出excel表头,注意表头与字段名相对应
		$dataBase = 'subsidylibrary';//操作的数据库表名
		$exportObj -> expUser($exportData,$exportName,$dataBase);//调用导出方法
	}
}