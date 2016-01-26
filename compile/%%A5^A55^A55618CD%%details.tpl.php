<?php /* Smarty version 2.6.26, created on 2016-01-26 12:11:00
         compiled from default/public/details.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $this->_tpl_vars['FrontGoods'][0]->name; ?>
 -- 在线商城系统</title>
	<link rel="stylesheet" type="text/css" href="view/default/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/default/style/details.css" />
	<script type="text/javascript" src="view/default/js/browserdetect.js"></script>
	<script type="text/javascript" src="view/default/js/attr.js"></script>
	<script type="text/javascript" src="view/default/js/channel.js"></script>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="sait">
	当前位置：<a href="./">首页</a>
	<?php $_from = $this->_tpl_vars['FrontNav'][0]->sait; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
		&gt; <a href="?a=list&navid=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
	&gt; <?php echo $this->_tpl_vars['FrontGoods'][0]->name; ?>

</div>

<div id="sidebar">
	<h2><?php echo $this->_tpl_vars['FrontNav'][0]->name; ?>
</h2>
	<ul style="margin:0 0 10px 0">
		<?php $_from = $this->_tpl_vars['FrontNav'][0]->child; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
			<li><a href="?a=list&navid=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->name; ?>
<span class="gray">(1000)</span></a></li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
	<h2>当月热销</h2>
	<div style="margin:0 0 10px 0">
		<dl style="border:none;">
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<p><a href="###">查看更多</a></p>
	</div>
	<h2>浏览记录</h2>
	<div style="margin:0 0 10px 0">
		<dl style="border:none;">
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<dl>
			<dt><a href="###"><img src="view/default/images/pro_list_demo_small.jpg" alt="连衣裙" title="连衣裙" /></a></dt>
			<dd class="price">￥158.00</dd>
			<dd class="title"><a href="###">春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子</a></dd>
		</dl>
		<p><a href="###">查看更多</a> <a href="###">清空</a></p>
	</div>
</div>

<div id="main">
	<form method="post" action="?a=cart&m=addProduct">
		<input type="hidden" id="attrid" name="attrid" value="<?php echo $this->_tpl_vars['FrontGoods'][0]->attr; ?>
" />
		<input type="hidden" id="attrtype" name="attrtype" value="<?php echo $this->_tpl_vars['attrType']; ?>
" />
		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['FrontGoods'][0]->id; ?>
" />
		<input type="hidden" name="name" value="<?php echo $this->_tpl_vars['FrontGoods'][0]->name; ?>
" />
		<input type="hidden" name="price_sale" value="<?php echo $this->_tpl_vars['FrontGoods'][0]->price_sale; ?>
" />
		<input type="hidden" name="sn" value="<?php echo $this->_tpl_vars['FrontGoods'][0]->sn; ?>
" />
		<h2><?php echo $this->_tpl_vars['FrontGoods'][0]->name; ?>
</h2>
		<dl class="pic">
			<dt><a href="###"><img src="<?php echo $this->_tpl_vars['FrontGoods'][0]->thumbnail; ?>
" alt="<?php echo $this->_tpl_vars['FrontGoods'][0]->name; ?>
" title="<?php echo $this->_tpl_vars['FrontGoods'][0]->name; ?>
" /></a></dt>
			<script>var thumbnail = '<?php echo $this->_tpl_vars['domain']; ?>
<?php echo $this->_tpl_vars['FrontGoods'][0]->thumbnail; ?>
';</script>
			<?php echo '
				<dd>分享至：<a href="javascript:void((function(s,d,e){try{}catch(e){}var f=\'http://service.weibo.com/share/share.php?\',u=d.location.href,p=[\'url=\',e(u),\'&title=\',e(d.title),\'&pic=\',e(thumbnail),\'&appkey=\'].join(\'\');function a(){if(!window.open([f,p].join(\'\'),\'mb\',[\'toolbar=0,status=0,resizable=1,width=620,height=450,left=\',(s.width-620)/2,\',top=\',(s.height-450)/2].join(\'\')))u.href=[f,p].join(\'\');};if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})(screen,document,encodeURIComponent));">新浪微博</a>
					| <a href="javascript:void(0)" onclick="postToWb();" class="tmblog">腾讯微博</a>
					<script type="text/javascript">
						function postToWb(){
							var _t = encodeURI(document.title);
							var _url = encodeURIComponent(\'http://www.yc60.com\');
							var _appkey = encodeURI("appkey");//你从腾讯获得的appkey
							var _pic = encodeURI(\'http://www.yc60.com/video/dreamweavermain.png\');//（列如：var _pic=\'图片url1|图片url2’）
							var _site = \'\';//你的网站地址
							var _u =\'http://v.t.qq.com/share/share.php?title=\'+_t+\'&url=\'+_url+\'&appkey=\'+_appkey+\'&site=\'+_site+\'&pic=\'+_pic;window.open( _u,\'转播到腾讯微博\', \'width=700, height=680, top=0, left=0,toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no\' );
						}
					</script>
					| <a href="javascript:void((function(s,d,e){if(/renren\\.com/.test(d.location))return;var f=\'http://share.renren.com/share/buttonshare?link=\',u=d.location,l=d.title,p=[e(u),\'&title=\',e(l)].join(\'\');function a(){if(!window.open([f,p].join(\'\'),\'xnshare\',[\'toolbar=0,status=0,resizable=1,width=626,height=436,left=\',(s.width-626)/2,\',top=\',(s.height-436)/2].join(\'\')))u.href=[f,p].join(\'\');};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else a();})(screen,document,encodeURIComponent));" title="分享到人人">人人网</a>
					| <a href="javascript:d=document;t=d.selection?(d.selection.type!=\'None\'?d.selection.createRange().text:\'\'):(d.getSelection?d.getSelection():\'\');void(kaixin=window.open(\'http://www.kaixin001.com/~repaste/repaste.php?&amp;rurl=\'+escape(d.location.href)+\'&amp;rtitle=\'+escape(d.title)+\'&amp;rcontent=\'+escape(d.title),\'kaixin\'));kaixin.focus();">开心网</a></dd>
			'; ?>

		</dl>
		<dl id="text" class="text">
			<dd>售　　价：<span class="sale">￥<?php echo $this->_tpl_vars['FrontGoods'][0]->price_sale; ?>
</span><span class="market">￥<?php echo $this->_tpl_vars['FrontGoods'][0]->price_market; ?>
</span></dd>
			<dd>商品编号：<?php echo $this->_tpl_vars['FrontGoods'][0]->sn; ?>
</dd>
			<dd>所属品牌：<?php echo $this->_tpl_vars['FrontGoods'][0]->brandname; ?>
</dd>
			<dd>销 售 量：<span class="sale_num">136</span> <?php echo $this->_tpl_vars['FrontGoods'][0]->unit; ?>
</dd>
			<dd>重　　量：<?php echo $this->_tpl_vars['FrontGoods'][0]->weight; ?>
 kg <?php if ($this->_tpl_vars['FrontGoods'][0]->is_freight == 1): ?><span class="gray">(免运费)</span><?php endif; ?></dd>
			<dd>数　　量：<input type="text" value="1" class="num" name="num" /> <?php echo $this->_tpl_vars['FrontGoods'][0]->unit; ?>
 <span class="gray">(目前库存：<?php echo $this->_tpl_vars['FrontGoods'][0]->inventory; ?>
<?php echo $this->_tpl_vars['FrontGoods'][0]->unit; ?>
)</span></dd>
			<dd class="buy_button"><input type="submit" name="send" class="submit" value="" /> <img src="view/default/images/collect.gif" alt="收藏" title="收藏" /></dd>
		</dl>
	</form>
	<div class="content">
		<ul>
			<li id="button1" onclick="channel(1)" class="first">商品详情</li>
			<li id="button2" onclick="channel(2)">评价列表</li>
			<li id="button3" onclick="channel(3)">成交记录</li>
			<li id="button4" onclick="channel(4)">售后服务</li>
		</ul>
		<div class="c1" id="c1" style="display:block;">
			<?php echo $this->_tpl_vars['FrontGoods'][0]->content; ?>

		</div>
		<div class="c2" id="c2" style="display:none;">
			评价列表
		</div>
		<div class="c3" id="c3" style="display:none;">
			成交记录
		</div>
		<div class="c4" id="c4" style="display:none;">
			<?php echo $this->_tpl_vars['FrontGoods'][0]->service; ?>

		</div>
	</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'default/public/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>