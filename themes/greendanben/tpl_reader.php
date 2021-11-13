<?php if (!defined('__ROOT_DIR__')) exit; require_once __ROOT_DIR__ . '/shipsay/configs/report.ini.php';?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title><?=$articlename?>(<?=$author?>)_<?=$chaptername?>（<?=$now_pid?> / <?=$max_pid?>）_<?=$articlename?>最新章节免费阅读无弹窗_<?=SITE_NAME?></title>
    <meta name="keywords" content="<?=$chaptername?>,<?=$articlename?>,<?=$author?>,<?=$sortname?>,<?=$isfull?>">
    <meta name="description" content="《<?=$articlename?>》<?=$chaptername?>：<?=$reader_des?>">
    <meta property="og:type" content="novel">
    <meta property="og:title" content="<?=$articlename?>">
    <meta property="og:description" content="《<?=$articlename?>》<?=$chaptername?>：<?=$reader_des?>">
    <meta property="og:novel:category" content="<?=$sortname?>小说">
    <meta property="og:novel:author" content="<?=$author?>">
    <meta property="og:novel:book_name" content="<?=$articlename?>">
    <meta property="og:novel:index_url" content="<?=$info_url?>">
    <meta property="og:novel:info_url" content="<?=$info_url?>">
    <meta property="og:novel:status" content="<?=$isfull?>">
    <meta property="og:novel:chapter_name" content="<?=$chaptername?>">
    <meta property="og:novel:chapter_url" content="<?=$uri?>">
<?php require_once 'tpl_header.php';?>
    <div class="read_bg"><main class="container">
        <ul class="bread">
                <li>当前位置：>>
                <a href="<?=$site_name?>">首页</a>>>
                <a href="<?=Sort::ss_sorturl($sortid)?>"><?=$sortname?>>>
                <a href="<?=$info_url?>"><?=$articlename?> <?=$chaptername?></li>
            </ul>
         <section class="section_style">
        <div class="text">
            <div class="text_set">
                <i class="fr cog fa fa-cog fa-3x" onclick="javascript:cog();"></i>
                <div id="text_control">
                    <div class="fontsize">
                        <button onclick="javascript:changeSize('min');" title="缩小字号">A-</button> 
                        <button onclick="javascript:changeSize('normal');" title="标准字号"> A</button> 
                        <button onclick="javascript:changeSize('plus');" title="放大字号">A+</button>
                    </div>
                    <div>
                        <a href="javascript:alert('敬请期待')" title="加入书签"><i class="fa fa-bookmark"></i></a>
                        <a href="javascript:isnight();" title="白天夜间模式"><i class="fa fa-moon-o fa-flip-horizontal"></i></a>
                        <a href="javascript:;" title="极简模式"><i id="ismini" class="fa fa-minus-square" onclick="ismini();" ></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text_title">
            <p class="style_h1"><?=$chaptername?>（<?=$now_pid?> / <?=$max_pid?>）</p>
            <div class="text_info">
                <span><a href="<?=$info_url?>"><i class="fa fa-book"> <?=$articlename?></i></a></span>
                <span><a href="<?=$author_url?>"><i class="fa fa-user-circle-o"> <?=$author?></i></a></span>
                <span><i class="fa fa-list-ol"> <?=$chapterwords?> 字</i></span>
                <span><i class="fa fa-clock-o"> <?=Text::ss_lastupdate($lastupdate)?></i></span>
            </div>
        </div>
        <article id="article" class="content"><?=$rico_content?></article>
        <?php if(!empty($ShipSayReport['on'])) : ?>
        <div style="text-align:center;margin: -10px 0 10px;"><a style="color:red;font-size:16px;font-weight:700" href="javascript:report();">举报本章错误( 无需登录 ) </a></div>
        <?php endif?>
        <div class="s_gray tc"><script>tips('<?=$articlename?>');</script></div>
    </section>
    <div class="read_nav">

        <?php if($prevpage_url != ''): ?>
            <a id="prev_url" href="<?=$prevpage_url?>"><i class="fa fa-backward"></i> 上一页</a>
        <?php else: ?>
            <?php if($pre_cid == 0): ?><a id="prev_url" href="<?=$info_url?>" class="w_gray"><i class="fa fa-stop"></i> 没有了</a><?php else: ?><a id="prev_url" href="<?=$pre_url?>"><i class="fa fa-backward"></i> 上一章</a><?php endif ?>
        <?php endif ?>

        <a id="info_url" href="<?=$info_url?>">书页/目录</a> 

        <?php if($nextpage_url != ''): ?>
            <a id="next_url" href="<?=$nextpage_url?>"><i class="fa fa-forward"></i> 下一页</a>
        <?php else: ?>
            <?php if($next_cid == 0): ?><a id="next_url" href="<?=$info_url?>" class="w_gray">没有了 <i class="fa fa-stop"></i></a><?php else: ?><a id="next_url" href="<?=$next_url ?>">下一章 <i class="fa fa-forward"></i></a><?php endif ?>
        <?php endif ?>

    </div>
</main></div>
 
<script>
    lastread.set('<?=$info_url?>','<?=$uri?>','<?=$articlename?>','<?=$chaptername?>','<?=$author?>','<?=$img_url?>');
    document.onkeydown = () => {
        if (event.keyCode == 37) window.location = document.querySelector('#prev_url').attributes.href.value;
        if (event.keyCode == 39) window.location = document.querySelector('#next_url').attributes.href.value;
        if (event.keyCode == 13) window.location = document.querySelector('#info_url').attributes.href.value;
    }

    function report() {
        if($.cookie('report')){
            alert('请不要过于频繁,<?=$ShipSayReport['delay']?>秒可操作一次');
            return false;
        } else {
            let date = new Date();
            date.setTime(date.getTime() + (parseInt(<?=$ShipSayReport['delay']?>) * 1000)); //n秒一次.
            $.cookie('report', true, {expires: date, path: '/'})
            $.ajax({
                type:"post"
                ,url:"/api/report.php?do=report"
                ,data:{
                    articleid : '<?=$articleid?>'
                    ,chapterid : '<?=$chapterid?>'
                    ,articlename : '<?=$articlename?>'
                    ,chaptername : '<?=$chaptername?>'
                    ,repurl : window.location.href
                }, 
                success:function(state){
                    state == '200' ? alert('成功！\n我们会尽快处理！\n感谢您对本站的支持') : alert('失败！\n请联系网站管理员');
                }
            });
        }
    }
</script>
<?php require_once 'tpl_footer.php'; ?>
<script src="/static/<?=$theme_dir?>/style.js"></script>



