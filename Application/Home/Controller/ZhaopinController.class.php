<?php
namespace Home\Controller;

use Think\Controller;

class ZhaopinController extends Controller {
    
    /**
     * 查找
     */
    public function zhaopin(){
		 //实现数据分页效果
        $zp = new \Model\RecruitmentModel();
        $count= $zp->count();// 查询满足要求的总记录数
        $Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(15)
        $show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $zp->limit($Page->firstRow.','.$Page->listRows)->select();
        $this -> assign('pagelist',$show);
        $this -> assign('list',$list);
        $this -> display();

    }
	
     /**
     * 添加
     */
    public function add(){
		
       	$zp = new \Model\RecruitmentModel();
        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            //收集表单
            if( $zp -> create()){
            $z = $zp -> add();
			//var_dump($z);exit;
				if($z){
					//$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
					$this ->redirect('Home/Zhaopin/zhaopin', array(), 3, '添加成功');
				}else {
					$this ->redirect('Home/Zhaopin/add', array(), 3, '添加失败');
				}
			} else {
				
				$this -> error($zp -> getError());
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
		$zp = new \Model\RecruitmentModel();
        //两个逻辑：展示、收集
        if(!empty($_POST)){
			//var_dump($_POST);exit;
			if($zp -> create()) {
				$z = $zp -> save($_POST);
				if($z){
					//$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
					$this ->redirect('Home/Zhaopin/zhaopin', array(), 3, '修改成功');
				}else {
					$this ->redirect('Home/Zhaopin/edit', array('id'=>$id), 3, '修改失败');
				}
			}else{
			
			$this ->error($zp ->getError());
			}
		}else{
				//根据$goods_id获得被修改的商品信息，并给模板展示
				//find()方法只负责给返回一条记录结果，并且是[一维]数组返回
				$info = $zp -> find($id);
				//var_dump($info);
				$this -> assign('info',$info);
				$this -> display();
			}
    }
    /**
     * 查看详情
     */
    public function detail($id){
		$zp = new \Model\RecruitmentModel();
				$info = $zp -> find($id);
				$this -> assign('info',$info);
				$this -> display();

    }
    
    
    /* *
     * 删除
     */
    public function del($id){
        $by =D('recruitment');
        if($id){
            $b= $by->where('id='.$id)-> delete();
            if($b){
                //$this->redirect('Home/Admin/administrator',array(),3,'删除成功！');
                $this->success("删除成功！", __CONTROLLER__.'/Zhaopin',3);
            }else{
                //$this->redirect('Home/Admin/administrator',array('id'=>$id),3,'删除失败！');
                $this->error("删除失败！", __CONTROLLER__.'/Zhaopin',3);
            }
        }

    }
    /*==============================================================批量删除模块=====================================================================================*/
  
  public function delete() {
	  
		
		$zp =D('recruitment');
		
		$id = $_POST['id'];
		if($id) {
		
		if(is_array($id)){
					
			 $where = 'id in('.implode(',',$id).')';  
		  }else{  
		   $where = 'id='.$id; 
		  }  //dump($where); 
		  $list=$zp->where($where)->delete();  
		  if($list!==false) {
			 $this->success("成功删除{$list}条！", U("Home/Zhaopin/zhaopin")); 
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
            $EP = new \Tools\Excel();
            $xlsxName = "招聘信息表";//excel生成表名
            $xlsxCell = array(
                array('company_name', '公司名称'),
                array('degree', '学历要求'),
                array('major', '需求专业'),
                array('job', '拟安排岗位'),
                array('number', '招聘人数'),
                array('pay', '待遇'),
                array('contact_people', '单位联系人'),
                array('tel', '单位联系人方式'),
                array('zpjz', '招聘简章'),
            );
            $xlsxModel = new \Model\RecruitmentModel();
            $xlsxData = $xlsxModel->Field('company_name,degree,major,job,number,pay,contact_people,tel,zpjz')->select();
            $EP->exportExcel($xlsxName, $xlsxCell, $xlsxData);
		}
		
	public function impUser(){/*导入控制器*/
		$exportObj = new \Tools\Excel();//实例化
		$exportData = array('company_name','degree','major','job','number','pay','contact_people','tel','zpjz');/*字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
		$dataBase = 'recruitment';//数据库表名
		$action = 'Home/Zhaopin/zhaopin';//导入成功后跳转页面
		$where  = "";
        $exportObj -> impUser($exportData,$dataBase,$action,$where);//调用导入方法
        }
		
}