
//批量删除
/*function test()
{
	if(window.confirm("你确定要删除嘛？")){
    document.getElementById("form1").submit();}
}
*/
function select1()
{
    document.getElementById("form_1").submit();
}

 
var isCheckAll = false;
	function swapCheck () {
		  if (isCheckAll) { 
			//alert(document.getElementById('form1').elements.length);
			for(var i=0;i<$('.id').length();i++) {
				$('.id').ge(i).checked = false;
				}
			
			isCheckAll = false;  
		} else {  
			for(var i=0;i<$('.id').length();i++) {
				$('.id').ge(i).checked = true;
				}
			
			isCheckAll = true;  
		}  
		
}	
	




/*==================================导出选择联动=============================================*/	
function getclass(url,grade,cla){//三个参数分别为跳转地址、年级下拉框的id、班级下拉框的id
	var Grade=document.getElementById(grade);
	var Class=document.getElementById(cla);
	Class.options.length=0;
	var mes=Grade.value;
	Class.add(new Option(""));//添加了一个空格用于查询一届所有班级的信息
	//调用ajax
	ajax(url+'/g/'+mes,function(str){
		var a=str.split(",");
		for(var i in a){
			Class.add(new Option(a[i]));
		}
	},function(me){alert(me);});
	
};


function ajax(url,fnSucc,fnFaild){
			//1、创建Ajax对象
			if(window.XMLHttpRequest){
				//其它浏览器，加window防止在IE6下这东西没定义而报错
				var oAjax=new XMLHttpRequest();
			}else{
				//IE6
				var oAjax=new ActiveXObject("Microsoft.XMLHTTP");	
			}
			//2、连接服务器
			//open(方法，文件名，异步传输)
			oAjax.open("GET",url,true);
			//3、发送请求
			oAjax.send();
			//4、接收返回
			oAjax.onreadystatechange=function(){
				//oAjax.readyState  //浏览器和服务器进行到哪一步了
				if(oAjax.readyState==4){	//读取完成
					if(oAjax.status==200){	//成功
						fnSucc(oAjax.responseText);
					}else{					//失败
						if(fnFaild){
							fnFaild(oAjax.status);	
						}
					}
					
				}
			};
		}; 




		


$(function() {
	
	

/*==================================删除=============================================*/	
	var _this ;
	$('#delete2').center(350, 250).resize(function () {
		if ($('#delete2').css('display') == 'block') {
			screen.lock();
		}
	});
	$('.del1').click(function () {
		//alert(this);
		_this = this;
		$('#delete2').center(350, 250).show();
		screen.lock().animate({
			attr : 'o',
			target : 30,
			t : 30,
			step : 10
		});
	});
	$('#delete2 .close').click(function () {
		$('#delete2').hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();
			}
		});
	});

	$('#delete2 .reset').click(function () {
		$('#delete2').hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();
			}
		});
	});

	$('#delete2 .sub').click(function () {
		
		//alert($('.del1 span a').attr('del_href'));
		var del_href = $(_this).attr('del_href');
		//alert(del_href);
		window.location.href=del_href;
		$('#delete2').hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();
			}
		});
	});

	//拖拽
	$('#delete2').drag($('#delete2 h2').last());
	
/*==================================全部删除=============================================*/	
	//遮罩画布
	var screen = $('#screen');
	//是否确定删除框
	var login = $('#login');
	login.center(350, 250).resize(function () {
		if (login.css('display') == 'block') {
			screen.lock();
		}
	});
	$('.login').click(function () {
		login.center(350, 250).show();
		screen.lock().animate({
			attr : 'o',
			target : 30,
			t : 30,
			step : 10
		});
	});
	$('#login .close').click(function () {
		login.hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();
			}
		});
	});

	$('#login .reset').click(function () {
		login.hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();
			}
		});
	});

	$('#login .sub').click(function () {
		document.getElementById("form1").submit();
		login.hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();
			}
		});
	});

/*==================================导出弹窗=============================================*/	
	//遮罩画布
	var screen = $('#screen');
	$('#out').center(400, 300).resize(function () {
		if (login.css('display') == 'block') {
			screen.lock();
		}
	});
	$('.out').click(function () {
		$('#out').center(400, 300).show();
		screen.lock().animate({
			attr : 'o',
			target : 30,
			t : 30,
			step : 10
		});
	});
	$('#out .close').click(function () {
		$('#out').hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();
			}
		});
	});

	$('#out .reset').click(function () {
		$('#out').hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();
			}
		});
	});

	$('#out .sub').click(function () {
		document.getElementById("form_out").submit();
		
		$('#out').hide();
		//先执行渐变动画，动画完毕后再执行关闭unlock
		screen.animate({
			attr : 'o',
			target : 0,
			t : 30,
			step : 10,
			fn : function () {
				screen.unlock();document.getElementById("form_out").reset();
			}
		});
	});

 
 
 
 
 
 
 
 
});




