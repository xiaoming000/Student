<?php

namespace Home\Controller;

use Tools\RbacController;

class JiangchengController extends RbacController
{
    /**
     * 选择页面
     */
    public function enter()
    {

        $this->display();
    }

    /**
     * 奖惩页面
     */
    public function jiangcheng()
    {

        $student = D('student');
        $jiangcheng = D('jiangcheng');

/*        if ($_GET) {             //传递查询条件只能用GET方法
*/
/*            $school_year = $_GET['school_year'];  //获取学年
            $semester = $_GET['semester'];    //获取学期
            $class = $_GET['class'];          //获取班级
            $where['jiangcheng.school_year'] = $school_year;
            $where['jiangcheng.semester'] = $semester;
            $where['student.class'] = $class;
*/
            $count = $student
                ->join('LEFT JOIN jiangcheng ON student.number = jiangcheng.number')
                ->join('LEFT JOIN computer ON student.number = computer.number')
                ->join('LEFT JOIN english ON student.number = english.number')
                ->field('student.id as id,student.number as number,student.name as name,student.class,
		 jiangcheng.scholar,jiangcheng.competition,jiangcheng.award_level,jiangcheng.honorary,jiangcheng.punish,jiangcheng.remark,jiangcheng.school_year,
		 computer.score,
		 english.score as e_score,english.level_name')
                ->where($where)->count();           //查询数据总条数
            $per = 10;       //每页显示的记录数
            $page = new \Think\Page($count,$per);     // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }
            //显示查询结果
            $list = $student
                ->join('LEFT JOIN jiangcheng ON student.number = jiangcheng.number')
                ->join('LEFT JOIN computer ON student.number = computer.number')
                ->join('LEFT JOIN english ON student.number = english.number')
                ->field('student.id as id,student.number as number,student.name as name,student.class,
						 jiangcheng.scholar,jiangcheng.competition,jiangcheng.award_level,jiangcheng.honorary,jiangcheng.punish,jiangcheng.remark,jiangcheng.school_year,
						 computer.score,
						 english.score as e_score,english.level_name')
                ->order('student.number')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
            $this->assign('list', $list);     //传送数据

            //显示查询选项
            $sql = "select distinct school_year from jiangcheng where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $jiangcheng->query($sql);
            $student = D('student');
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);
            
            $this->display();
/*        } else {
            $sql = "select distinct school_year from jiangcheng where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $jiangcheng->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);
            $this->display();
        }
*/    }


    /**
     * 奖惩修改
     */
    public function edit($id)
    {
        $jiangcheng = new \Model\JiangchengModel();
        if (!empty($_POST)) {
            if ($jiangcheng->create()) {
                $z = $jiangcheng->save();
                if ($z) {
                    $this->redirect('Home/Jiangcheng/jiangcheng', array(), 3, '修改成功！');
                } else {
                    $this->redirect('Home/Jiangcheng/edit', array('id' => $id), 3, '修改失败！');
                }
            }
        } else {
            $info = $jiangcheng->find($id);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 奖惩删除
     */
    public function delete($id)
    {
        $jiangcheng = D('jiangcheng');
        if (!empty($_POST)) {
            $z = $jiangcheng->where($_POST)->delete();
            if ($z) {
                $this->redirect('Home/Jiangcheng/jiangcheng', array(), 3, '删除成功！');
            } else {
                $this->redirect('Home/Jiangcheng/jiangcheng', array(), 3, '删除失败！');
            }

        } else {
            $info = $jiangcheng->find($id);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 奖惩批量删除
     */
    public function deleteAll()
    {

        $jiangcheng = D('jiangcheng');

        $id = $_POST['id'];
        if ($id) {

            if (is_array($id)) {

                $where = 'id in(' . implode(',', $id) . ')';
            } else {
                $where = 'id=' . $id;
            }  //dump($where);
            $list = $jiangcheng->where($where)->delete();
            if ($list !== false) {
                $this->success("成功删除{$list}条！", U("Home/Jiangcheng/jiangcheng"));
            } else {
                $this->error("删除失败！", U("Home/Jiangcheng/jiangcheng"));
            }
        } else {

            $this->error("请先选着需要删除的数据选项！", U("Home/Jiangcheng/jiangcheng"));
        }

    }

    /**
     * 导入导出
     */
    public function excel()     //导入表文件上传控制器
    {
        $this->display();
    }

    public function expUser()   // 导出表控制器
    {
        if ($_GET) {

            $school_year = $_GET['school_year'];  //获取学年
            $semester = $_GET['semester'];    //获取学期
            $class = $_GET['class'];          //获取班级
            //var_dump($class); exit;
            $where['jiangcheng.school_year'] = $school_year;
            $where['jiangcheng.semester'] = $semester;
            $where['student.class'] = $class;
        }
        $EP = new \Tools\Excel();
        $xlsxName = "奖惩信息表";    //excel生成表名
        $xlsxCell = array(
            array('number', '学号'),
            array('name', '姓名'),
            array('class', '班级'),
            array('scholar', '奖学金'),
            array('level_name', '英语等级'),
            array('e_score', '等级成绩'),
            array('score', '计算机等级成绩'),
            array('competition', '竞赛名称'),
            array('award_level', '获奖等级'),
            array('honorary', '评优评先'),
            array('punish', '处分记录'),
            array('remark', '备注'),
        );
        $xlsxModel = new \Model\JiangchengViewModel();
        $xlsxData = $xlsxModel->Field('number,name,class,scholar,level_name,e_score,competition,award_level,honorary,punish,remark')->where($where)->select();
        $EP->exportExcel($xlsxName, $xlsxCell, $xlsxData);

    }

    public function impUser()   // 导入控制器
    {
        $exportObj = new \Tools\Excel();    // 实例化
        $exportData = array('school_year', 'semester', 'number', 'level_name', 'score', 'admission');//字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入
        $dataBase = 'english';      // 数据库表名
        $action = 'Home/Jiangcheng/jiangcheng';     // 导入成功后跳转页面
        $exportObj->impUser($exportData, $dataBase, $action);   // 调用导入方法
    }

    public function impUser1()   // 导入控制器
    {
        $exportObj = new \Tools\Excel();    // 实例化
        $exportData = array('school_year', 'semester', 'number', 'score', 'admission');//字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入
        $dataBase = 'computer';      // 数据库表名
        $action = 'Home/Jiangcheng/jiangcheng';     // 导入成功后跳转页面
        $exportObj->impUser($exportData, $dataBase, $action);   // 调用导入方法
    }

    public function impUser2()   // 导入控制器
    {
        $exportObj = new \Tools\Excel();    // 实例化
        $exportData = array('school_year', 'semester', 'number', 'scholar', 'competition', 'award_level', 'honorary', 'punish', 'remark');//字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入
        $dataBase = 'jiangcheng';      // 数据库表名
        $action = 'Home/Jiangcheng/jiangcheng';     // 导入成功后跳转页面
        $exportObj->impUser($exportData, $dataBase, $action);   // 调用导入方法
    }


    /**
     * 英语等级页面
     */
/****************************************************************英语等级页面*****************************************************************************/
    public function english()
    {
        $student = D('student');
        $english = D('english');

            //选项查询变量
            $count = $student
                ->join('LEFT JOIN english ON student.number = english.number')
                ->field('student.number,student.class,student.name,
				english.id as id,english.school_year,semester,english.level_name,english.score,english.admission')
                ->count();           //查询数据总条数
            $per = 10;       //每页显示的记录数
            $page = new \Think\Page($count,$per);     // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }

            $list = $student
                ->join('LEFT JOIN english ON student.number = english.number')
                ->field('student.number,student.class,student.name,english.id as id,english.school_year,semester,english.level_name,english.score,english.admission')
                ->order('student.number')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
            $this->assign('list', $list);
			
            //显示查询选项
            $sql = "select distinct school_year from english where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $english->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);

            $this->display();
       
    }



    /**
     * 英语修改
     */
    public function edit_english($id)
    {
        $english = new \Model\EnglishModel();
        if (!empty($_POST)) {
            if ($english->create()) {
                $z = $english->save();
                if ($z) {
                    $this->redirect('Home/Jiangcheng/english', array(), 3, '修改成功！');
                } else {
                    $this->redirect('Home/Jiangcheng/edit_english', array('id' => $id), 3, '修改失败！');
                }
            }
        } else {
            $info = $english->find($id);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 英语删除
     */
    public function del_english($id)
    {
        $english = D('english');
        if (!empty($_POST)) {
            $z = $english->where($_POST)->delete();
            if ($z) {
                $this->redirect('Home/Jiangcheng/english', array(), 3, '删除成功！');
            } else {
                $this->redirect('Home/Jiangcheng/english', array(), 3, '删除失败！');
            }

        } else {
            $info = $english->find($id);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 英语批量删除
     */
    public function delete_english()
    {

        $english = D('english');

        $id = $_POST['id'];
        if ($id) {
            if (is_array($id)) {
                $where = 'id in(' . implode(',', $id) . ')';
            } else {
                $where = 'id=' . $id;
            }  //dump($where);
            $list = $english->where($where)->delete();
            if ($list !== false) {
                $this->success("成功删除{$list}条！", U("Home/Jiangcheng/english"));
            } else {
                $this->error('删除失败！');
            }
        } else {
            $this->error('请先选着需要删除的数据选项！');
        }

    }


    /**
     * 计算机等级
     */
/****************************************************************计算机等级页面*****************************************************************************/
    public function computer()
    {

        $student = D('student');
        $computer = D('computer');
/*        if ($_GET) {
*/            //选项查询变量
/*            $school_year = $_GET['school_year'];
            $semester = $_GET['semester'];
            $class = $_GET['class'];
            $where['computer.school_year'] = $school_year;
            $where['computer.semester'] = $semester;
            $where['student.class'] = $class;
*/
            $count = $student
                ->join('LEFT JOIN computer ON student.number = computer.number')
                ->field('student.number,student.class,student.name
				,computer.id as id,computer.school_year,semester,computer.score,computer.admission')
                ->where($where)->count();           //查询数据总条数
            $per = 10;       //每页显示的记录数
            $page = new \Think\Page($count,$per);     // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }

            $list = $student
                ->join('LEFT JOIN computer ON student.number = computer.number')
                ->field('student.number,student.class,student.name
				,computer.id as id,computer.school_year,semester,computer.score,computer.admission')
                ->where($where)->order('student.number')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
            $this->assign('list', $list);

            //显示查询选项
            $sql = "select distinct school_year from computer where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $computer->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);

            $this->display();
/*        } else {
            $sql = "select distinct school_year from computer where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $computer->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);
            $this->display();

        }
*/    }


    /**
     * 计算机等级修改
     */
    public function edit_computer($id)
    {
        $computer = new \Model\ComputerModel();
        if (!empty($_POST)) {
            if ($computer->create()) {
                $z = $computer->save();
                if ($z) {
                    $this->redirect('Home/Jiangcheng/computer', array(), 3, '修改成功！');
                } else {
                    $this->redirect('Home/Jiangcheng/edit_computer', array('id' => $id), 3, '修改失败！');
                }
            }
        } else {
            $info = $computer->find($id);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 计算机删除
     */
    public function del_computer($id)
    {
        $computer = D('computer');
        if (!empty($_POST)) {
            $z = $computer->where($_POST)->delete();
            if ($z) {
                $this->redirect('Home/Jiangcheng/computer', array(), 3, '删除成功！');
            } else {
                $this->redirect('Home/Jiangcheng/computer', array(), 3, '删除失败！');
            }

        } else {
            $info = $computer->find($id);
            $this->assign('info', $info);
            $this->display();
        }
    }

    /**
     * 计算机批量删除
     */
    public function delete_computer()
    {

        $computer = D('computer');

        $id = $_POST['id'];
        if ($id) {

            if (is_array($id)) {

                $where = 'id in(' . implode(',', $id) . ')';
            } else {
                $where = 'id=' . $id;
            }  //dump($where);
            $list = $computer->where($where)->delete();
            if ($list !== false) {
                $this->success("成功删除{$list}条！", U("Home/Jiangcheng/computer"));
            } else {
                $this->error('删除失败！');
            }
        } else {

            $this->error('请先选着需要删除的数据选项！');
        }

    }
	
/*******************************************************联动获取班级******************************************************************************/
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
	
	
	
	
	
/*******************************************************英语条件查询******************************************************************************/
public function search_english(){
        $student = D('student');
        $english = D('english');
		if($_GET['number']){//有学号则按学号查询
		
			$where['student.number'] = $_GET['number'];
		
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
				
			}elseif($_GET['school_year']){
				$where['school_year'] = $_GET['school_year'];
				if($_GET['semester']){$where['semester'] = $_GET['semester'];}
				
			} 
			
     	 }
            $count = $student
                ->join('LEFT JOIN english ON student.number = english.number')
                ->field('student.number,student.class,student.name,
				english.id as id,english.school_year,semester,english.level_name,english.score,english.admission')
                ->where($where)->count();           //查询数据总条数
            $per = 10;       //每页显示的记录数
            $page = new \Think\Page($count,$per);     // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }

            $list = $student
                ->join('LEFT JOIN english ON student.number = english.number')
                ->field('student.number,student.class,student.name,english.id as id,english.school_year,semester,english.level_name,english.score,english.admission')
                ->order('student.number')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
            $this->assign('list', $list);

            //显示查询选项
            $sql = "select distinct school_year from english where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $english->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);
            //var_dump($_GET['semester']);
            $this->assign('list',$list);
            $this->display('computer');
		 
		 
		 
		 
	}

public function search_computer(){
        $student = D('student');
        $computer = D('computer');
		if($_GET['number']){//有学号则按学号查询
		
			$where['student.number'] = $_GET['number'];
		
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
				
			}elseif($_GET['school_year']){
				$where['school_year'] = $_GET['school_year'];
				if($_GET['semester']){$where['semester'] = $_GET['semester'];}
				
			} 
			
     	 }
            $count = $student
                ->join('LEFT JOIN computer ON student.number = computer.number')
                ->field('student.number,student.class,student.name
				,computer.id as id,computer.school_year,semester,computer.score,computer.admission')
                ->where($where)->count();           //查询数据总条数
            $per = 10;       //每页显示的记录数
            $page = new \Think\Page($count,$per);     // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }

            $list = $student
                ->join('LEFT JOIN computer ON student.number = computer.number')
                ->field('student.number,student.class,student.name
				,computer.id as id,computer.school_year,semester,computer.score,computer.admission')
                ->where($where)->order('student.number')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
            $this->assign('list', $list);

            //显示查询选项
            $sql = "select distinct school_year from computer where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $computer->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);
            //var_dump($_GET['semester']);
            $this->assign('list',$list);
            $this->display('computer');
	}

	public function search_jiangcheng(){
        $student = D('student');
        $jiangcheng = D('jiangcheng');
		if($_GET['number']){//有学号则按学号查询
		
			$where['student.number'] = $_GET['number'];
		
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
				
			}elseif($_GET['school_year']){
				$where['jiangcheng.school_year'] = $_GET['school_year'];
				if($_GET['semester']){$where['jiangcheng.semester'] = $_GET['semester'];}
				
			} 
			
     	 }
            $count = $student
                ->join('LEFT JOIN jiangcheng ON student.number = jiangcheng.number')
                ->join('LEFT JOIN computer ON student.number = computer.number')
                ->join('LEFT JOIN english ON student.number = english.number')
                ->field('student.id as id,student.number as number,student.name as name,student.class,
						 jiangcheng.scholar,jiangcheng.competition,jiangcheng.award_level,jiangcheng.honorary,jiangcheng.punish,jiangcheng.remark,jiangcheng.school_year,
						 computer.score,
						 english.score as e_score,english.level_name')
                ->where($where)->count();           //查询数据总条数
            $per = 10;       //每页显示的记录数
            $page = new \Think\Page($count,$per);     // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }

            $list = $student
                ->join('LEFT JOIN jiangcheng ON student.number = jiangcheng.number')
                ->join('LEFT JOIN computer ON student.number = computer.number')
                ->join('LEFT JOIN english ON student.number = english.number')
                ->field('student.id as id,student.number as number,student.name as name,student.class,
						 jiangcheng.scholar,jiangcheng.competition,jiangcheng.award_level,jiangcheng.honorary,jiangcheng.punish,jiangcheng.remark,jiangcheng.school_year,
						 computer.score,
						 english.score as e_score,english.level_name')
                ->where($where)->order('student.number')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
            $this->assign('list', $list);

            //显示查询选项
            $sql = "select distinct school_year from jiangcheng where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $jiangcheng->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);
            //var_dump($_GET['semester']);
            $this->assign('list',$list);
            $this->display('computer');
	}






}