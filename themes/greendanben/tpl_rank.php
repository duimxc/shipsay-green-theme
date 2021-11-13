<?php if (!defined('__ROOT_DIR__')) exit; require_once __ROOT_DIR__ .'/shipsay/include/neighbor.php';?>
<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>小说<?=$page_title?>_<?=SITE_NAME?></title>
  <meta name="keywords" content="排行榜<?=SITE_NAME?>" />
  <meta name="description" content="排行榜<?=SITE_NAME?>" />
<?php require_once 'tpl_header.php'; ?>
    <div class="container">
        <div class="section">
            <div class="title">
                <span class="fa fa-thumbs-o-up fa-lg">排行榜</span>
            </div>
            <ul class="type-fen-2">
                <li class="type-fen-1-1"><a href="/rank/allvisit/">总排行榜</a></li>
                <li class="type-fen-1-1"><a href="/rank/monthvisit/">月排行榜</a></li>
                <li class="type-fen-1-1"><a href="/rank/weekvisit/">周排行榜</a></li>
                <li class="type-fen-1-1"><a href="/rank/dayvisit/">日排行榜</a></li>
                <li class="type-fen-1-1"><a href="/rank/goodnum/">总收藏榜</a></li>
            </ul>
        </div>
        </div>
        </div>
    <div class="container">
        <div class="section">
            <div class="title">
                <span class="fa fa-clock-o fa-lg"><?=$page_title?></span>
            </div>
            <ul class="newlist">
<?php foreach($articlerows as $k => $v): ?><?php if($k < 30):?>
    <li class="text-more">
        <div class="newlist-type text-more xb1 xm1 xs1 xl2">
            <a href="<?=$v['info_url']?>"><img class="tupian" src="<?=$v['img_url'] ?>" title="<?=$v['articlename']?>"></a>   
            [<?=$v['sortname']?>]&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?=$v['info_url']?>" target="_blank" title="<?=$v['articlename']?>"><?=$v['articlename']?></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?=$v['author_url']?>" target="_blank" title="<?=$v['author']?>"><?=$v['author']?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?=date('m-d',$v['lastupdate'])?>
</div>
    </li>
<?php endif ?><?php endforeach ?>
            </ul>
        </div>
 </div>       
<?php require_once 'tpl_footer.php'; ?>