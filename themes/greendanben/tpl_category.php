<?php if (!defined('__ROOT_DIR__')) exit; ?>

<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<title><?php if($sortname !=''):?><?=$sortname?><?php else:?>小说书库<?php endif ?>_书友最值得收藏的网络小说阅读网</title>
<meta name="keywords" content="小说,小说网,最新章节免费阅读小说网,<?=SITE_NAME?>阅读网">
<meta name="description" content="小说,小说网,最新章节免费阅读小说网,<?=SITE_NAME?>阅读网">
<?php require_once 'tpl_header.php'; ?>
<!-- sort -->
<div class="store">
	<div class="store_left">
		<i id="store_menu" class="fa fa-bars fa-3x" onclick="javascript: store_menu();" title="筛选菜单"></i>
		<div class="side_commend">
			<div class="title"><?=$sortname?></div>
      		<!-- wap 端 -->
			<div id="after_menu">
				<div><a href="#"></a><a href="javascript:" onclick="document.location='<?=$full_url?>'"><label><input type="checkbox"<?php if($fullflag): ?> checked="checked"<?php endif ?> /> 只看全本</label></a></div>
				<div><a href="<?=$allbooks_url?>" <?php if($sortid == -1): ?> class="onselect"<?php endif?>>全部分类</a></a>
					<?php foreach($sortcategory as $k => $v): ?>
						<a href="<?=$v['sorturl']?>"<?php if($sortid == $k): ?> class="onselect"<?php endif?>><?=$v['sortname']?></a>
					<?php endforeach ?>
				</div>
			</div>
      		<!-- /wap 端 -->
	
			<ul class="flex">
				<?php if(is_array($retarr)):?>
				<?php foreach($retarr as $k => $v): ?>
				<li>
					<div class="img_span"><a href="<?=$v['info_url']?>"><img class="lazy" src="<?=Url::nocover_url()?>" data-original="<?=$v['img_url']?>" title="<?=$v['articlename']?>" /><span<?php if($v['isfull'] != '连载'): ?> class="full"<?php endif ?>><?=$v['sortname_2']?> / <?=$v['isfull']?></span></a></div>
					<div class="w100">
						<a href="<?=$v['info_url']?>"><h2><?=$v['articlename']?></h2></a>
						<p class="indent"><?=$v['intro_des']?></p>
						<div class="li_bottom">
							<a href="<?=$v['author_url']?>"><i class="fa fa-user-circle-o">&nbsp;<?=$v['author']?></i></a>
							<div>
								<em class="orange"><?=$v['words_w']?>万字</em><em class="blue"><?=Text::ss_lastupdate($v['lastupdate'])?></em>
							</div>
						</div>
					</div>
				</li>
				<?php endforeach ?>
				<?php endif ?>
			</ul>
			<div class="pages"><div class="pagelink" id="pagelink"><?=$jump_html ?></div></div>
		</div>
	</div> 
	<!-- 右边 -->
	<div id="store_right">
		<ul><li><a href="<?=$allbooks_url?>" <?php if($sortid == -1): ?> class="onselect"<?php endif?>>全部分类</a></li></ul>

		<ul>
			<?php foreach($sortcategory as $k => $v): ?>
				<li><a href="<?=$v['sorturl']?>"<?php if($sortid == $k): ?> class="onselect"<?php endif?>><?=$v['sortname']?></a></li>
			<?php endforeach ?>
		</ul>
		
		<ul>
			<li onclick="javascript: document.location='<?=$full_url?>'">
				<label><input type="checkbox"<?php if($fullflag): ?> checked="checked"<?php endif ?> /> 只看全本</label>
			</li>
		</ul>
	</div>

</div>
<!-- /sort -->
<?php require_once 'tpl_footer.php'; ?>