<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <link type="text/css" media="all" href="/static/css/style.css" rel="stylesheet">
    <meta name="keywords" content="<?php echo $CONFIG['keyword'] ?>">
    <meta name="description" content="<?php echo $CONFIG['description'] ?> ">
    <title><?php echo $site_name; ?></title>
    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/static/js/share.js"></script>
    <link rel="stylesheet" href="./inedx_files/share_style1_16.css">
</head>
<body class="container-mumu custom-background">
<div id="loading" class="progress" style="width: 100%; display: none;">
    <div class="progress-bar progress-bar-mumu progress-bar-striped active" role="progressbar" aria-valuenow="10"
         aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
</div>
<div id="header">
    <div class="row top-box">
        <div class="col-md-8 logo">
            <a href="<?php echo $site_url ?>">
                <img src="/static/img/logo.png" alt="<?php echo $site_name ?>">
            </a>
        </div>
        <div class="col-md-4">
            <form onsubmit="return checkSearchForm()" method="post" name="searchform" id="searchform"
                  class="navbar-form navbar-right" action="/search.php">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyboard" id="s" placeholder="搜索其实很简单！">
                    <span class="input-group-btn">
                        <button class="btn btn-black search-sub" type="submit" name="submit"> 搜索 </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div id="nav">
        <div class="nav-s"><?php echo $site_name ?><i class="glyphicon glyphicon-menu-hamburger"></i></div>
        <div class="nav-ss" style="display: none;">
            <ul class="nav" role="navigation">
                <li class="menu-item current_page_item"><a href="<?php echo $site_url;?>">首页</a></li>
                <?php foreach ($nav as $nav_url => $nav_name): ?>
                    <li class="menu-item "><a href="<?php echo $site_url .'category/'. $nav_url ?>"><?php echo $nav_name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="nav-m">
            <div class="menu-mu-container">
                <ul class="nav nav-pills" role="navigation">

                    <li class="menu-item current_page_item"><a href="<?php echo $site_url;?>">首页</a></li>
                    <?php foreach ($nav as $nav_url => $nav_name): ?>
                        <li class="menu-item "><a href="<?php echo $site_url .'category/'. $nav_url ?>"><?php echo $nav_name ?></a></li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div>

