<?php
namespace Home\Controller;

use Think\Controller;

class EvaluationController extends Controller
{
    public function evaluation()
    {

        $evaluation = D('evaluation');
        $student = D('student');

/*        if ($_GET) {

            $school_year = $_GET['school_year'];  //获取学年
            $semester = $_GET['semester'];    //获取学期
            $class = $_GET['class'];          //获取班级
            $where['evaluation.school_year'] = $school_year;
            $where['evaluation.semester'] = $semester;
            $where['student.class'] = $class;
*/
            $count = $evaluation
                ->join('LEFT JOIN student ON student.number = evaluation.number')
                ->field('evaluation.id as id,student.number as number,student.name as name,student.class,
                         evaluation.credit,evaluation.avrscore,evaluation.sum_score,evaluation.test,evaluation.pe,
                         evaluation.pe_test,evaluation.morality,evaluation.mora_test,evaluation.skill,evaluation.com_test')
                ->where($where)->count();           //查询数据总条数
            $per = 1;       //每页显示的记录数
            $page = new \Think\Page($count,$per);     // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }

            //显示查询结果
            $list = $evaluation
                ->join('LEFT JOIN student ON student.number = evaluation.number')
                ->field('evaluation.id as id,student.number as number,student.name as name,student.class,
                         evaluation.credit,evaluation.avrscore,evaluation.sum_score,evaluation.test,evaluation.pe,
                         evaluation.pe_test,evaluation.morality,evaluation.mora_test,evaluation.skill,evaluation.com_test')
                ->where($where)->order('student.number')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
            $this->assign('list', $list);

            //显示查询选项
            $sql = "select distinct school_year from evaluation where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $evaluation->query($sql);
            $student = D('student');
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);

            $this->display();
/*        } else {
            $sql = "select distinct school_year from evaluation where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $evaluation->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);
            $this->display();
        }
*/}

    /**
     * 编辑
     */
    public function edit($id)
    {
        $evaluation = new \Model\EvaluationModel();
        if (!empty($_POST)) {
            if ($evaluation->create()) {
                $z = $evaluation->save();
                if ($z) {
                    $this->redirect('Home/Evaluation/evaluation', array(), 3, '修改成功！');
                } else {
                    $this->redirect('Home/Evaluation/edit', array('id' => $id), 3, '修改失败！');
                }
            }
        } else {
            $info = $evaluation->find($id);
            $this->assign('info', $info);
            $this->display();
        }
    }
    /**
     * 删除
     */
    public function delete($id)
    {	$where['id'] = $_GET['id'];
        $e =D('evaluation');var_dump($e->where($where)->find());//$e->where($where)->select()
        if($id){
           $b= $e->where('id='.$id)-> delete();
           if($b){
                  $this->success("删除成功！", __CONTROLLER__.'/evaluation',3);
           }else{
                  $this->error("删除失败！", __CONTROLLER__.'/evaluation',10); 
           }
        }
    }
    /**
     * 批量删除
     */
    public function deleteAll()
    {

        $evaluation = D('evaluation');

        $id = $_POST['id'];
        if ($id) {

            if (is_array($id)) {

                $where = 'id in(' . implode(',', $id) . ')';
            } else {
                $where = 'id=' . $id;
            }  //dump($where);
            $list = $evaluation->where($where)->delete();
            if ($list !== false) {
                $this->success("成功删除{$list}条！", U("Home/Evaluation/evaluation"));
            } else {
                $this->error("删除失败！", U("Home/Evaluation/evaluation"));
            }
        } else {

            $this->error("请先选着需要删除的数据选项！", U("Home/Evaluation/evaluation"));
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
        if ($_POST) {

            $school_year = $_POST['school_year'];  //获取学年
            $semester = $_POST['semester'];    //获取学期
            $class = $_POST['class'];          //获取班级
            //var_dump($class); exit;
            $where['evaluation.school_year'] = $school_year;
            $where['evaluation.semester'] = $semester;
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
        $xlsxModel = new \Model\EvaluationModel();
        $xlsxData = $xlsxModel
//		->Field('number,name,class,scholar,level_name,e_score,competition,award_level,honorary,punish,remark')
					->join('LEFT JOIN student ON student.number = evaluation.number')
					->field('evaluation.id as id,student.number as number,student.name as name,student.class,
                         evaluation.credit,evaluation.avrscore,evaluation.sum_score,evaluation.test,evaluation.pe,
                         evaluation.pe_test,evaluation.morality,evaluation.mora_test,evaluation.skill,evaluation.com_test')
					->where($where)->select();
		var_dump($xlsxData);exit;
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
/*******************************************************条件查询******************************************************************************/
	public function search(){
        $evaluation = D('evaluation');
        $student = D('student');
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
				$where['evaluation.school_year'] = $_GET['school_year'];
				if($_GET['semester']){$where['evaluation.semester'] = $_GET['semester'];}
				
			} 
			
     	 }
            $count = $student
                ->join('LEFT JOIN evaluation ON student.number = evaluation.number')
                ->field('student.id as id,student.number as number,student.name as name,student.class,
                         evaluation.credit,evaluation.avrscore,evaluation.sum_score,evaluation.test,evaluation.pe,
                         evaluation.pe_test,evaluation.morality,evaluation.mora_test,evaluation.skill,evaluation.com_test')
                ->where($where)->count();           //查询数据总条数
            $per = 10;       //每页显示的记录数
            $page = new \Think\Page($count,$per);     // 实例化分页类 传入总记录数和每页显示的记录数
            $show = $page->show();          // 分页显示输出
            $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }

            $list = $evaluation
                ->join('LEFT JOIN student ON student.number = evaluation.number')
                ->field('evaluation.id as id,student.number as number,student.name as name,student.class,
                         evaluation.credit,evaluation.avrscore,evaluation.sum_score,evaluation.test,evaluation.pe,
                         evaluation.pe_test,evaluation.morality,evaluation.mora_test,evaluation.skill,evaluation.com_test')
                ->where($where)->order('student.number')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
            $this->assign('list', $list);

            //显示查询选项
            $sql = "select distinct school_year from evaluation where school_year is not null order by school_year desc ";
            $sql1 = "select distinct class from student where class is not null order by class desc ";
            $data1 = $evaluation->query($sql);
            $data2 = $student->query($sql1);
            $this->assign('data1', $data1);
            $this->assign('data2', $data2);
            //var_dump($_GET['semester']);
            $this->assign('list',$list);
            $this->display('evaluation');
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







}

?>
