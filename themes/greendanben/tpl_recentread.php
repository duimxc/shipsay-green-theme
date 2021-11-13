<?php if (!defined('__ROOT_DIR__')) exit; ?>

<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<title>最近阅读_<?=SITE_NAME?></title>
<?php require_once 'tpl_header.php'; ?>

<div class="container">
	<div class="section_mark" id="tempBookcase"></div>
	<script language="javascript">showtempbooks();</script>
<!-- 右边 -->
	<aside>
		<p class="title"><i class="fa fa-fire fa-lg">&nbsp;</i>猜你喜欢</p>
		<ul class="popular odd">
            <?php if(is_array($popular)): ?><?php foreach($popular as $v): ?>	
                <li><a href="<?=$v['info_url']?>"><?=$v['articlename']?></a><a class="gray" href="<?=$v['author_url']?>"><?=$v['author']?></a></li>
            <?php endforeach ?><?php endif ?>
		</ul>
	</aside>

</div>

<?php require_once 'tpl_footer.php'; ?>
