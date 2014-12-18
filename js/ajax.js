//frm:要提交的from;fn:成功后调用的函数
function ajaxSubmit (frm,fn) {
	var dataPara=getFormJson(frm);
	$.ajax({
		url:frm.action,
		type:frm.method,
		data:dataPara,
		success:fn
	});
}

//获取from中的元素,转化为JSON格式,形如:{name:'aaa',password:'bbb'},同名将会放到一个数组内
function getFormJson (frm) {
	var o={};
	var o=$(frm).serializeArray();//序列化from对象
	$.each(function () {
	        if (o[this.name] !== undefined) {
	            if (!o[this.name].push) {
	                o[this.name] = [o[this.name]];
	            }
	            o[this.name].push(this.value || '');
	        } else {
	            o[this.name] = this.value || '';
	        }
	    });
	return o;
}

function getList(action){
	$.ajax({
		url:'source/list.php?action='+action,
		type:'POST',
		success:function(data){
			// alert(data);
			$('#entry_list').html(data);
		}
	});
}


$(document).ready(function(){
	$(document).on('submit','#login_form',function(){
		var user = $("#usrname").val(); 
		var pass = $("#pasword").val(); 
		if (user==""||pass=="") {
			alert('请输入用户名和密码!');
		}else{
			ajaxSubmit(this,function(data){
				if (data!="error"){
					var div_log=
					"<div id='logout'>"+
						"<form action='source/login.php' method='post' id='logout_form'>"+
							"<label>用户名：</label><p>"+data+"</p>"+
							"<input type='submit' value='注销'>"+
						"</form>"+
						"<form action='source/add_entry.php' method='post' id='add_form'>"+
							"<input type='text' name='ename' id='ename'>"+
							"<textarea name='econtent' id='econtent' cols='30' rows='10'></textarea>"+
							"<input type='timepicker' name='ebdate' id='ebdate'>"+
							"<input type='submit' value='保存'>"+
						"</form>"+
					"</div>";
					$('#login').remove();
					$('#logio').append(div_log);
				}else{
					alert('用户名或密码错误!');
				}
			});
			
		}
		getList('all');
		return false;
	});

	$(document).on('submit','#logout_form',function(){
		ajaxSubmit(this,function(data){
			var div_log=
			"<div id='login'>"+
				"<form action='source/login.php' method='post' id='login_form'>"+
					"<input type='text' name='usrname' id='usrname'>"+
					"<input type='password' name='pasword' id='pasword'>"+
					"<input type='submit' value='登陆'>"+
				"</form>"+
			"</div>";
			$('#logout').remove();
			$('#logio').append(div_log);
		});
		getList('all');
		return false;
	});

	$(document).on('submit','#add_form',function(){
	// $('#add_form').on('submit',function(){
		ajaxSubmit(this,function(data){
			getList('all');
		});
		return false;
	});

	$(document).on('click','#entry',function(e){
		e.preventDefault();
		// alert(data.id);
		// alert(this.href);
		// $('#entry_item').dialog({autoOpen: false}).dialog('open');
		// $('#entry_item').modal();
		// $('#entry_item')
		// $('#showdetailbtn').click();
		$.ajax({
		url:this.href,
		type:'POST',
		success:function(data){
			alert(data);
			// $('#entry_list').html(data);
			
		}
	});
	});

	getList('all');
});

