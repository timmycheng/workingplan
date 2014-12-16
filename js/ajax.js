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

$(document).ready(function(){
	// $('#login_form').bind('submit',function(){
	// 	ajaxSubmit(this,function(data){
			
	// 	});
	// 	return false;
	// });

	// $('#logout_form').bind('submit',function(){
	// 	ajaxSubmit(this,function(data){
			
	// 	});
	// 	return false;
	// });
});