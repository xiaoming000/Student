<?php
namespace Home\Controller;

use Think\Controller;

class FangyuanController extends Controller {
    /**
     * 房源信息展示
     */
    public function fangyuan(){
		 //实现数据分页效果
          $d=  new \Model\DormitoryModel();//定义视图模型
          $f = new \Model\FangyuanModel();
          $fang = $f->distinct(true)->field('building')->select();sort($fang);
          $fa=$f->distinct(true)->field('floor')->select();sort($fa);
	  $count=$f->count();
	  $per=3;
	  $page=new \Think\Page($count,$per);//实例化分页类
          $show = $page->show();          // 分页显示输出
          $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }
	  $result=$f->field('id,school,building,floor,bnumber,sex,price,max,boss,telnumber')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
//        sort($result['building']);
//遍历数据库  将学生住宿情况找出
          for($i=0;$i<count($result);$i++){
              $result[$i]['now_stu']=$d->where('dormitoryid='.$result[$i]['id'])->count();//统计该寝室ID下的住宿人数
              $result[$i]['countt'] = $result[$i]['max'] -  $result[$i]['now_stu'];//计算可住人数
          }
	  $this->assign('f',$result);
	  $this->assign('fang',$fang);
          $this->assign('fa',$fa);
	  $this->display();
		}
    
    /**
     * 查找
     */
    public function query(){
        $this->display();
    }
	
