function updateNav()
{
	var fm = document.update;

	return true;
}

function addAttr()
{
	var fm = document.add;
	
	if (fm.name.value == '')
	{
		alert('自定义属性名称不得为空！');
		fm.name.focus();
		return false;
	}
	if (fm.name.value.length < 2)
	{
		alert('自定义属性名称不得小于2位！');
		fm.name.focus();
		return false;
	}
	if (fm.name.value.length > 4)
	{
		alert('自定义属性名称不得大于4位！');
		fm.name.focus();
		return false;
	}
	if(fm.flag.value != '')
	{
		alert('自定义属性名称被占用');
		fm.name.focus();
		return false;
	}
	return true;
}


function checkName(){
    var name = document.getElementById("name");
    var flag = document.getElementById("flag");
    var ajax = new AjaxObj();
    ajax.swRequest({
        method:"POST",
        sync:false,
        url:'?a=attr&m=isName',
        data:"name="+name.value,
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




