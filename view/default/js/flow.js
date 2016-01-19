/**
 * Created by Jiefu Yang on 2016/1/19.
 */
window.onload = function ()
{

    var fm = document.flow;
    var total = document.getElementById('total');
    var sum = 0;
    for (var i = 0; i < fm.delivery_radio.length; i++)
    {
        if (fm.delivery_radio[i].checked == true)
        {
            document.getElementById('delivery').innerHTML = fm.delivery_radio[i].value;
            total.getElementsByTagName('strong')[1].innerHTML = fm.delivery_radio[i].value;
            fm.delivery.value = fm.delivery_radio[i].title;
        }
    }

    for (var j = 0; j < fm.pay_radio.length; j++)
    {
        if (fm.pay_radio[j].checked == true)
        {
            document.getElementById('pay').innerHTML = fm.pay_radio[j].value;
            total.getElementsByTagName('strong')[2].innerHTML = fm.pay_radio[j].value;
            fm.pay.value = fm.pay_radio[j].title;
        }
    }

    for (var k = 0;k < total.getElementsByTagName('strong').length; k++)
    {
        sum += Number(total.getElementsByTagName('strong')[k].innerHTML);
    }

    document.getElementById('price').innerHTML = sum;
    fm.price.value = sum;
}

function changeDelivery(delivery)
{
    var fm = document.flow;
    var sum = 0;
    var total = document.getElementById('total');
    document.getElementById('delivery').innerHTML = delivery.value;
    total.getElementsByTagName('strong')[1].innerHTML = delivery.value;
    fm.delivery.value = delivery.title;

    for (var k = 0;k < total.getElementsByTagName('strong').length; k++)
    {
        sum += Number(total.getElementsByTagName('strong')[k].innerHTML);
    }

    document.getElementById('price').innerHTML = sum;
    fm.price.value = sum;
}

function changePay(pay)
{
    var fm = document.flow;
    var sum = 0;
    var total = document.getElementById('total');
    document.getElementById('pay').innerHTML = pay.value;
    total.getElementsByTagName('strong')[2].innerHTML = pay.value;
    fm.pay.value = pay.title;

    for (var k = 0;k < total.getElementsByTagName('strong').length; k++)
    {
        sum += Number(total.getElementsByTagName('strong')[k].innerHTML);
    }

    document.getElementById('price').innerHTML = sum;
    fm.price.value = sum
}
