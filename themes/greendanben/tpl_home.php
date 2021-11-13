<?php if (!defined('__ROOT_DIR__')) exit; ?>

<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<title><?=SITE_NAME?>_书友最值得收藏的网络小说阅读网</title>
<meta name="keywords" content="小说,小说网,最新章节免费阅读小说网,<?=SITE_NAME?>阅读网">
<meta name="description" content="小说,小说网,最新章节免费阅读小说网,<?=SITE_NAME?>阅读网">
<?php require_once 'tpl_header.php'; ?>
<!-- home -->
<div class="container">
    <!-- 单本小说 -->
    <section class="section">
        <div class="novel_info_main">
            <?php if(is_array($commend))
            { foreach($commend as $k => $v) { if($k < 7)  ?><?php }} ?>
            <img src="<?=$v['img_url'] ?>" alt="<?=$v['articlename'] ?>" />
            <div class="novel_info_title">
                <h1><?=$v['articlename']?></h1><i>作者：<a href="<?=$v['author_url']?>"><?=$v['author']?></a></i>
                <p>
<span><?=$v['sortname']?></span><span><?=$v['words']?> 字</span>
                
                <div class="flex to100">最新章节：<a href="<?=$v['last_url']?>"><?=$v['lastchapter']?></a><em class="s_gray"><?=$v['lastupdate_cn']?></em></div>
                <div class="flex">
                    <a class="l_btn" href="<?=$v['info_url']?>"><i class="fa fa-file-text"> 开始阅读</i></a>
                </div>
            </div>
        </div>

        <ul class="flex ulcard">`
            <li class="act"><a id="a_info" href="javascript:a_info();">作品信息</a></li>
        </ul>
            
        <div id="info">
            <div class="intro"><p><?=$v['intro_p']?></p></div>
        </div>
        </div>
    </section>

</div>
<div class="container">
	<!-- 大神小说 -->
	<div class="side_commend side_commend_width"><p class="title"><i class="fa fa-thumbs-o-up fa-lg">&nbsp;</i>大神小说</p><ul class="flex">
<?php if(is_array($commend)){ foreach($commend as $k => $v) { if($k < 6) { ?><li><div class="img_span"><a href="<?=$v['info_url']?>"><img src="<?=$v['img_url']?>" title="<?=$v['articlename']?>" /></a><span><?=$v['sortname_2']?> / <?=$v['isfull']?></span></div><div class="w100"><a href="<?=$v['info_url']?>"><h2><?=$v['articlename']?></h2></a><p class="indent"><?=$v['intro_des']?></p><div class="li_bottom"><a href="<?=$v['author_url']?>"><i class="fa fa-user-circle-o">&nbsp;<?=$v['author']?></i></a><div><em class="orange"><?=$v['words_w']?>万字</em><em class="blue"><?=Text::ss_lastupdate($v['lastupdate'])?></em></div></div></div></li><?php }}} ?></ul></div>

	<!-- 热门小说 -->
	<aside><p class="title"><i class="fa fa-fire fa-lg">&nbsp;</i>热门小说</p><ul class="popular odd">
	<?php if(is_array($popular)): ?><?php foreach($popular as $k => $v): ?><?php if($k < 12):?>	
		<li><a href="<?=$v['info_url']?>"><?=$v['articlename']?></a><a class="gray" href="<?=$v['author_url']?>"><?=$v['author']?></a></li>
	<?php endif ?><?php endforeach ?><?php endif ?>
	</ul></aside>
</div>

<div class="container">
	<div class="section flex">
		<!-- 分类 -->
        <?php for( $i = 1; $i <= 6; $i++) { $tmpvar = 'sort'.$i?>
		<div class="sortvisit"><a href="<?=Sort::ss_sorturl($i)?>"><?=Sort::ss_sortname($i,1)?></a><ul>
			<?php if(is_array($$tmpvar)): ?><?php foreach($$tmpvar as $k => $v): ?>
				<?php if ($k == 0) : ?>		
					<div><a href="<?=$v['info_url']?>"><img class="lazy" src="<?=Url::nocover_url()?>" data-original="<?=$v['img_url']?>" title="<?=$v['articlename']?>"></a><p><a href="<?=$v['info_url']?>"><?=$v['articlename']?></a><i>&nbsp;/&nbsp;<?=$v['author']?></i><br>&nbsp;&nbsp;&nbsp;&nbsp;<?=$v['intro_des']?></p></div>
				<?php elseif($k < 13): ?>
					<li><a href="<?=$v['info_url']?>"><?=Text::ss_substr($v['articlename'])?></a><i>&nbsp;/ <?=$v['author']?></i></li>
				<?php endif ?>
			<?php endforeach ?><?php endif ?>
		</ul></div>
        <?php }; ?> 
    </div>
</div>

<div class="container">
	<!-- 最新章节 -->
	<div class="lastupdate"><p class="title"><i class="fa fa-clock-o fa-lg">&nbsp;</i>最新章节</p><ul class="odd">
	<?php if(is_array($lastupdate)){ foreach($lastupdate as $k => $v) { if( $k < 30 ) { ?>	

	<li><span>&nbsp;&nbsp;&nbsp;&nbsp;<?=$v['sortname_2']?>&nbsp;&nbsp;</span><a href="<?=$v['info_url']?>"><?=$v['articlename']?></a><a class="gray" href="<?=$v['last_url']?>"><?=$v['lastchapter']?></a><span><a class="gray" href="<?=$v['author_url']?>"><?=$v['author']?></a>&nbsp;&nbsp;<?=date('m-d',$v['lastupdate'])?></span></li>
    <?php }}} ?>

	</ul></div>
</div> 

<div class="container">
    <div class="section link">
        <p class="title"><i class="fa fa-link">&nbsp;</i>友情链接</p>
        <?=$link_html?>
    </div>
</div>
<!-- /home -->

<?php require_once 'tpl_footer.php'; ?>