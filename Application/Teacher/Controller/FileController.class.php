<?php
namespace Teacher\Controller;
use Think\Controller;
class FileController extends Controller {
/********************************************文件列表*******************************/
	public function index(){
		$file=D('file');
		$total=$file->count();
		$per=10;
		/*//thinkphp框架自带的分页类
		$page=new \Think\Page($total,$per);
		$show=$page->show();
		$list=$file->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('result',$list);// 赋值数据集
		$this->assign('list',$show);// 赋值分页输出
		*/
		$page=new \Tools\Page($total,$per);//实例化Tools中的Page类实现分页效果
		$sql="select * from file order by id desc ".$page->limit;
		$result=$file->query($sql);
		$list=$page->fpage(array(2,3,4,5,6,7,8));//获得页码列表，array数组元素代表显示对应的页码内容
			//对查询到的数据进行处理，将文件大小标准化，并组装title字符串
			for($i=0;$i<=count($result)-1;$i++){
				if($result[$i]['size']>=1048576){
					$result[$i]['size']=round($result[$i]['size']/1048576,2).'MB';
				}else{
					$result[$i]['size']=round($result[$i]['size']/1024,2).'KB';
				}
				$result[$i]['title']="文件上传时间：".$result[$i]['time']."  文件大小：".$result[$i]['size'];
			}

		$this->assign('result',$result);
		$this->assign('list',$list);
		$this->display();
	}

/************************************************下载文件*********************************/
	public function download($id){
			$file=D('file');//从数据库调取文件信息
			$info=$file->find($id);
			$size=$info['size'];
			$name=$info['name'];
			$path=$info['address'];
			if(file_exists($path)){//判断文件是否存在
				header("content-type:application/octet-stream");
				header("content-disposition:attachment;filename={$name}");
				header("content-length:{$size}");
				readfile($path);
			}else $this->error('文件不存在！');	
	}
}