/********************************************************************添加*******************************************************************************/

    public function add(){
		
		$f = new \Model\FangyuanModel();
        //两个逻辑：展示表单、收集表单
        if(!empty($_POST)){
            //收集表单
            if( $f -> create()){
            $z = $f -> add();
			//var_dump($z);exit;
				if($z){
					$this->success("添加成功！", __CONTROLLER__.'/fangyuan',3);
				}else {
					$this->error("添加失败！", __CONTROLLER__.'/fangyuan',3);
				}
			} else {
				
				$this -> error($f -> getError());
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
       $a = new \Model\FangyuanModel();
        //两个逻辑：展示、收集
        if(!empty($_POST)){
			//var_dump($_POST);exit;
			if($a -> create()) {
				$z = $a -> save($_POST);
				if($z){
					//$this ->redirect([分组/控制器/操作方法]地址, 参数, 延迟时间, 提示信息);
					$this ->redirect('Home/Fangyuan/fangyuan', array(), 3, '修改成功');
				}else {
					$this ->redirect('Home/Fangyuan/edit', array('id'=>$id), 3, '修改失败');
				}
			}else{
			
			$this ->error($a ->getError());
			}
		}else{
				//根据$goods_id获得被修改的商品信息，并给模板展示
				//find()方法只负责给返回一条记录结果，并且是[一维]数组返回
				$info = $a -> find($id);
				//var_dump($info);
				$this -> assign('info',$info);
				$this -> display();
			}
    }
    
    
      /* *
     * 删除
     */
    public function del($id){
	
            $a =D('fangyuan');
            if($id){
                $b= $a->where('id='.$id)-> delete();
                    if($b){
                        $this->success("删除成功！", __CONTROLLER__.'/fangyuan',3);
                            }else{
                                $this->error("删除失败！", __CONTROLLER__.'/fangyuan',3); 
                                    }
                                }
                            }
    
    /*==============================================================批量删除模块=====================================================================================*/
     public function delete() {
	  
		
		$a =D('fangyuan');
		
		$id = $_POST['id'];
		if($id) {
		
		if(is_array($id)){
					
			 $where = 'id in('.implode(',',$id).')';  
		  }else{  
		   $where = 'id='.$id; 
		  }  //dump($where); 
		  $list=$a->where($where)->delete();  
		  if($list!==false) {
			 $this->success("成功删除{$list}条！", U("Home/Fangyuan/fangyuan")); 
		  }else{   
			$this->error('删除失败！');  
		  } 
		}else{
			
			$this ->error('请先选着需要删除的数据选项！');
			}
	  }
 /*==============================================================Excel表导入模块=====================================================================================*/
	public function in(){/*导入控制器*/
		if($_POST){
			$exportObj = new \Tools\Excel();//实例化
			$exportData = array('school','building','floor','bnumber','sex','price','max','boss','telnumber');/*字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
			$dataBase = 'fangyuan';//数据库表名
			$action = 'Home/Fangyuan/fangyuan';//导入成功后跳转页面
			$where = null;                                         //如果某字段存在相同字段则不导入判断，不需要判断则这是为null
			$exportObj -> impUser($exportData,$dataBase,$action,$where);//调用导入方法,将参数写入
		}else{
			$this->display();
		}
	}

/*==============================================================Excel表导出模块=====================================================================================*/
		public function out(){/*导出表控制器*/
        $EP = new \Tools\Excel();
        $xlsxName  = "房源信息表";//excel生成表名
        $xlsxCell  = array(
        array('school','校区'),
        array('building','楼栋'),
        array('floor','楼层'),
        array('bnumber','寝室'),
		array('sex','性别'),
        array('price','价格'),
        array('max','床位数'),
		array('boss','寝室长'),
		array('telnumber','寝室长电话')
        );
        $xlsxModel = new \Model\FangyuanModel();
        $xlsxData  = $xlsxModel->Field('school,building,floor,bnumber,sex,price,max,boss,telnumber')->select();
        $EP->exportExcel($xlsxName,$xlsxCell,$xlsxData);

}
	  /*==============================================================Excel表导入模块=====================================================================================*/
   
    
/*     public function out(){//导出表控制器
		$exportObj = new \Tools\Excel();//实例化
		$exportData = array('id','school','building','floor','bnumber','sex','price','max','boss','telnumber');//字段名
		$exportName = array('序号','校区','楼栋','楼层','宿舍','性别','价格/元','床位数','寝室长','寝室长电话');//导出excel表头,注意表头与字段名相对应
		$dataBase = 'fangyuan';//操作的数据库表名
		$exportObj -> expUser($exportData,$exportName,$dataBase);//调用导出方法
		}
*/		
/*	public function in(){//导入控制器
            if($_POST){
                $exportObj = new \Tools\Excel();//实例化
		$exportData = array('school','building','floor','bnumber','sex','price','max','boss','telnumber');//字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入
		$dataBase = 'fangyuan';//数据库表名
		$action = 'Home/Fangyuan/fangyuan';//导入成功后跳转页面
		 if (!empty($_FILES)) {
					header("Content-type:text/html;charset=utf-8");
                            $upload = new \Think\Upload();// 实例化上传类
                            $filepath='./Public/excel/'; 
                            $upload->exts = array('xlsx','xls');// 设置附件上传类型
                            $upload->rootPath  =  $filepath; // 设置附件上传根目录
                            $upload->saveName  =     'time';
                            $upload->autoSub   =     false;
                            if (!$info=$upload->upload()) {
                                $this->error($upload->getError());
                            }
                            foreach ($info as $key => $value) {
                                unset($info);
                                $info[0]=$value;
                                $info[0]['savepath']=$filepath;
                            }
                            vendor("PHPExcel.PHPExcel");
                            $file_name=$info[0]['savepath'].$info[0]['savename'];


                                $extension = strtolower( pathinfo($file_name, PATHINFO_EXTENSION) );


                                if ($extension =='xlsx') { 
                                        $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
                                        $objPHPExcel = $objReader ->load($file_name,$encode='utf-8');
                                } else if ($extension =='xls') {
                                        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
                                        $objPHPExcel = $objReader ->load($file_name,$encode='utf-8');
                                } else if ($extension=='csv') {
                                $PHPReader = new PHPExcel_Reader_CSV();
                                //默认输入字符集
                                $PHPReader->setInputEncoding('GBK');
                                //默认的分隔符
                                $PHPReader->setDelimiter(',');
                                //载入文件
                                $objPHPExcel = $PHPReader->load($file_name,$encode='utf-8');
                                }
                                $sheet = $objPHPExcel ->getSheet(0);
                            $highestRow = $sheet->getHighestRow(); // 取得总行数
                            $highestColumn = $sheet->getHighestColumn(); // 取得总列数
                            $j=0; 
                            for($i=2;$i<=$highestRow;$i++)
                            {    
                                $data['school']= $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
                                $data['building']= $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
                                $data['floor']= $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
                                $data['bnumber']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
                                $data['sex']= $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
                                $data['price']= $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
                                $data['max']= $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
                                $data['boss']= $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();
                                $data['telnumber']= $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();             
                                
                                if(M($dataBase)->where('building='.$data['building'].' and bnumber='.$data['bnumber'])->find()){
                                    //如果存在相同联系人。判断条件：电话 两项一致，上面注释的代码是用姓名/电话判断
                                }else{
                                    M($dataBase)->add($data);
                                    $j++;
                                }
                            }
                            unlink($file_name);
                            //User_log('批量导入联系人，数量：'.$j);
                            $this->success('导入成功！本次导入联系人数量：'.$j,U($action));
                        }else
                        {
                            $this->error("请选择上传的文件");
                        }
		}else{
			$this->display();
		}
            
         }
*/         /*******************************按条件查询*************************************/
	public function search(){
		$f=new \Model\FangyuanModel();//定义视图模型
                
                $per=10;
                $page=new \Think\Page($count,$per);//实例化分页类
                $show = $page->show();          // 分页显示输出
                $this->assign('page',$show);       // 赋值分页输出
                $p = $_GET['p'];        //用GET方式获取页码
                if ($p == null) {        //对页码进行初始化
                      $p = '1';
                }
                $result=array();   
                if($_GET['building']){//如果有楼栋，则在结果中筛选出对应的信息
                            $result = $f -> where('building='.$_GET['building'])->select();
                            $count = count($result);           //查询数据总条数
                            $per=10;
                            $page=new \Think\Page($count,$per);//实例化分页类
                            $show = $page->show();          // 分页显示输出
                            $this->assign('page',$show);       // 赋值分页输出
                            $p = $_GET['p'];        //用GET方式获取页码
                            if ($p == null) {        //对页码进行初始化
                                $p = '1';
                            }
                            $result = $f -> where('building='.$_GET['building'])->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
                             if($_GET['bnumber']){//如果有宿舍，则在结果中筛选出对应的信息
                                $result = $f -> where('building='.$_GET['building'].'  and bnumber='.$_GET['bnumber'])->select();
                                $count = count($result);           //查询数据总条数
                                $per=10;
                                $page=new \Think\Page($count,$per);//实例化分页类
                                $show = $page->show();          // 分页显示输出
                                $this->assign('page',$show);       // 赋值分页输出
                                $p = $_GET['p'];        //用GET方式获取页码
                                if ($p == null) {        //对页码进行初始化
                                    $p = '1';
                                }
                                $result = $f -> where('building='.$_GET['building'].'  and bnumber='.$_GET['bnumber'])->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
                                }
                         }        
                $count = count($result);           //查询数据总条数  
		 
                $fang = $f->distinct(true)->field('building')->select();sort($fang);
                $fa=$f->distinct(true)->field('floor')->select();sort($fa);  
                $this->assign('fang',$fang);
                $this->assign('fa',$fa);
                $this->assign('f',$result);
                $this->display('fangyuan');
	}             
                
                
                
                
                /*********************************联动获取寝室**************************************/        
        public function getdormitory(){
		$cla=D('fangyuan');
                $building=$_GET['building'];
                $floor = $_GET['g'];
                //对数据库已选择的楼栋和楼层进行查询
		$result=$cla->where('building='.$building.' and floor='.$floor)->select();
		for($i=0;$i<count($result);$i++){//对班级进行处理，保存需要的寝室
			$arr[$result[$i]['bnumber']]=$result[$i]['bnumber'];
                    	
		}
		$arr=implode(',',$arr);
		echo $arr;exit;
	}        
    
}
    