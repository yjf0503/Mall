<div id="header">
	<h1><a href="./">瓢城Web俱乐部</a></h1>
</div>
<div id="nav">
	<ul>
		{if $smarty.get.navid}
			<li><a href="./">首页</a></li>
		{else}
			<li><a href="./" class="strong">首页</a></li>
		{/if}
		{foreach from=$FrontTenNav key=key item=value}
			{if $value->id == $FrontNav[0]->id}
				<li><a href="?a=list&navid={$value->id}" class="strong">{$value->name}</a></li>
			{else}
				<li><a href="?a=list&navid={$value->id}">{$value->name}</a></li>
			{/if}
		{/foreach}
	</ul>
</div>

<div id="search">

</div>