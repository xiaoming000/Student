<?php
namespace Home\Controller;

use Think\Controller;

class SusheController extends Controller {
	
	/**
		*宿舍信息界面
		**/
    public function dormitory(){
           $d=new \Model\DormitoryViewModel();//定义视图模型
           $f = D('fangyuan');
            $fang = $f->distinct(true)->field('building')->select();sort($fang);
          $fa=$f->distinct(true)->field('floor')->select();sort($fa);
          $count=$d->count();
	  $per=5;
	  $page=new \Think\Page($count,$per);//实例化分页类
          $show = $page->show();          // 分页显示输出
          $this->assign('page',$show);       // 赋值分页输出
            $p = $_GET['p'];        //用GET方式获取页码
            if ($p == null) {        //对页码进行初始化
                $p = '1';
            }
	  $result=$d->field('id,xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
          
	  $this->assign('d',$result);
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
	
    /**
     * 添加
     */
    public function add(){
        $d = new \Model\DormitoryModel();
        $f = new \Model\FangyuanModel(); 
        $fang = $f->distinct(true)->field('building')->select();sort($fang);
        $fa=$f->distinct(true)->field('floor')->select();sort($fa);
        $this->assign('fang',$fang);
        $this->assign('fa',$fa);
        if($_POST){//有post信息传入则添加到数据库
            if($_POST['building']&&$_POST['floor']&&$_POST['bnumber']){ 
			if($d->create()){
				$arr=array(
                                        'school'=>$_POST['school'],
					'xueyuan'  => $_POST['xueyuan'],
					'major' => $_POST['major'],
					'class'  => $_POST['class'],
                                        'number' => $_POST['number'],
					'name'  => $_POST['name'],
					'sex' => $_POST['sex'],
					'building'  => $_POST['building'],
                                        'floor' => $_POST['floor'],
					'bnumber'  => $_POST['bnumber'],
					'bed' => $_POST['bed']
				);
                                $data=array(
                                    'xueyuan' => $arr['xueyuan'],
                                    'major' => $arr['major'],
                                    'class' => $arr['class'],
                                    'number' => $arr['number'],
                                    'name' => $arr['name'],
                                    'sex' => $arr['sex'],
                                    'bed' => $arr['bed']
                                        );
                        $do=$f->where('building='.$arr['building'].' and bnumber='.$arr['bnumber'])->select();
                        $dormitory_id = $do[0]['id'];//寝室id 
                        $con = $do[0]['max'];      //寝室的床位数
                        $bed=$d->where('id='.$dormitory_id)->count();  //查询该寝室已经住了几人
                       
                        if($bed<=$con){//该寝室还有是否有空床位
                            $data['dormitoryid']=$dormitory_id;
                         
                            $result=$d->add($data);
                           
                            if($result){
                            $this->success('添加成功！',u("Home/sushe/dormitory"));
                            }else{
                                $this -> error('添加失败！');
					}
                        }else{  
                            $this -> error('寝室已满！');
                            $this->assign('info',$d->getError());
                            $this->display();
                        }
        } else{//无post信息传入
			$this->display();
        }
    }else{      
                       $this -> error('请填写完整信息！');
			$this->display();
        }
        }else{//无post信息传入
			$this->display();
        }
 }
    
    /**
     * 修改
     */
    public function edit($number){
        
	$d = new \Model\DormitoryModel();
        $f = new \Model\FangyuanModel();
        
         $fang = $f->distinct(true)->field('building')->select();sort($fang);
          $fa=$f->distinct(true)->field('floor')->select();sort($fa);
        $this->assign('fang',$fang);
        $this->assign('fa',$fa);
      
        if($_POST){
            $data['d']  = $d->create();
            $data['f']  = $f->create();			
            if($data){
                $school = $data['f']['school'];
                $data['a']['xueyuan']=$xueyuan = $data['d']['xueyuan'];
                $data['a']['major']=$major = $data['d']['major'];
		$data['a']['class']=$class = $data['d']['class'];
		$data['a']['number']=$number = $data['d']['number'];
		$data['a']['name']=$name = $data['d']['name'];
		$data['a']['sex']=$sex = $data['d']['sex'];
                $building = $data['f']['building'];
                $floor = $data['f']['floor'];
		$bnumber = $data['f']['bnumber'];
                $data['a']['bed']=$birthday = $data['d']['bed'];
   
                    $do=$f->where('building='.$building.' and bnumber='.$bnumber)->select();
                    $dormitory_id = $do[0]['id'];//寝室id
                    $con = $do[0]['max'];      //寝室的床位数
                    
                    $bed=$d->where('id='.$dormitory_id)->count();  //查询该寝室已经住了几人
                  
                   
                    if($bed<=$con){//该寝室还有是否有空床位
                        $data['a']['dormitoryid']=$dormitory_id;
                        
                        $result=$d->where('number='.$data['a']['number'])->save($data['a']);
                     
                    if($result !== false){
			$this -> success('修改成功！',u("Home/sushe/dormitory"));
                    }else{
                            $this -> error('修改失败！');
					}
                    
                    }else{
                            $this -> error('该寝室已满！');
					}
            
        }else{
            $this -> error($d -> getError());
	}
        }else{
			$dormitory =new \Model\DormitoryViewModel();
			$info = $dormitory->where('number='.$number) ->find();
			$this -> assign('info',$info);
			$this -> display();
		}
    }    
       
    /* *
     * 删除
     */
    public function del($id){
	$a =D('dormitory');
        if($id){
            $b= $a->where('id='.$id)-> delete();
            if($b){
                $this->success("删除成功！", __CONTROLLER__.'/dormitory',3);
                }else{
                    $this->error("删除失败！", __CONTROLLER__.'/dormitory',3); 
                }
        }
    }    
    
/*==============================================================批量删除模块=====================================================================================*/
     public function delete() {
	  
		
		$a =D('dormitory');
		
		$id = $_POST['id'];
		if($id) {
		
		if(is_array($id)){
					
			 $where = 'id in('.implode(',',$id).')';  
		  }else{  
		   $where = 'id='.$id; 
		  }  //dump($where); 
		  $list=$a->where($where)->delete();  
		  if($list!==false) {
			 $this->success("成功删除{$list}条！", U("Home/Sushe/dormitory")); 
		  }else{   
			$this->error('删除失败！');  
		  } 
		}else{
			
			$this ->error('请先选着需要删除的数据选项！');
			}
				  
	  }
	/*******************************导入***********************************/
	public function in(){/*导入控制器*/
		if($_POST){
			$exportObj = new \Tools\Excel();//实例化
			$exportData = array('xueyuan','class','major','number','name','sex','bed','dormitoryid');/*字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入*/
			$dataBase = 'dormitory';//数据库表名
			$action = 'Home/sushe/dormitory';//导入成功后跳转页面
			$where = "number";                                         //如果某字段存在相同字段则不导入判断，不需要判断则这是为null
			$exportObj -> impUser($exportData,$dataBase,$action,$where);//调用导入方法,将参数写入
		}else{
			$this->display();
		}
	}

/*******************************导入***********************************/
/*	public function in(){//导入控制器
		if($_POST){
                        
			$exportObj = new \Tools\Excel();//实例化
			$exportData = array( 'xueyuan,class,major,number,name,sex,bed,dormitoryid');//字段名,注意导入的表的列与字段相对应，第二行和第二列开始，第一行表头名，第1列为序号不导入
//			
                        $dataBase = 'dormitory';//数据库表名
			$action = 'Home/sushe/dormitory';//导入成功后跳转页面
			
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
                            //$objReader = \PHPExcel_IOFactory::createReader('Excel5');
                            //$objPHPExcel = $objReader->load($file_name,$encode='utf-8');
                           // $sheet = $objPHPExcel->getSheet(0);
                            $highestRow = $sheet->getHighestRow(); // 取得总行数
                            $highestColumn = $sheet->getHighestColumn(); // 取得总列数


                            $j=0;
                            for($i=2;$i<=$highestRow;$i++)
                            {       
                                $d['building']= $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();//接收楼栋
				$d['bnumber']= $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();//接收宿舍
				$d['name']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();//接收宿舍
                                $d['number']= $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();//接收宿舍
                                $f = D('fangyuan');
                                $dormitory = $f -> where('building='.$d['building'].' and bnumber='.$d['bnumber'])->select();        
                                if($dormitory){
                                    $dormitoryid=$dormitory[0]['id'];  //查找出该寝室的ID          
                                    $data['xueyuan']= $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
                                    $data['major']= $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
                                    $data['class']= $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
                                    $data['number']= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
                                    $data['name']= $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
                                    $data['sex']= $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
                                    $data['dormitoryid']= $dormitoryid;//将该寝室的ID赋值给数组
                                    $data['bed']= $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();
                                                
                                    if(M($dataBase)->where("number='".$data['number']."'")->find()){
                                    //如果存在相同联系人。判断条件：电话 两项一致，上面注释的代码是用姓名/电话判断
                                    }else{
                                    M($dataBase)->add($data);
                                    $j++;
                                    }
                                }else{
                                    echo $d['name'].'  '.$d['number'].'导入失败！   '.'因为房源内不存在：'.$d['building'].'栋'.$d['bnumber'].'寝室';
                                    echo '</br>';
                                }    
                            }
                            unlink($file_name);
                            //User_log('批量导入联系人，数量：'.$j);
                            $this->success('导入成功！本次导入联系人数量：'.$j,U($action),10);
                        }else
                        {
                            $this->error("请选择上传的文件");
                        }
		}else{
			$this->display();
		}
	}
*/	/*******************************导出***********************************/
	public function out(){/*导出表控制器*/
		if($_GET){
			if($_GET['number']){
				$where['number'] = $_GET['number'];
		}else{
			if($_GET['bnumber'] && $_GET['bnumber'] != '0')	{
					$where['bnumber'] = $_GET['bnumber'];	
				}elseif($_GET['floor'] && $_GET['floor'] != '0'){
					$where['floor'] = $_GET['floor'];	
				}elseif($_GET['building'] ){
					$where['building'] = $_GET['building'];
				}
			
			if($_GET['class']){
				$where['class'] = $_GET['class'];
				}elseif($_GET['grade']){
					if(date('m')>=9){//如大三来说17年九月以前是14届的，九月以后是15届的
						$data_class=date('y')-$_GET['g']+1;
					}else{
						$data_class=date('y')-$_GET['g'];
					}
					$data = substr($data_class,-2,2) - $_GET['grade'];
					$where['class'] = array('LIKE',"%$data%");
				}
				
		}	
		
		
	}
            $EP = new \Tools\Excel();
            $xlsxName  = "寝室信息表";//excel生成表名
            $xlsxCell  = array(
                array('xueyuan','学院'),
                array('major','专业'),
                array('class','班级'),
                array('number','学号'),
                array('name','姓名'),
                array('sex','性别'),
                array('school','校区'),
                array('building','楼栋'),
                array('floor','楼层'),
                array('bnumber','宿舍'),
                array('bed','床位')
            );
            $xlsxModel = new \Model\DormitoryViewModel();
            $xlsxData  = $xlsxModel->where($where)->field( 'xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->select();
            $EP->exportExcel($xlsxName,$xlsxCell,$xlsxData);
	}
	/*******************************按条件查询*************************************/
	public function search(){
		$s=new \Model\DormitoryViewModel();//定义视图模型
        $f = D('fangyuan');
		if($_GET['number']){//有学号则按学号查询
                    $sql="dormitory.number='{$_GET['number']}'";
                    $result=$s->field( 'id,xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->where($sql)->select();
					$this->assign('d',$result);
         }elseif($_GET['class']){//如果有班级，则在结果中筛选出对应班级的信息
                                    
                    $result=$s->field( 'id,xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->where("dormitory.class='{$_GET['class']}'")->select();                
                    $count = count($result);           //查询数据总条数
                    $per=10;
                    $page=new \Think\Page($count,$per);//实例化分页类
                    $show = $page->show();          // 分页显示输出
                    $this->assign('page',$show);       // 赋值分页输出
                    $p = $_GET['p'];        //用GET方式获取页码
                    if ($p == null) {        //对页码进行初始化
                        $p = '1';
                    }
                    $result=$s->field( 'id,xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->where("dormitory.class='{$_GET['class']}'")->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
                    
                    $this->assign('d',$result); 
         }elseif(empty($_GET['class']) && !empty($_GET['grade'])){
			if(date('m')>=9){//如大三来说17年九月以前是14届的，九月以后是15届的
				$data_class=date('y')-$_GET['g']+1;
			}else{
				$data_class=date('y')-$_GET['g'];
			}
		    $data = substr($data_class,-2,2) - $_GET['grade'];
			$where['class'] = array('LIKE',"%$data%");
			
			$count= $s->where($where)->count();// 查询满足要求的总记录数
			$Page= new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(15)
			$show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$result=$s->field( 'id,xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('d',$result);
			$this->assign('page',$show);
		 }elseif($_GET['building']){//如果楼栋，则在结果中筛选出对应寝室的信息
                    $buil = $f -> where('building='.$_GET['building'])->select();
                    $dormitoryid=array();
                    for($i=0;$i<count($buil);$i++){
                        $dormitoryid[$i]=$buil[$i]['id'];
                    }
                    $map['dormitoryid']  = array('in',$dormitoryid);
                    $result=$s->field( 'id,xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->where($map)->select(); 

                    $count = count($result);           //查询数据总条数
                    $per=10;
                    $page=new \Think\Page($count,$per);//实例化分页类
                    $show = $page->show();          // 分页显示输出
                    $this->assign('page',$show);       // 赋值分页输出
                    $p = $_GET['p'];        //用GET方式获取页码
                    if ($p == null) {        //对页码进行初始化
                        $p = '1';
                    }

                    if($_GET['bnumber']){//如果有寝室，则在结果中筛选出对应寝室的信息
                        $dormitoryid=array();
                        $map=array();
                        $bul = $f -> where('building='.$_GET['building'].'  and bnumber='.$_GET['bnumber'])->select();//查找出寝室的id
                        for($i=0;$i<count($bul);$i++){//将寝室的id赋值给一维数组
                            $dormitoryid[$i]=$bul[$i]['id'];
                        }
                        $map['dormitoryid']  = array('in',$dormitoryid);
                        $result=$s->field( 'id,xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->where($map)->select();    
                        $count = count($result);           //查询数据总条数
                        $per=10;
                        $page=new \Think\Page($count,$per);//实例化分页类
                        $show = $page->show();          // 分页显示输出
                        $this->assign('page',$show);       // 赋值分页输出
                        $p = $_GET['p'];        //用GET方式获取页码
                        if ($p == null) {        //对页码进行初始化
                            $p = '1';
                        }
                        $fang = $f ->distinct(true)->field('building')->order("building ")->select();sort($fang);//寝室下拉框
                        $fa=$f->distinct(true)->field('floor')->order("floor ")->select();sort($fa);//寝室下拉框
                    }
                    $result=$s->field( 'id,xueyuan,major,class,number,name,sex,school,building,floor,bnumber,bed')->where($map)->page($p.','.$per)->limit($p*3,($p+1)*$per)->select();
                    $this->assign('d',$result);
                    $fang = $f ->distinct(true)->field('building')->order("building ")->select();sort($fang);
                    $fa=$f->distinct(true)->field('floor')->order("floor ")->select();sort($fa);
                }
					//var_dump(empty($_GET['class']) && !empty($_GET['grade']));
					//var_dump($s->where($where)->select());
                  $this->assign('fang',$fang);
                  $this->assign('fa',$fa);
				  $this->display('dormitory');
	}      
	/*********************************联动获取班级**************************************/
	public function getclass(){
		$cla=D('dormitory');
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