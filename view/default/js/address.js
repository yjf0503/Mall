function addressCheck()
{
	var fm = document.address;
	
	if (fm.name.value == '')
	{
		alert('用户名不得为空！');
		fm.name.focus();
		return false;
	}
	if (fm.name.value.length < 2)
	{
		alert('用户名不得小于2位！');
		fm.name.focus();
		return false;
	}
	if (fm.name.value.length > 20)
	{
		alert('用户名不得大于20位！');
		fm.name.focus();
		return false;
	}
	if (fm.address.value == '')
	{
		alert('收货人地址不得为空！');
		fm.address.focus();
		return false;
	}
    if (fm.email.value == '')
    {
        alert('收件人电子邮件不得为空！');
        fm.email.focus();
        return false;
    }
    if (fm.code.value == '')
    {
        alert('收货人邮编不得为空！');
        fm.code.focus();
        return false;
    }
    if (fm.tel.value == '')
    {
        alert('收货人联系电话不得为空！');
        fm.tel.focus();
        return false;
    }
    if (fm.buildings.value == '')
    {
        alert('收货地标志性建筑不得为空！');
        fm.buildings.focus();
        return false;
    }
	return true;
}


function checkUser()
{
    var user = document.getElementById("user");
    var flag = document.getElementById("flag");
    var ajax = new AjaxObj();
    ajax.swRequest({
        method:"POST",
        sync:false,
        url:'?a=member&m=isUser',
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





