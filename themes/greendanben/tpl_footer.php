<?php if (!defined('__ROOT_DIR__')) exit; ?>

<!-- footer -->
<div id="footer">
    <footer class="container">
        <p><i class="fa fa-flag"></i>&nbsp;<a href="/"><?=SITE_NAME?></a>&nbsp;书友最值得收藏的网络小说阅读网</p>
        <p><a href="javascript:zh_tran('s');" class="zh_click" id="zh_click_s">简体版</a> · <a href="javascript:zh_tran('t');" class="zh_click" id="zh_click_t">繁體版</a></p>
    </footer>
</div>
<script>setEcho();</script>
<?php include_once __ROOT_DIR__ . '/shipsay/configs/count.ini.php';foreach($count as $v) {if($v['enable'])echo $v['html'];}?>
</body>
</html>