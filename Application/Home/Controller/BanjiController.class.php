<?php
namespace Home\Controller;
use Think\Controller;
class BanjiController extends Controller {
    public function class2(){
	if(date('m')>7){//判断年份，展示最新一年的记录
        $date=date('Y');
     }else{
          $date=date('Y')-1;
     }
        $d = D('class');
        $count= $d->count();// 查询满足要求的总记录数
        $Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $d->field('id','class','name','monitor','league_secretary','qqq','monitor_tel','professional')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this -> assign('pagelist',$show);
        $this -> assign('list',$list);
        $this->assign('date',$date);
        $this -> display();         
    }
	
	
/********************************************************************编辑*******************************************************************************/
    public function edit_class($class){
		
		$a = new \Model\ClassModel();
		if(!empty($_POST)){
		   if($a -> create()) {
			  $z = $a -> save($_POST);
			  if($z){
				  $this->success("修改成功！", __CONTROLLER__.'/class2',3);
			  }else {
				  $this ->redirect('Home/Banji/edit_class', array('class'=>$class), 3, '修改失败');
			  }
			}else{
				$this ->error($a ->getError());
			}
		}else{
			$info = $a -> find($class);
			$this -> assign('info',$info);
			$this -> display();
		}
    }
	
/********************************************************************添加*******************************************************************************/

    public function add(){
		
		$c = new \Model\ClassModel();
        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            //收集表单
            if( $c -> create()){
            $z = $c -> add();
			//var_dump($z);exit;
				if($z){
					$this->success("添加成功！", __CONTROLLER__.'/class2',3);
				}else {
					$this->error("添加失败！", __CONTROLLER__.'/add',3);
				}
			} else {
				
				$this -> error($c -> getError());
				}
			
			
        }else{
            //展示表单
            $this -> display();
        }
    }

/*==============================================================编辑模块=====================================================================================*/	 
	
  /*  public function edit($id){
		
		$c = new \Model\ClassModel();
        //两个逻辑：展示、收集
        if(!empty($_POST)){
			if($c -> create()) {
				$z = $c -> save($_POST);
				if($z){
					$this->success("修改成功！", __CONTROLLER__.'/class2',3);
				}else {
					$this->error("修改失败！", __CONTROLLER__.'/class2',3);
				}
			}else{
			
			$this ->error($a ->getError());
			}
		}else{
				$info = $c -> find($id);
				$this -> assign('info',$info);
				$this -> display();
			}
		
        
    }
*/


 /*==============================================================删除=====================================================================================*/
    public function del($class){
        $d =D('class');
        $w = $class;
        $s['class']= $class;
        if($class){
           $z= $d->where($s)-> delete();
        	if($z){
               $this->success("删除成功！", __CONTROLLER__.'/class2',3);
             }else{
               $this->error("删除失败！", __CONTROLLER__.'/class2',3); 
             }
        }
     }
/*==============================================================批量删除模块=====================================================================================*/
  
  public function delete() {	  	
		$a =D('class');
                $id = $_POST['id'];
		if($id) {		
		if(is_array($id)){					
			 $where = 'id in('.implode(',',$id).')';  
		  }else{  
		   $where = 'id='.$id; 
		  }  //dump($where); 
			  $list=$a->where($where)->delete();  
		  if($list!==false) {
			 $this->success("成功删除{$list}条！", U("Home/Banji/student")); 
		  }else{   
			$this->error("删除失败！", U("Home/Banji/student"));  
		  } 
		}else{
			
			$this ->error("请先选着需要删除的数据选项！", U("Home/Zaixiaosheng/student"));
			}			  
	  }
	 
	 
 /*==============================================================Excel表导入模块=====================================================================================*/
    public function excel() {/*导入表文件上传控制器*/
	$this -> display();
             }
	public function impUser(){/*导入控制器*/
		$exportObj = new \Tools\Excel();//实例化
		$exportData = array('class','professional','name','monitor','league_secretary','class_tutor_tel','qqq','monitor_tel','number','password','power');/*字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
		$dataBase = 'class';//数据库表名
		$action = 'Home/Banji/class2';//导入成功后跳转页面
        $where = "class";                                         //如果某字段存在相同字段则不导入判断，不需要判断则这是为null
		$exportObj -> impUser($exportData,$dataBase,$action,$where);//调用导入方法,将参数写入
		}

/*==============================================================Excel表导出模块=====================================================================================*/
		public function expUser(){/*导出表控制器*/
		if($_GET){
			if($_GET['class']){
				$where['class'] = $_GET['class'];
			}elseif(!empty($_GET['year'])){
				$w = substr($_GET['year'],-2,2);
				$where['class'] = array('LIKE',"%$w%");
			}
		}
        $EP = new \Tools\Excel();
        $xlsxName  = "班级信息表";//excel生成表名
        $xlsxCell  = array(
        array('class','班级'),
        array('professional','专业'),
        array('name','班主任'),
        array('monitor','班长'),
		array('league_secretary','团支书'),
        array('class_tutor_tel','班主任电话'),
        array('qqq','QQ群'),
		array('monitor_tel','班长电话'),
		array('number','班主任账号')
        );
        $xlsxModel = new \Model\ClassModel();
        $xlsxData  = $xlsxModel->where($where)->Field('class,professional,name,monitor,league_secretary,class_tutor_tel,qqq,monitor_tel,number')->select();
        $EP->exportExcel($xlsxName,$xlsxCell,$xlsxData);

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
    
/**********************************************************************************按条件查询********************************************************************/
    public function search(){
		$c = D('class');
/*		if($_POST['year']){
			$d = D('class');
			$result=$d->select();
			$year=substr($_POST['year'],2,3);
				for($i=0;$i<count($result);$i++){//对班级进行处理，保存需要的班级
					$class=substr($result[$i]['class'],1,2);//截取字符串
					if($class==$year){
					   $arr[$result[$i]['class']]=$result[$i]['class'];
					 }
				}
				if(is_null($arr)){
					   $where['class'] = array('in',array('$arr','null'));
				   }else{
					   $where['class'] = array('in',$arr);
				 }       
			}*/	
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
        $list = $c->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		  if(date('m')>=9){
			$date=date('Y');
		  }else{
			$date=date('Y')-1;
		  }
		  var_dump(empty($_GET['class']) && !empty($_GET['year']));
		  $this -> assign('pagelist',$show);
		  $this->assign('list',$list);
		  $this->assign('date',$date);
		  $this->display('class2');
	}





}