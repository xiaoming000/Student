<?php
namespace Model;
use Think\Model;

//为sw_goods数据表创建一个Model模型类
//父类Model: ThinkPHP/Library/Think/Model.class.php
class RecruitmentModel extends Model{
/**
	*	自动验证
	*/
	protected $_patchvalidate = true;
	protected $_validate = array(
	//1、公司名称不能为空
	array('company_name','require','公司名称不能为空'),
	//2、工作不能为空
	//array('job','require','工作不能为空'),
	//联系人不能为空
	array('contact_people','require','单位联系人不能为空'),
	//联系人电话不能为空
	array('tel','require','单位联系方式不能为空'),
	);
	

}
