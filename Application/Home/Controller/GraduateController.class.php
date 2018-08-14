<?php
namespace Home\Controller;
use Tools\RbacController;
class GraduateController extends RbacController {
    public function biyesheng(){
        if(date('m')>7){//判断年份，展示最新一年的记录
            $date=date('Y');
            }else{
            $date=date('Y')-1;
        }
        $by = new \Model\GraduateModel();
        $count= $by->count();// 查询满足要求的总记录数
        $Page= new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(15)
        $show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $by->relation(true)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this -> assign('pagelist',$show);
        $this -> assign('list',$list);
        $this->assign('date',$date);
        $this -> display();         
    }
    
     /**
     * 添加
     */
    public function add(){
        
        $by = new \Model\GraduateModel();
        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            //收集表单
            if( $by -> create()){
            $b = $by -> add();
            //var_dump($z);exit;
                if($b){
                    //$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
                    $this ->redirect('Home/Graduate/biyesheng', array(), 1, '添加成功');
                }else {
                    $this ->redirect('Home/Graduate/add', array(), 1, '添加失败');
                }
            } else {
                
                $this -> error($by -> getError());
                }
            
            
        }else{
            //展示表单
            $this -> display();
        }
    }
    
    /**
     * 修改
     */
    public function edit($id){
        $by = new \Model\GraduateModel();
        if(!empty($_POST)){
            //var_dump($_POST);exit;
            if($by -> create()) {
                $b = $by->save();
                if($b){
                    //$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
                 $this ->redirect('Home/Graduate/biyesheng', array(), 3, '修改成功');
                }else {
					$this ->redirect('Home/Graduate/biyesheng', array(), 3, '修改失败');
                }
            }else{
            
            $this ->error($by ->getError());
            }
        }else{
                //根据$goods_id获得被修改的商品信息，并给模板展示
                //find()方法只负责给返回一条记录
                $info = $by->relation(true)->find($id); 
                //var_dump($info);
                $this -> assign('info',$info);
                $this -> display();
            }
    }
    
    /* *
     * 删除
     */
    public function del($id){
        $by =D('graduate');
       if($id){
         $b= $by->where('id='.$id)-> delete();
         if($b){
          //$this->redirect('Home/Admin/administrator',array(),3,'删除成功！');
          $this->success("删除成功！", __CONTROLLER__.'/biyesheng',3);
      }else{
          //$this->redirect('Home/Admin/administrator',array('id'=>$id),3,'删除失败！');
          $this->error("删除失败！", __CONTROLLER__.'/biyesheng',3); 
      }
    }
       
    }
      /*==============================================================批量删除模块=====================================================================================*/
  
  public function delete() {
        $zp =D('graduate');
        $id = $_POST['id'];
        if($id) {
        if(is_array($id)){          
             $where = 'id in('.implode(',',$id).')';  
          }else{  
           $where = 'id='.$id; 
          }  //dump($where); 
          $list=$zp->where($where)->delete();  
          if($list!==false) {
             $this->success("成功删除{$list}条！", U("Home/Graduate/biyesheng")); 
          }else{   
            $this->error('删除失败！');  
          } 
        }else{
            
            $this ->error('请先选着需要删除的数据选项！');
            }
                  
      }
  public function excel() {/*导入表文件上传控制器*/
        $this -> display();
    }
    
    public function expUser(){/*导出表控制器*/
		if($_GET){
			if($_GET['s_number']){
				$where['s_number'] = $_GET['s_number'];
			}if(empty($_GET['class']) && !empty($_GET['year'])){
				$w = substr($_GET['year'],-2,2);
				$where['class'] = array('LIKE',"%$w%");
			}if($_GET['class']){
				$where['class'] = $_GET['class'];
			}if($_GET['work_type']){
				$where['work_type'] = $_GET['work_type'];
			}
		}
	
        $EP = new \Tools\Excel();
        $xlsxName = "毕业生信息表";//excel生成表名
        $xlsxCell = array(
            array('s_name', '姓名'),
            array('s_number', '学号'),
            array('sex', '性别'),
            array('class', '班级'),
            array('work_unit', '工作单位'),
            array('work_post', '职务'),
            array('work_type', '单位性质'),
            array('phone', '手机号码'),
            array('qq', 'QQ号'),
            array('time', '更新时间'),
        );
        $xlsxModel = new \Model\GraduateModel();
        $xlsxData = $xlsxModel->where($where)->Field('s_name,s_number,sex,class,work_unit,work_post,work_type,phone,qq,time')->select();
        $EP->exportExcel($xlsxName, $xlsxCell, $xlsxData);
    }
    public function impUser(){/*导入控制器*/
        $exportObj = new \Tools\Excel();//实例化
        $exportData = array('s_name','s_number','sex','class','work_unit','work_post','work_type','phone','qq','time');/*字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
        $dataBase = 'graduate';//数据库表名
        $action = 'Home/Graduate/biyesheng';//导入成功后跳转页面
        $where  = "s_number";
        $exportObj -> impUser($exportData,$dataBase,$action,$where);//调用导入方法
        }

/*********************************联动获取班级**************************************/
    public function getclass(){
        $d=D('graduate');
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

/*******************************按条件查询*************************************/
    public function search(){
		$by = new \Model\GraduateModel(); 
/*		if($_GET['s_number']){//有学号则按学号查询
			   $where['s_number'] = $_GET['s_number'];
			   
			}
		if($_GET['work_type']&&$_GET['year']){  //只选择就业性质作为条件查询
		//届别+就业性质作为条件查询
			$cla=D('class');
			$result=$cla->select();
			$year=substr($_GET['year'],2,3);
			for($i=0;$i<count($result);$i++){//对班级进行处理，保存需要的班级
				$class1=substr($result[$i]['class'],0,1);//截取班级首字母
				$class2=substr($result[$i]['class'],1,2);//截取班级第二三位数字
				if($class1=='A'&&$class2==($year-4) ){
					$arr[$result[$i]['class']]=$result[$i]['class'];
				}elseif($class1=='B'&&$class2==($year-3) ){
					$arr[$result[$i]['class']]=$result[$i]['class'];}
					else{}

			}
		  if(is_null($arr)){
			   $where['class'] = array('in',array('$arr','null'));
			   $where['work_type'] = array('eq',$_GET['work_type']);
		   }else{
			   $where['class'] = array('in',$arr);
			   $where['work_type'] = array('eq',$_GET['work_type']);
		   }       
		   }elseif(!$_GET['year']){
			  $where['work_type'] = array('eq',$_GET['work_type']);
		 }else{

			$cla=D('class');
			$result=$cla->select();
			$year=substr($_GET['year'],2,3);
			for($i=0;$i<count($result);$i++){//对班级进行处理，保存需要的班级
				$class1=substr($result[$i]['class'],0,1);//截取班级首字母
				$class2=substr($result[$i]['class'],1,2);//截取班级第二三位数字
				if($class1=='A'&&$class2==($year-4) ){
					$arr[$result[$i]['class']]=$result[$i]['class'];
				}elseif($class1=='B'&&$class2==($year-3) ){
					$arr[$result[$i]['class']]=$result[$i]['class'];}
					else{}

        }
       if(is_null($arr)){
		   $where['class'] = array('in',array('$arr','null'));
       }else{
		   $where['class'] = array('in',$arr);
       }       
       }
        $count      = $by->where($where)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //分页跳转的时候保证查询条件
        foreach($count as $key=>$val){   
			$Page->parameter   .=   "$key=".urlencode($val).'&';
        }
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $result = $by->relation(true)->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		if($_POST['class']){//如果有班级，则在结果中筛选出对应班级的信息（也可实现 班级+就业性质 作为条件查询）
                for($i=0;$i<count($result);$i++){
                    if($result[$i]['class']!=$_POST['class']){//去除不需要的班级记录
                        array_splice($result, $i, 1);$i--;
                    }
                }
            }
		if(date('m')>7){//判断年份，展示最新一年的记录
            $date=date('Y');
            }else{
            $date=date('Y')-1;
         }
         
          $this -> assign('pagelist',$show);
          $this->assign('list',$result);
          $this->assign('date',$date);
          $this->display('biyesheng');
*/	
			if($_GET['s_number']){
				$where['s_number'] = $_GET['s_number'];
			}if(empty($_GET['class']) && !empty($_GET['year'])){
				$w = substr($_GET['year'],-2,2);
				$where['class'] = array('LIKE',"%$w%");
			}if($_GET['class']){
				$where['class'] = $_GET['class'];
			}if($_GET['work_type']){
				$where['work_type'] = $_GET['work_type'];
			}
			$count = $by->where($where)->count();// 查询满足要求的总记录数
			$Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$result = $by->relation(true)->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
			if($_POST['class']){//如果有班级，则在结果中筛选出对应班级的信息（也可实现 班级+就业性质 作为条件查询）
			   for($i=0;$i<count($result);$i++){
				  if($result[$i]['class']!=$_POST['class']){//去除不需要的班级记录
					  array_splice($result, $i, 1);$i--;
				   }
			   }
			}
			if(date('m')>7){//判断年份，展示最新一年的记录
			   $date=date('Y');
			   }else{
				   $date=date('Y')-1;
			}
			$this -> assign('pagelist',$show);
			$this->assign('list',$result);
			$this->assign('date',$date);
			
			$this->display('biyesheng');
			  
		  
		  
		  
    }
	
	

}