<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>在线商城后台管理</title>
	<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
	<link rel="stylesheet" type="text/css" href="view/admin/style/goods.css" />
	<script type="text/javascript" src="view/admin/js/ajax.js"></script>
	<script type="text/javascript" src="view/admin/js/goods.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
 </head>
<body>

<h2><a href="?a=goods">返回商品列表</a>商品 -- 添加商品</h2>

<form method="post" name="add" action="?a=nav&m=add">
	<dl class="form">
		<dd>商品类型：<select name="nav" id="nav">
				<option value="0" selected="selected">--请选择一个商品的类型--</option>
				{foreach from=$addNav key=key item=value}
					<optgroup label="{$value->name}">
						{html_options options=$value->child }
					</optgroup>
				{/foreach}
			</select> <span class="red">[必填]</span>
		</dd>
		<dd>商品品牌：<select name="brand" id="brand">
				<option value="0" selected="selected">--请选择一个商品的品牌--</option>
			</select> <span class="red">[必填]</span>
		</dd>
		<dd>
			上传图片：<input type="text" name="thumbnail" class="text" readonly="readonly" />
			<input type="button" value="上传产品图" onclick="centerWindow('?a=call&m=upfile&type=content','upfile','400','150')" />
			<img name="pic" style="display:none;" /> ( * 保存图片完整性，最佳尺寸为：300 * 300  必须是jpg,gif,png，并且200k内)
		</dd>
		<dd><textarea id="TextArea1" name="content" class="ckeditor"></textarea></dd>
	</dl>
</form>


</body>
</html>