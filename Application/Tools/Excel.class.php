<?php

//Tools名称与上级目录名称一致，该类文件在做自动加载的时候，Tools名称会转换为目录
//的一部分，进而include引入当前类文件
namespace Tools;
use Think\Controller;
class Excel extends Controller{
	
	public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $expTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");
            
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
	
//**================================================================================实现导入excel=========================================**/
   function impUser($exportData,$dataBase,$action,$where){
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

        $j=0;$n = 0;
        for($i=2;$i<=$highestRow;$i++)
            {
                $data[$exportData[0]]= $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();
				$data[$exportData[1]]= $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();
				$data[$exportData[2]]= $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();
				$data[$exportData[3]]= $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
				$data[$exportData[4]]= $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();
				$data[$exportData[5]]= $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();
				$data[$exportData[6]]= $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();
				$data[$exportData[7]]= $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();
				$data[$exportData[8]]= $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();
				$data[$exportData[9]]= $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
				$data[$exportData[10]]= $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();
				$data[$exportData[11]]= $objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();
				$data[$exportData[12]]= $objPHPExcel->getActiveSheet()->getCell("M".$i)->getValue();
				$data[$exportData[13]]= $objPHPExcel->getActiveSheet()->getCell("N".$i)->getValue();
				$data[$exportData[14]]= $objPHPExcel->getActiveSheet()->getCell("O".$i)->getValue();
				$data[$exportData[15]]= $objPHPExcel->getActiveSheet()->getCell("P".$i)->getValue();
				$data[$exportData[16]]= $objPHPExcel->getActiveSheet()->getCell("Q".$i)->getValue();
				$data[$exportData[17]]= $objPHPExcel->getActiveSheet()->getCell("R".$i)->getValue();
				$data[$exportData[18]]= $objPHPExcel->getActiveSheet()->getCell("S".$i)->getValue();
				$data[$exportData[19]]= $objPHPExcel->getActiveSheet()->getCell("T".$i)->getValue();
				
        if($where){			
            $w[$where] = (string)$data[$where];   
			
            if(M($dataBase)->where($w)->find()){
				$n++;
            }else{    
				M($dataBase)->add($data);
                $j++;
			}
		
		 }else{
		   	M($dataBase)->add($data);
                    $j++;}
        }
        unlink($file_name);
        $this->success('导入成功！本次导入数量：'.$j.'  ！失败条数：'.$n,U($action));
        }else{
            $this->error("请选择上传的文件");
        }
    }
	
	
	
	
	
	
	
	
	
	
	
}