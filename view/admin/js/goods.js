/**
 * Created by 杰夫 on 2016/1/10.
 */
window.onload = function () {
    var nav = $('nav');
    nav.onchange = function () {
        changeNav(this.value);
    };
};


function changeNav(id){
    var brand = $('brand');
    var ajax = new AjaxObj();
    ajax.swRequest({
        method:"GET",
        sync:false,
        url:'?a=goods&m=getBrand&id='+id,
        success: function(msg) {
            var a = msg.split(':');
            brand.options.length = 1;
            for (var i=0;i<a.length;i=i+2) {
                brand.options.add(new Option(a[i+1], a[i]));
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