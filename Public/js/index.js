
//批量删除
function test()
{
	if(window.confirm("你确定要删除嘛？")){
    document.getElementById("form1").submit();}
}

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
	




window.onload = function () {
	
	var screen = $('#screen');
	
}




		


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




 
 
 
 
 
 
 
 
 
 
});




