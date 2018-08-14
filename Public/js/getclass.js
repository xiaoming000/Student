
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