</div>
<script>jQuery("#loading").animate({width: "30%"});</script>
<div id="content">
    <div class="main">
        <div id="carousel-example-generic" class="carousel slide slider" data-ride="carousel">
            <ol class="carousel-indicators slide-yq">
                <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
            </ol>
            <div class="carousel-inner mumu-slide" role="listbox">
                <?php foreach ($lunbo_news as $lunbo_item):?>
                    <div class="item">
                        <a href="<?php echo $site_url."content/".$lunbo_item['id'].".html";?>">
                            <img src="<?php echo $lunbo_item['img'];?>" alt="<?php echo $lunbo_item['title'];?>">
                        </a>
                    </div>

                <?php endforeach;?>
            </div>
        </div>
        <script>$(".mumu-slide").children().eq(0).addClass("active");
            var item = $(".item").length;
            for (var i = 1; i <= item; i++) {
                $(".slide-yq").append("<li data-target='#carousel-example-generic'  data-slide-to='" + (i - 1) + "'></li>");
            }
            $(".slide-yq li").eq(0).addClass("active");</script>
        <div class="in_box">
            <?php foreach ($news as $item): ?>
                <article class="post_box">
                    <div class="post-img col-xs-12  col-sm-12 col-md-4">
                        <a href="<?php echo $site_url . 'content/' . $item['id'].".html" ?>">
                            <img class="img-responsive img-rounded imgs" src="<?php echo $item['img']?>" alt="<?php echo $item['title'] ?>">
                            <em></em>
                        </a>
                    </div>
                    <div class="post-left col-xs-12 col-sm-12 col-md-8">
                        <h3><a href="<?php echo $site_url . 'content/' . $item['id'].".html" ?>"
                               title="<?php echo $item['title'] ?>"><?php echo $item['title'] ?></a></h3>
                        <aside>
                            <span class="mu-ml"><i class="glyphicon glyphicon-list"></i>
                                <a href="<?php echo $site_url .'category/'. $item['category'] ?>"><?php echo $item['category_chn']?></a>
                            </span>
                            <span><i class="glyphicon glyphicon-eye-open"></i> <?php echo $item['view_count'] ;?>浏览</span>
                            <span><i class="glyphicon glyphicon-time"></i><?php echo date("Y-m-d H:i:s",$item['publish_time']) ?></span></aside>
                        <div class="post-con">
                            <?php echo $item['intro'] ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
    <script>jQuery("#loading").animate({width: "70%"});</script>
    <div class="sidebar">
        <?php foreach (array_slice($hot_news,0,5) as $hot_item): ?>
            <div class="widget m_textbanner">
                <a class="style01" href="<?php echo $site_url . "content/" . $hot_item['id'] . ".html" ?>"><strong>强力推荐</strong>
                    <h2><?php echo $hot_item['title']; ?></h2>
                    <p>  <?php echo $hot_item['intro'] ?></p>
                </a></div>

        <?php endforeach; ?>

        <div class="widget AssignPost">
            <h2 class="widget_title">推荐主题</h2>
            <ul class="Assign_con widget_con">
                <?php foreach (array_slice($hot_news,5) as $hot_item): ?>
                    <li class="imglist">
                        <a href="<?php echo $site_url . "content/" . $hot_item['id'] . ".html" ?>"
                                           title="<?php echo $hot_item['title']; ?>">
                            <img style="width: 80px;height: 50px" src="<?php echo $hot_item['img']; ?>" alt="<?php echo $hot_item['title']; ?>">
                            <h4><?php echo $hot_item['title']; ?></h4>
                            <p>
                                <span class="time"><?php echo date("Y-m-d",$hot_item['publish_time'])?></span>
                                <span class="views"> <?php  echo $hot_item['view_count']; ?></span>
                            </p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="widget widget_tag_cloud">
            <h2>标签</h2>
            <div class="tagcloud">
                <?php foreach ($tags as $tag):?>
                    <a href="<?php echo $site_url."tags/".$tag;?>" target="_blank" title="<?php echo $tag;?>" style="color:#428BCA;font-size: 14px;"><?php echo $tag;?></a>
                <?php endforeach;?>
            </div>
        </div>
        <div class="widget widget_links">
            <h2>友情链接</h2>
            <ul class="xoxo blogroll">
            </ul>
        </div>
    </div>
    <script>jQuery("#loading").animate({width: "90%"});</script>
    <div class="claer"></div>
</div>
<div id="footer">
    <p>
        <?php foreach ($nav as $nav_url => $nav_name): ?>
            <a href="<?php echo $site_url .'category/'. $nav_url ?>" target="_blank"><?php echo $nav_name ?></a>
        <?php endforeach; ?>
        <a href="<?php echo $site_url;?>" target="_blank">鲁ICP备12345678号</a>
    </p>
    <p>Copyright © 2015 Theme by <a href="<?php echo $site_url;?>" target="_blank"><?php echo $site_name;?></a></p>
</div>
<div id="f-top" style="display: none; opacity: 0;">
    <a href="javascript:;" class="tTop" data-toggle="tooltip" data-placement="left" title="" data-original-title="去顶部"><i class="glyphicon glyphicon-menu-up"></i></a>
</div>
<script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/js/lightbox.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="/static/js/mumu.js"></script>
<script type="text/javascript" src="/static/js/font-size.js"></script>
<script>jQuery("#loading").animate({width: "100%"}, function () {
        $(this).fadeOut(500);
    });
</script>


<div id="lightboxOverlay" class="lightboxOverlay" style="display: none;"></div>

</body>
</html>