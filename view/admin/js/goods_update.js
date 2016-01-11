window.onload = function () {
    var nav = $('nav');
    var brand = $('brand');
    changeNav(nav.value);
    nav.onchange = function () {
        if (this.value == -1) {
            brand.options.length = 1;
        } else {
            changeNav(this.value);
        }
    };
};

function changeNav(id){
    var brand = $('brand');
    var brandid = $('brandid');
    var ajax = new AjaxObj();
    ajax.swRequest({
        method:"GET",
        sync:false,
        url:'?a=goods&m=getBrand&id='+id,
        success: function(msg) {
            var a = msg.split(':');
            brand.options.length = 1;
            for (var i=0;i<a.length;i=i+2) {
                if (brandid.value == a[i]) {
                    brand.options.add(new Option(a[i+1], a[i],false,true));
                } else {
                    brand.options.add(new Option(a[i+1], a[i]));
                }
            }
        },
        failure: function(a) {
            alert(a);
        },
        soap:this
    });
}

function centerWindow(url, name, width, height) {
    var left = (screen.width - width) / 2;
    var top = (screen.height - height) / 2 - 50;
    window.open(url, name, 'width='+width+',height='+height+',top='+top+',left='+left);
}

function $(id) {
    return document.getElementById(id);
}


function updateGoods() {
    var fm = document.update;
    if (fm.nav.value == -1) {
        alert('商品类型必须选择！');
        fm.nav.focus();
        return false;
    }
    if (fm.brand.value == -1) {
        alert('商品品牌必须选择！');
        fm.brand.focus();
        return false;
    }
    if (fm.name.value == '') {
        alert('商品名称不得为空！');
        fm.name.focus();
        return false;
    }
    if (fm.name.value.length < 2) {
        alert('商品名称不得小于2位！');
        fm.name.focus();
        return false;
    }
    if (fm.name.value.length > 100) {
        alert('商品名称不得大于100位！');
        fm.name.focus();
        return false;
    }
    if (fm.sn.value == '') {
        alert('商品编号不得为空！');
        fm.sn.focus();
        return false;
    }
    if (fm.sn.value.length < 2) {
        alert('商品编号不得小于2位！');
        fm.sn.focus();
        return false;
    }
    if (fm.sn.value.length > 50) {
        alert('商品编号不得大于50位！');
        fm.sn.focus();
        return false;
    }
    if (fm.flag.value != '') {
        alert('商品编号已存在，请换个！');
        fm.name.focus();
        return false;
    }
    return true;
}

function checkSn(){
    var sn = document.getElementById("sn");
    var flag = document.getElementById("flag");
    var ajax = new AjaxObj();
    ajax.swRequest({
        method:"POST",
        sync:false,
        url:'?a=goods&m=isUpdateSn',
        data:"sn="+sn.value,
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

