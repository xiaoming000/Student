<?php
namespace Model;
use Think\Model;
use Think\Model\RelationModel;
class GraduateModel extends RelationModel{
	protected $_link = array(
			'class' => array(    
								 'mapping_type'  => self::BELONGS_TO,		/*关联类型*/
								 'mapping_name'  => 'class', 				/*关联的映射名称，用于获取数据用该名称不要和当前模型的字段有重复，否则会导致关联数据获取的冲突*/
								 'class_name'    => 'class',    			/*关联表的模型类名*/
								 'foreign_key'   => 'class', 				/*外键*/
								 'mapping_fields'=>'professional,name,qqq', /*需要出现的关联表中的字段*/
								 'as_fields'   	 =>'professional,name,qqq',	
								 											/*直接把关联的字段映射成到另外一张表中显示出来的字段名*/	   ),
);
   

	
	protected $_patchvalidate = true;
	
	protected $_validate = array(

	array('s_name','require','学生姓名不能为空'),

	array('s_number','require','学号不能为空'),
	
	array('sex','男,女','性别只为男或女',3,'in'),

	array('class','/^[A-B][0-9]{4}$/','班级名称格式不正确',3,'regex'),
	//array('professional','require','公司不能为空'),
	array('qq','/[1-9][0-9]{4,}/','QQ格式不正确',3,'regex'),

	//array('work_unit','require','就业单位不能为空'),

	//array('work_post','require','职位不能为空'),
	
	//array('work_type','require','工作类型不能为空'),
	array('phone','11','注意电话号码为11位',3,'length'),
	//array('name','require','电话不能为空'),
	//array('qqq','require','联系人不能为空'),
	//array('time','require','请输入更新时间'),
	);

	



}
