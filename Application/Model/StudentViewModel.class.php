<?php
namespace Model;
use Think\Model\ViewModel;

class StudentViewModel extends ViewModel {
	
	//关联模型
	protected $viewFields = array(
	'student' => array('id','name','class','number','sex','id_number','school_roll','political_status','nationality','education_level','birthday', '_type'=>'LEFT'),
	'jiangcheng' => array('school_year','scholar','competition','award_level','honorary','punish',   '_on'=>'student.number=jiangcheng.number','_type'=>'LEFT'),
	'class'   => array('professional','name'=>'t_name','_on'=>'student.class=class.class','_type'=>'LEFT'),
	'english' => array('level_name','score'=>'e_score','_on'=>'student.number=english.number', '_type'=>'LEFT'),
	'computer'=> array('score', '_on'=>'student.number=computer.number', '_type'=>'LEFT'),
	'parent'  => array('mother_name','father_name','father_unit','mother_unit','home_tel','home_address', '_on'=>'student.number=parent.number')
	);
	
	
	}