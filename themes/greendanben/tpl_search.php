<?php if (!defined('__ROOT_DIR__')) exit; ?>

<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<title><?=$searchkey?> 的搜索结果_<?=SITE_NAME?></title>
<?php require_once 'tpl_header.php'; ?>

<div class="container">
	<div class="side_commend" style="width:100%;">
		<p class="title"><i class="fa fa-search">&nbsp;</i>搜索 "<?=$searchkey?>" 共有 "<?=$search_count?>" 条数据</p>
		<ul class="flex">
			<?php if(is_array($search_res)): ?><?php foreach($search_res as $k => $v): ?>	
			<li class="searchresult">
				<div class="img_span">
					<a href="<?=$v['info_url']?>"><img class="lazy" src="<?=Url::nocover_url()?>" data-original="<?=$v['img_url']?>" title="<?=$v['articlename']?>" /><span<?php if($v['isfull'] == '全本'): ?> class="full"<?php endif ?>><?=$v['sortname_2']?> / <?=$v['isfull']?></span></a>
				</div>
				<div>
					<a href="<?=$v['info_url']?>"><h3><?=str_replace($searchkey, '<span class="hot">'.$searchkey.'</span>', $v['articlename'])?></h3></a>
					<p><i class="fa fa-user-circle-o">&nbsp;</i><?=str_replace($searchkey, '<span class="hot">'.$searchkey.'</span>', $v['author'])?>&nbsp;&nbsp;<span class="s_gray"><?=$v['words_w']?> 万字&nbsp;&nbsp;<?=Text::ss_lastupdate($v['lastupdate'])?></span></p>
					<p class="searchresult_p"><?=$v['intro_des']?></p>
					<p><a href="<?=$v['last_url']?>"><?=$v['lastchapter']?></a></p>
				</div>
			</li>
			<?php endforeach ?><?php endif ?>
		</ul>
		<div class="s_gray tc">注意：最多显示100条结果</div>
	</div>
</div>

<?php require_once 'tpl_footer.php'; ?>
