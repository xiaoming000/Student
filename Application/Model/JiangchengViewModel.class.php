<?php

namespace Model;

use Think\Model\ViewModel;

class JiangchengViewModel extends ViewModel
{
    protected $viewFields = array(
        'jiangcheng' => array('id', 'number', 'school_year', 'semester', 'scholar', 'competition', 'award_level', 'honorary', 'punish', 'remark', '_type' => 'LEFT'),
        'student' => array('name', 'class', '_on' => 'student.number=jiangcheng.number', '_type' => 'LEFT'),
        'english' => array('level_name', 'score' => 'e_score', '_on' => 'student.number=english.number', '_type' => 'LEFT'),
        'computer' => array('score', '_on' => 'student.number=computer.number', '_type' => 'LEFT')
    );

}

?>