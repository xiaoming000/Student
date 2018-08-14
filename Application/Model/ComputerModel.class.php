<?php

namespace Model;
use Think\Model;

//为sw_goods数据表创建一个Model模型类
//父类Model: ThinkPHP/Library/Think/Model.class.php
class computerModel extends Model{

    /*
     *	自动验证
     */
    /*	protected $_patchvalidate = true;

        protected $_validate =array(

            //1、教职工号必须为11为数的纯数字
            array('s_number','require','教职工号名不能为空'),

            );	*/

    protected $_patchvalidate = true;

    protected $_validate = array(

        //1、学号不能为空且必须为纯数字
        array('s_number','require','学号不能为空'),
        array('s_number','number','学号必须为纯数字！'),
        //2、学年不能为空
        array('school_year','require','学年不能为空'),
        //3、学期不能为空必须为纯数字且只能为1和2
        array('semester','require','学期不能为空'),
        array('semester','1,2','学期只能为1和2','','between',''),
        //准考证必须为纯数字
        array('s_number','number','学号必须为纯数字！','2','',''),
    );


}
