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

//显示条目
function getList(action){
	var len=arguments.length;
	if (1==len) {
		$.ajax({
		url:'source/list.php?action='+action,
		type:'POST',
		success:function(data){
			// alert(data);
			$('#entry_list').html(data);
		}
		});

	}else{
		// alert('overload');
		var obj=arguments[1];
		$.ajax({
		url:'source/list.php?action='+action,
		type:'POST',
		success:function(data){
			// alert(data);
			// alert(obj);
			obj.html(data);
		}
		});
	};
	
}


$(document).ready(function(){
	//绑定登陆按钮
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
					"    <form action='source/login.php' method='post' id='logout_form' class='form-inline'>"+
					"        <div class='form-group'>"+
					"            <label class='control-label'>用户名：</label>"+
					"            <p class='form-control-static'> "+data+" </p>"+
					"        </div>"+
					"        <div class='form-group'>"+
					"            <input type='submit' class='btn btn-primary btn-sm' value='注销'>"+
					"        </div>"+
					"    </form>"+
					"</div>";

					var div_add=
					"<div class='col-md-4' id='add_f'>"+
					"        <form action='source/add_entry.php' method='post' id='add_form' class='form-horizontal'>"+
					"            <div class='form-group'>"+
					"                <label for='ename' class='col-sm-2 control-label'>标题：</label>"+
					"                <div class='col-sm-10'>"+
					"                    <input type='text' name='ename' id='ename' class='form-control'>"+
					"                </div>"+
					"            </div>"+
					"            <div class='form-group'>"+
					"                <label for='ebdate' class='col-sm-2 control-label'>日期：</label>"+
					"                <div class='col-sm-10'>"+
					"                    <input type='date' name='ebdate' id='ebdate' class='form-control'>"+
					"                </div>"+
					"            </div>"+
					"            <div class='form-group'>"+
					"                <label for='econtent' class='col-sm-2 control-label'>内容：</label>"+
					"                <div class='col-sm-10'>"+
					"                    <textarea name='econtent' id='econtent' rows='3' class='form-control'></textarea>"+
					"                </div>"+
					"            </div>"+
					"            <div class='form-group'>"+
					"                <div class='col-sm-offset-10 col-sm-2'>"+
					"                    <input type='submit' class='btn btn-primary btn-sm' value='保存'>"+
					"                </div>"+
					"            </div>"+
					"        </form>"+
					"</div>";
						
					$('#login').remove();
					$('#logio').append(div_log);
					$('#add_f').remove();
					$('#add_div').append(div_add);
					// alert(data);
					getList('all');

				}else{
					alert('用户名或密码错误!');
				}
			});
			
		}
		// getList('all');
		return false;
	});

	//绑定注销按钮
	$(document).on('submit','#logout_form',function(){
		ajaxSubmit(this,function(data){
			var div_log=
			"<div id='login'>"+
			"    <form action='source/login.php' method='post' id='login_form' class='form-inline'>"+
			"        <div class='form-group'>"+
			"            <label for='usrname' class='sr-only'>用户名</label>"+
			"            <input type='text' name='usrname' id='usrname' class='form-control input-sm' placeholder='用户名'>"+
			"        </div>"+
			"        <div class='form-group'>"+
			"            <label for='pasword' class='sr-only'>密码</label>"+
			"            <input type='password' name='pasword' id='pasword' class='form-control input-sm' placeholder='密码'>"+
			"        </div>"+
			"        <div class='form-group'>"+
			"            <input type='submit' value='登陆' class='btn btn-primary btn-sm'>"+
			"        </div>"+
			"    </form>"+
			"</div>";
			$('#logout').remove();
			$('#logio').append(div_log);
			$('#add_f').remove();
			$('#add_div').append('<div class="col-md-2" id="add_f"></div>');
		});
		getList('all');
		return false;
	});
	
	//添加条目按钮绑定
	$(document).on('submit','#add_form',function(){
	// $('#add_form').on('submit',function(){
		ajaxSubmit(this,function(data){
			getList('all');
			this[0].reset();
		});
		return false;
	});

	// 条目查看绑定
	$(document).on('click','#entry',function(e){
		e.preventDefault();
		$.ajax({
		url:this.href,
		type:'POST',
		datatype:'json',
		success:function(data){
			var o = jQuery.parseJSON(data);
			$('.modal-title').html(o.name);
			$('.modal-body').html(o.content);
			$('#showdetailbtn').click();
		}
		});
	});

	$(document).on('click', '.nav-self', function(event) {
		event.preventDefault();
		$.ajax({
			url:this.href,
			type:'POST',
			success:function(data){
				$('#entry_list').html(data);
			}
		});
	});
	getList('all',$('#entry_list'));
});

