function updateManage() {
	var fm = document.update;
	
	if (fm.pass.value.length < 6) {
		alert('管理员密码不得小于6位！');
		fm.pass.focus();
		return false;
	}
	if (fm.pass.value != fm.notpass.value ) {
		alert('管理员密码和确认密码必须保持一致！');
		fm.notpass.focus();
		return false;
	}
	if (fm.level.value == 0) {
		alert('管理员等级权限必须选择！');
		fm.level.focus();
		return false;
	}
	
	return true;
}

function addNav() {
	var fm = document.add;
	
	if (fm.name.value == '') {
		alert('导航名称不得为空！');
		fm.name.focus();
		return false;
	}
	if (fm.name.value.length < 2) {
		alert('导航名称不得小于2位！');
		fm.name.focus();
		return false;
	}
	if (fm.name.value.length > 4) {
		alert('导航名称不得大于4位！');
		fm.name.focus();
		return false;
	}
	if (fm.info.value.length > 200) {
		alert('导航简介不得大于200位！');
		fm.info.focus();
		return false;
	}
	return true;
}


function checkUser(){
    var user = document.getElementById("user");
    var flag = document.getElementById("flag");
    var ajax = new AjaxObj();
    ajax.swRequest({
        method:"POST",
        sync:false,
        url:'?a=manage&m=isUser',
        data:"user="+user.value,
        success: function(msg) {
            if(msg==1){
                flag.value = 'true';
            } else {
				flag.value = '';
			}
        },
        failure: function(a) {
            alert(a);
        },
        soap:this
    });
}





