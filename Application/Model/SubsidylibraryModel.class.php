<?php
	namespace Model;
	use Think\Model;
	
	class SubsidylibraryModel extends Model{   
		 //添加验证
		 protected $patchValidate = true;
		  protected $_validate = array(     
			  array('stuid','require','学号不能为空！'), //默认情况下用正则进行验证 
			  array('grade','require','认定等次不能为空！'),
			  array('state','require','类型不能为空！'),
			  array('in_time','require','入库时间不能为空！')
				  
			  );
		
	}
	