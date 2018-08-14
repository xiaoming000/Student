<?php
namespace Home\Controller;
use Tools\RbacController;
class ZaixiaoshengController extends RbacController {
/********************************************************************学生信息主页面*******************************************************************************/
    public function student(){
	  $s = new \Model\StudentViewModel();
          $count=$s->count();
	  $per=5;
	  $page=new \Think\Page($count,$per);//实例化分页类
          $show = $page->show();          // 分页显示输出
          $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }
	  $result=$s
	  ->field('id,student.name as name,student.number as number,class,professional,sex,id_number,scholar,e_score,level_name,score,competition,award_level,honorary,punish,school_roll')
	  ->order('id desc ')
	  ->page($p.','.$per)
	  ->limit($p*3,($p+1)*$per)
	  ->select();
	  
	  $this->assign('s',$result);
	  $this->display();
			}
/********************************************************************查看*******************************************************************************/
    public function account_query($id){      
		$student = D('student');
		$jiangcheng = D('jiangcheng');
		$class = D('class'); 
		$english = D('english'); 
		$computer = D('computer'); 
                $parent = D('parent');            
        $list = $student
		 ->join('LEFT JOIN jiangcheng ON student.number = jiangcheng.number')
		 ->join('LEFT JOIN computer ON student.number = computer.number')
		 ->join('LEFT JOIN english ON student.number = english.number')
		 ->join('LEFT JOIN class ON student.class = class.class')
                 ->join('LEFT JOIN parent ON student.number = parent.number')
		 ->field('student.number as number,nationality,political_status,student.name as name,father_name,english.level_name,education_level,mother_name,professional,birthday,parent.home_address,home_tel,father_unit,student.class as class,
		 jiangcheng.scholar,jiangcheng.competition,jiangcheng.award_level,jiangcheng.honorary,mother_unit,jiangcheng.punish,student.school_roll,student.sex,student.id_number,remark,
		 computer.score,english.score as e_score')
		  ->where("student.id=$id")->limit('0,15')->find();
		$this -> assign('list',$list);
		$this -> display();
       		}
    
/********************************************************************修改*******************************************************************************/
    public function edit($number){
		$s = new \Model\StudentModel();
		$p = new \Model\ParentModel();
		if($_POST){
			$data['s'] = $s->create();
			$data['p']  = $p->create();			
		if($data){//var_dump($data);exit;
			$name = $data['s']['name'];
			$id_number = $data['s']['id_number'];
			$class = $data['s']['class'];
			$sex = $data['s']['sex'];
			$nationality = $data['s']['nationality'];
			$political_status = $data['s']['political_status'];
			$education_level = $data['s']['education_level'];
			$birthday = $data['s']['birthday'];			
			$father_name = $data['p']['father_name'];
			$father_unit = $data['p']['father_unit'];
			$mother_name = $data['p']['mother_name'];
			$mother_unit = $data['p']['mother_unit'];
			$home_address = $data['p']['home_address'];
			$father_unit = $data['p']['father_unit'];
                        $birthday = $data['s']['birthday'];
			$sql =$s->execute("update student,parent,class set 
			student.name='$name',student.id_number='$id_number',student.class='$class',student.sex='$sex',student.nationality='$nationality',
			student.political_status='$political_status',student.education_level='$education_level',student.birthday='$birthday',
			parent.father_name='$father_name',parent.father_unit='$father_unit',parent.mother_name='$mother_name',
			parent.mother_unit='$mother_unit',parent.home_address='$home_address',parent.home_tel='$home_tel'
			where student.number='$number'");						
		if($sql){
				$this -> success('修改成功！',u("Home/Zaixiaosheng/student"));
				}else{
				$this -> error('修改失败！');
					}
			}else{
				$this -> error($s -> getError());
				}
		}else{
			$student =new \Model\StudentViewModel();
			$info = $student->where('student.number='.$number) ->find();
			$this -> assign('info',$info);
			$this -> display();
		}
    }  
/********************************************************************添加*******************************************************************************/

    public function add(){
		
		$s = new \Model\StudentModel();
        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            //收集表单
            if( $s -> create()){
            $z = $s -> add();
			//var_dump($z);exit;
				if($z){
					$this->success("添加成功！", __CONTROLLER__.'/student',3);
				}else {
					$this->error("添加失败！", __CONTROLLER__.'/student',3);
				}
			} else {
				
				$this -> error($s -> getError());
				}
			
			
        }else{
            //展示表单
            $this -> display();
        }
    }


/********************************************************************删除*******************************************************************************/
    public function del($id){
        $a =D('student');
            if($id){
                $b= $a->where('id='.$id)-> delete();
                    if($b){
                        $this->success("删除成功！", __CONTROLLER__.'/student',3);
                            }else{
                                $this->error("删除失败！", __CONTROLLER__.'/student',3); 
                                    }
                                }
                            }
       
   
/*==============================================================批量删除模块=====================================================================================*/
  
  public function delete() {	  	
		$a =D('student');
                $id = $_POST['id'];
		if($id) {		
		if(is_array($id)){					
			 $where = 'id in('.implode(',',$id).')';  
		  }else{  
		   $where = 'id='.$id; 
		  }  //dump($where); 
		  $list=$a->where($where)->delete();  
		  if($list!==false) {
			 $this->success("成功删除{$list}条！", U("Home/Zaixiaosheng/student")); 
		  }else{   
			$this->error("删除失败！", U("Home/Zaixiaosheng/student"));  
		  } 
		}else{
			
			$this ->error("请先选着需要删除的数据选项！", U("Home/Zaixiaosheng/student"));
			}			  
	  }
/*==============================================================Excel表导入导出模块=====================================================================================*/
    public function excel() {/*导出表文件上传控制器*/
		$this -> display();
    }
	public function expUser(){/*导出表控制器*/
        $xlsxModel = new \Model\StudentViewModel();
		if($_GET){
			//var_dump($_GET);exit;
			if($_GET['number']){//有学号则按学号查询
				$w = $_GET['number'];
				$xlsxData  = $xlsxModel->where('student.number ='.$w)->Field('name,class,number,professional,sex,id_number,scholar,e_score,competition,award_level,honorary,punish,school_roll')->select();
			}else{
								 
				if($_GET['class']){//如果有班级，则在结果中筛选出对应班级的信息
					$where['class'] = $_GET['class'];
				}elseif(empty($_GET['class']) && !empty($_GET['grade'])){
					if(date('m')>=9){//如大三来说17年九月以前是14届的，九月以后是15届的
						$data_class=date('y')-$_GET['g']+1;
					}else{
						$data_class=date('y')-$_GET['g'];
					}
					$data = substr($data_class,-2,2) - $_GET['grade'];
					$where['class'] = array('LIKE',"%$data%");
				} 
				$xlsxData  = $xlsxModel->where($where)->Field('name,class,number,professional,sex,id_number,scholar,e_score,competition,award_level,honorary,punish,school_roll')->select();
			}
		}
        $EP = new \Tools\Excel();
        $xlsxName  = "学生信息表";//excel生成表名
        $xlsxCell  = array(
        array('name','姓名'),
        array('class','班级'),
        array('number','学号'),
        array('professional','专业'),
        array('sex','性别'),
		array('id_number','身份证号'),
		array('scholar','奖学金'),
		array('e_score','英语等级'),
		array('score','NCRE'),
		array('competition','竞赛名称'),
		array('award_level','获奖等级'),
		array('honorary','评优评先'),
		array('punish','处分记录'),
		array('school_roll','学籍异动'),
        );
        $EP->exportExcel($xlsxName,$xlsxCell,$xlsxData);
	
	}
		
	public function impUser(){/*导入控制器*/
		$exportObj = new \Tools\Excel();//实例化
		$exportData = array('number','name','class','sex','id_number','nationality','political_status','education_level','birthday','regional','password','power','school_roll');//字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
		$dataBase = 'student';//数据库表名
		$action = 'Home/Zaixiaosheng/student';//导入成功后跳转页面
                $where = "number";                                         //如果某字段存在相同字段则不导入判断，不需要判断则这是为null
		$exportObj -> impUser($exportData,$dataBase,$action,$where);//调用导入方法,将参数写入
	}
	
	 
/************************************************************************按条件查询******************************************************************************************/
    public function search(){
		$s=new \Model\StudentViewModel();//定义视图模型
		if($_GET['number']){//有学号则按学号查询
			$sql="student.number='{$_GET['number']}'";
			$result=$s->field('id,student.name as name,student.number as number,class,professional,sex,id_number,scholar,e_score,level_name,score,competition,award_level,honorary,punish,school_roll')->order('id desc ')->where($sql)->select();
        }else{
                             
            if($_GET['class']){//如果有班级，则在结果中筛选出对应班级的信息
				$where['class'] = $_GET['class'];
            }elseif(empty($_GET['class']) && !empty($_GET['grade'])){
				if(date('m')>=9){//如大三来说17年九月以前是14届的，九月以后是15届的
					$data_class=date('y')-$_GET['g']+1;
				}else{
					$data_class=date('y')-$_GET['g'];
				}
				$data = substr($data_class,-2,2) - $_GET['grade'];
				$where['class'] = array('LIKE',"%$data%");
			}   
            $count = $s ->where($where)-> count($result);           //查询数据总条数
            $per = 10;       //每页显示的记录数
            $page = new \Think\Page($count,$per); // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }
            $result=$s->field('id,student.name as name,student.number as number,class,professional,sex,id_number,scholar,e_score,level_name,score,competition,award_level,honorary,punish,school_roll')->where($where)->order('id desc ')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
     	 }
                         
            
         $this->assign('s',$result);
         $this->display('student');
	}       
        
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