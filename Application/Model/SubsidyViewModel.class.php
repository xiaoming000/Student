<?php
	namespace Model;
	use Think\Model;
	use Think\Model\ViewModel;
	class SubsidyViewModel extends ViewModel{   
		 public $viewFields = array(    
			 'Subsidy'=>array('id','stuid','type','money','time'),    
			 'student'=>array('name','sex','class', '_on'=>'Subsidy.stuid=student.number'), 'class'=>array('professional', '_on'=>'student.class=class.class'), 
		);

		 //添加验证
		 protected $patchValidate = true;
		  protected $_validate = array(     
			  array('stuid','require','学号不能为空！'), //默认情况下用正则进行验证 
			  array('grade','require','认定等次不能为空！'),
			  array('state','require','类型不能为空！'),
			  array('in_time','require','入库时间不能为空！')
				  
			  );
		
	}
	