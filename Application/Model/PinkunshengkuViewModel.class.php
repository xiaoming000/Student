<?php
	namespace Model;
	use Think\Model;
	use Think\Model\ViewModel;
	class PinkunshengkuViewModel extends ViewModel{   
		 public $viewFields = array(    
			 'Subsidylibrary'=>array('id','stuid','state','in_time','out_time','grade'),
			 'student'=>array('name','sex','id_number','class','_on'=>'Subsidylibrary.stuid=student.number'), 
			 'class'=>array('professional', '_on'=>'student.class=class.class'), 
		);
		
	}
	