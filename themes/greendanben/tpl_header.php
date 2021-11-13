<?php if (!defined('__ROOT_DIR__')) exit; ?>
<!-- header -->
<meta name="robots" content="all">
<meta name="googlebot" content="all">
<meta name="baiduspider" content="all">
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta http-equiv="Cache-Control" content="no-transform">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
<base target="_self">
<link rel="shortcut icon" type="image/x-icon" href="/static/<?=$theme_dir?>/favicon.ico" media="screen">
<link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/static/<?=$theme_dir?>/style.css">
<!-- <script src="//cdn.staticfile.org/jquery/3.4.0/jquery.min.js"></script>
<script src="//cdn.staticfile.org/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="//cdn.staticfile.org/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script> -->
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
<script src="/static/<?=$theme_dir?>/common.js"></script>
<!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]-->
</head>

<body>
    <header>
        <div class="header">
            <div class="container head">
                <a id="logo" href="/"><span><?=SITE_NAME?></span>
                    <p><?=SITE_URL?></p>
                </a>
                <script>search();</script>
                <div class="header_right">
                    <a id="home" href="/"><i class="fa fa-home fa-lg"></i><br>首页</a>
                    <!-- <a href="javascript:;" onclick="newmessage();" rel="nofollow"><i class="fa fa-pencil-square fa-lg"></i><br>留言</a> -->
                    <!-- <a href="/bookcase/" rel="nofollow"><i class="fa fa-tags fa-lg"></i><br>书架</a> -->
                    <a href="<?=$allbooks_url?>"><i class="fa fa-book fa-lg"></i><br>书库</a>
                    <a href="/quanben<?=$allbooks_url?>"><i class="fa fa-coffee fa-lg"></i><br>完本</a>
                    <a href="<?=$fake_recentread?>" rel="nofollow"><i class="fa fa-history fa-lg"></i><br>足迹</a>
                </div>
            </div>
        </div>
    </header>
    <div class="navigation">
        <nav class="container">
            <a href="/">首页</a>
            <?php foreach(Sort::ss_sorthead() as $v): ?>
                <a href="<?=$v['sorturl']?>"><?=$v['sortname_2']?></a>
            <?php endforeach ?>
            <a href="/rank/" title="排行">排行</a>
             <div id="user_panel">
                <!-- <script>logininfo();</script>-->
            </div> 
        </nav>
    </div>
    <!-- /header -->