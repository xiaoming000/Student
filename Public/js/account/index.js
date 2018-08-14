
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




/*==================================添加=============================================*/	
	$('#edit2').center(500, 400).resize(function () {
		if ($('#edit2') .css('display') == 'block') {
			screen.lock();
		}
	});
	$('.tianjia').click(function (e) {
		//document.write($('#form_edit').attr('action1'));
		$('#form_edit').attr('action','/Student/index.php/Home/Admin/add');
		//alert($('#form_edit').attr('action'));
		$('#edit2').center(500, 400).show();
		screen.lock().animate({
			attr : 'o',
			target : 30,
			t : 30,
			step : 10
		});
	});
	$('#edit2 .close').click(function () {
		$('#edit2').hide();
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
	$('#edit2 .sub').click(function () {
		document.getElementById("form_edit").submit();
		$('#edit2').hide();
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


    
    
	
	
/*==================================编辑=============================================*/	
	var edit_this;
	$('#edit2').center(500, 400).resize(function () {
		if (login.css('display') == 'block') {
			screen.lock();
		}
	});
	$('.edit1').click(function () {
		edit_this = this;
		info_edit(1);
		
		$('#form_edit').attr('action','/Student/index.php/Home/Admin/edit');
		$('#edit2').center(500, 400).show();
		screen.lock().animate({
			attr : 'o',
			target : 30,
			t : 30,
			step : 10
		});
	});
	$('#edit2 .close').click(function () {
		info_edit(0);
		$('#edit2').hide();
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
	$('#edit2 .sub').click(function () {
		document.getElementById("form_edit").submit();
		$('#edit2').hide();
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

 function info_edit (clear) {
		if(clear) {
			var str = $(edit_this).attr('edit_href');
			var arr = str.split('/');//alert(arr);
			info = new Array();
			info[0] = arr[7];	info[1] = arr[9];	info[2] = arr[11]; info[3] = arr[13]; info[4] = arr[15];//alert(info);
			$('#id').value(info[0]);
			$('#number').attr('readonly','readonly');
			$('#number').value(info[1]);
			$('#name').value(info[2]);
			$('#password').value(info[3]);
			$('#form_edit select').ge(0).selectedIndex = 0;
			$('#form_edit select').ge(0).options[0].value = info[4];
			$('#form_edit select').ge(0).options[0].text = info[4];
		}
		if(clear == 0){
			//alert("");
			$('#id').eq(0).value("");
			document.getElementById('number').removeAttribute('readonly');
			$('#number').value("");
			$('#name').value("");
			$('#password').value("");
			$('#form_edit select').ge(0).selectedIndex = 0;
			$('#form_edit select').ge(0).options[0].value = "";
			$('#form_edit select').ge(0).options[0].text = "";
		}
		//alert(info);
		//return info;
 }
 
 
 
 
 
 
 
 
 
 
});




