<?php
	namespace Model;
	use Think\Model;
	
	class SubsidyModel extends Model{   
		 //添加验证
		 protected $patchValidate = true;
		  protected $_validate = array(     
			  array('stuid','require','学号不能为空！'), //默认情况下用正则进行验证 
			  array('type','require','资助类型不能为空！'),
			  array('money','require','资助金额不能为空！'),
			  array('time','require','资助时间不能为空！')
				  
			  );
		
	}
	