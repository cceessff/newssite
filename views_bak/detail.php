<!DOCTYPE html>
<html mip="" lang="zh-cn" class="mip-i-android-scroll">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<meta name="referrer" content="never" />-->
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="keywords" content="<?php echo $keyword; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <title><?php echo $site_title; ?></title>
    <link href="/static/css/css.css" rel="stylesheet" type="text/css">
    <link href="/static/css/icomoon.css" rel="stylesheet" type="text/css">
    <link rel="canonical" href="<?php echo $site_url; ?>">
    <link rel="stylesheet" type="text/css" href="/static/css/mip.css">
    <style type="text/css">mip-gototop {
            display: none !important;
            width: 36px;
            height: 36px;
            border: 1px solid #999;
            border-radius: 5px;
            background-color: #fff;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADsAAAA8CAYAAADYIMILAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA4ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4N2M5ODc5Zi0xMDMxLTRjZWYtOWViMy1lMmIxNzNkMDU1MTAiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OUEwOTQ3MUIxMDdEMTFFNkIwNDFFMDRENzk5MUQ2RDIiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OUEwOTQ3MUExMDdEMTFFNkIwNDFFMDRENzk5MUQ2RDIiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxM2I0YTVjYS1mNzQ0LTRhMGEtYjI0Yy02NmM1N2I3NTE2NGIiIHN0UmVmOmRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDozYThhODFlZS01OGQ4LTExNzktYmYwNi1lNTU4YzcyN2M2NTkiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6FlgSqAAACS0lEQVR42uzbO0hbYRQH8JtLqYKU4ANBO7RQijjooHVx6uRktw6FFju1UIRIBwdFLfZBHcSWFjo5FLfi5pap7eAUB6dCO5RSh0BRQ8CISqn+v3IOhENyE+/DfPfm/OHv43gdft7XdyNJDSOO42TQDie52UffuU0AdciXcZ3mScpg36OFhEP3zGF8CR+20Ilm2LXNdBgrVrEhZQRdQz+iw0nGdqNTaDvaic6hQ0nEGuhrNF02M3eCWXQgSViGdlf4WQu6gPYlAesF5bSii+iNOGPrgXLaCHwtjtjzQDnmfH6B9sYJWw36tcK26+J7c6V+dc4/UsOwXtCVCtube+6GmHWhL+mztdha0H9Vfm8VzYpZD4HTNmL9Qk1O0Q/oZzG/SuArNmGDQDlmm7fopphfp6t0mw3YMKDl4GU0J+Y30We0AGkYNkwo5y+6hG6LeT+ttC43AhsFlHNC5+o3MR9EZ2hNfWHYKKGcY/Q5+kPMb6HTfneSayGUU6Jz9ZeYj6JP/YBdS6GcA3ru3RHz2+gkmooCWw36JUIop4jOo3kxH0MfhY31gr6JGMrZoz28K+Z30IdhYW2Acv7QKxv7Yn4XvRcU22URlJOnQ7oo5vfR8SDYJ5ZBOb9pgVES8wdBsGkLoZyfdFs6FKsv39hP6BF9nbUIyvlODwnm0C7Qk5NnvJZeObrStVa4KNgSs6R8XO/GtdaZh+JQiXX0fz2KVaxiFatYxSpWsYpVrGIVq1jFKlaxilWsYhVrHbb8xfZC0rH8HqL/77O5aOyZAAMARRuDCbImm0EAAAAASUVORK5CYII=");
            background-size: 50% 50%
        }

        mip-gototop.mip-gototop-show {
            display: block !important
        }

        mip-fixed[type=gototop] {
            -webkit-transform: initial;
            -ms-transform: initial;
            transform: none
        }</style>
    <style type="text/css">.mip-nav-wrapper {
            height: 72px
        }

        .mip-nav-wrapper.show {
            opacity: 1 !important
        }

        .mip-nav-wrapper .hr-xs {
            display: none
        }

        mip-nav-slidedown #bs-navbar {
            margin-bottom: 0;
            margin-right: 0;
            float: right
        }

        mip-nav-slidedown #bs-navbar a, mip-nav-slidedown #bs-navbar mip-link, mip-nav-slidedown #bs-navbar span {
            white-space: nowrap;
            margin: 15px;
            padding: 10px;
            color: #666
        }

        mip-nav-slidedown #bs-navbar a:focus, mip-nav-slidedown #bs-navbar a:hover, mip-nav-slidedown #bs-navbar mip-link:focus, mip-nav-slidedown #bs-navbar mip-link:hover, mip-nav-slidedown #bs-navbar span:focus, mip-nav-slidedown #bs-navbar span:hover {
            text-decoration: none;
            background: transparent;
            color: #000
        }

        mip-nav-slidedown #bs-navbar .navbar-nav {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            margin-top: 10px;
            margin-right: -25px
        }

        mip-nav-slidedown #bs-navbar .navbar-nav li {
            list-style: none;
            line-height: 50px
        }

        mip-nav-slidedown #bs-navbar .navbar-nav li.active a, mip-nav-slidedown #bs-navbar .navbar-nav li.active mip-link, mip-nav-slidedown #bs-navbar .navbar-nav li.active span {
            color: #000;
            font-weight: 700
        }

        mip-nav-slidedown .navbar-wise-close {
            display: none
        }

        mip-nav-slidedown .navbar-brand {
            float: none;
            display: inline-block;
            margin: 15px 0 10px;
            height: 41px;
            background-size: 100% auto;
            position: absolute;
            font-size: 26px
        }

        mip-nav-slidedown .navbar-brand:active, mip-nav-slidedown .navbar-brand:hover {
            color: hsla(0, 0%, 100%, .85)
        }

        mip-nav-slidedown .navbar-header {
            float: left
        }

        mip-nav-slidedown .navbar-toggle {
            display: none
        }

        @media screen and (max-width: 767px) {
            .mip-nav-wrapper {
                height: 44px
            }

            .mip-nav-wrapper .navbar-static-top a {
                margin: 0
            }

            .mip-nav-wrapper #bs-navbar {
                height: 0;
                -webkit-transition: height .3s;
                transition: height .3s;
                width: 100%;
                left: 0;
                overflow-y: scroll;
                -webkit-overflow-scrolling: touch;
                z-index: 1000;
                border: 0;
                float: none;
                position: absolute;
                background-color: #fff
            }

            .mip-nav-wrapper #bs-navbar .navbar-nav {
                margin: 0;
                min-height: 283px;
                height: 100%;
                display: block
            }

            .mip-nav-wrapper #bs-navbar .navbar-nav li {
                padding: 5px 0
            }

            .mip-nav-wrapper #bs-navbar .navbar-nav a, .mip-nav-wrapper #bs-navbar .navbar-nav mip-link, .mip-nav-wrapper #bs-navbar .navbar-nav span {
                text-align: center;
                color: #333;
                font-size: 18px;
                padding: 0;
                margin: 0 auto;
                display: block
            }

            .mip-nav-wrapper .navbar-header {
                float: none;
                overflow: hidden
            }

            .mip-nav-wrapper .container > .navbar-collapse {
                padding: 0;
                background-color: #fff
            }

            .mip-nav-wrapper .navbar-brand {
                margin: 5px 0 0;
                height: 33px;
                font-size: 23px
            }

            .mip-nav-wrapper .navbar-static-top .navbar-brand {
                left: 50%;
                margin-left: -30px
            }

            .mip-nav-wrapper .navbar-toggle {
                display: block;
                margin: 8px 0;
                padding: 5px;
                border: 0;
                background: transparent;
                float: right
            }

            .mip-nav-wrapper .navbar-toggle .icon-bar {
                height: 2px;
                width: 23px;
                background: #999;
                display: block
            }

            .mip-nav-wrapper .navbar-toggle .icon-bar + .icon-bar {
                margin-top: 6px
            }

            .mip-nav-wrapper .hr-xs {
                display: block !important;
                border-color: #eee;
                margin: 0 10px;
                border-top: 0
            }

            .mip-nav-wrapper .navbar-wise-close {
                display: block;
                text-align: center;
                margin: 20px 0
            }

            .mip-nav-wrapper #navbar-wise-close-btn {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                border: 1px solid #d4d4d4;
                display: inline-block;
                position: relative
            }

            .mip-nav-wrapper #navbar-wise-close-btn:before {
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg)
            }

            .mip-nav-wrapper #navbar-wise-close-btn:after, .mip-nav-wrapper #navbar-wise-close-btn:before {
                content: "";
                width: 1px;
                height: 25px;
                display: inline-block;
                position: absolute;
                background: #d4d4d4;
                top: 7px
            }

            .mip-nav-wrapper #navbar-wise-close-btn:after {
                -webkit-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }

            .mip-nav-wrapper #navbar-wise-close-btn.down {
                background: #f3f3f3
            }

            .mip-nav-wrapper .sr-only {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                border: 0
            }
        }

        @media screen and (min-width: 768px) {
            mip-nav-slidedown #bs-navbar li .navbar-more:after {
                content: "";
                position: relative;
                display: inline-block;
                top: 1px;
                border: 4px solid transparent;
                border-top-color: #666;
                left: 3px
            }

            mip-nav-slidedown #bs-navbar li:hover .navbar-more:after {
                border-color: transparent transparent #666;
                top: -3px
            }

            mip-nav-slidedown #bs-navbar li > ul {
                display: none;
                list-style: none;
                position: absolute;
                background: #fff
            }

            mip-nav-slidedown #bs-navbar li:hover > ul {
                display: inherit;
                z-index: 10
            }
        }</style>
    <script async="" src="/static/js/mip-nav-slidedown.js"></script>
    <script async="" src="/static/js/mip-gototop.js"></script>
    <?php echo $js;?>
</head>
<body mip-ready="" class="mip-i-android-scroll">
<mip-fixed type="top" class="mip-shell-header-wrapper mip-element" mipdata-fixedidx="Fixed1"
           style="display: none; z-index: 9999;">
    <div class="mip-shell-header transition" style="background-color: rgb(255, 255, 255);"><a href="javascript:void(0)"
                                                                                              class="back-button"
                                                                                              mip-header-btn=""
                                                                                              data-button-name="back">
            <svg t="1530857979993" class="icon" style="fill: rgb(0, 0, 0);" viewBox="0 0 1024 1024" version="1.1"
                 xmlns="http://www.w3.org/2000/svg" p-id="3173" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path fill="currentColor"
                      d="M348.949333 511.829333L774.250667 105.728C783.978667 96 789.333333 83.712 789.333333 71.104c0-12.629333-5.354667-24.917333-15.082666-34.645333-9.728-9.728-22.037333-15.082667-34.645334-15.082667-12.586667 0-24.917333 5.333333-34.624 15.082667L249.557333 471.616A62.570667 62.570667 0 0 0 234.666667 512c0 10.410667 1.130667 25.408 14.890666 40.042667l455.424 435.605333c9.706667 9.728 22.016 15.082667 34.624 15.082667s24.917333-5.354667 34.645334-15.082667c9.728-9.728 15.082667-22.037333 15.082666-34.645333 0-12.608-5.354667-24.917333-15.082666-34.645334L348.949333 511.829333z"
                      p-id="3174"></path>
            </svg>
        </a>
        <div class="mip-shell-header-logo-title"><span class="mip-shell-header-title" style="color: rgb(0, 0, 0);"><?php echo $site_title;?></span>
        </div>
    </div>
</mip-fixed>
<script src="/static/js/mip-ad.js"></script>
<script src="/static/js/mip.js"></script>
<mip-shell class="mip-element mip-layout-container">
    <script type="application/json">{
            "ignoreWarning": true
        }</script>
</mip-shell>
<header class="ulooezdb">
    <div class="cezbysxy">
        <div class="gwvxeiiq xuqlzltb"><a href="<?php echo $site_url; ?>">
                <mip-img src="/static/img/logo.png" alt="<?php echo $site_name; ?>"
                         class="mip-element mip-layout-container mip-img-loaded"></mip-img>
            </a></div>
        <div class="gwvxeiiq ubrrjfds">
            <h1>欢迎光临 </h1>
            <span>我们一直在努力</span></div>
        <div class="ezjzdybw mip-nav-wrapper show">
            <mip-nav-slidedown data-id="bs-navbar"
                               class="mip-element-sidebar container mip-element mip-layout-container"
                               data-showbrand="1">

                <div>

                    <nav id="bs-navbar" class="navbar-collapse collapse navbar navbar-static-top">
                        <ul class="ezjzdybw navbar-nav navbar-right">
                            <li class=""><a href="/">首页</a></li>
                            <?php foreach ($nav as $nav_url => $nav_name): ?>
                                <li class=""><a
                                            href="<?php echo $site_url . 'category/' . $nav_url ?>"><?php echo $nav_name ?></a>
                                </li>
                            <?php endforeach; ?>
                            <li class="navbar-wise-close"><span id="navbar-wise-close-btn"></span></li>
                        </ul>
                    </nav>
                </div>
            </mip-nav-slidedown>
        </div>
    </div>
</header>
<div class="clear"></div>
<section class="pdnglxnf cezbysxy">
    <div class="gwvxeiiq vgllukiw">
        <div class="ibzliqhp">
            <div class="positions">当前位置：<a href="/">首页</a>&nbsp;&gt;&nbsp;<a
                        href="<?php echo $site_url."category/".$category?>"><?php echo $category_chn?></a> &gt;
            </div>
            <h1 class="awuxhmbr"><?php echo $news_title;?></h1>
            <article>
                <div class="wstwaxap">日期：
                    <time><?php echo $publish_time;?></time>
                    <span>来源：<?php echo $site_name;?></span><span>编辑：<?php echo $source;?></span></div>

                <div class="egkphkph">
                    <?php echo $news_content;?>
                </div>
                <div class="clear"></div>
            </article>
        </div>



        <div class="awuxhmbr liketag wpt20">
            <div class="jgjkassy">
                <h2>文章推荐</h2>
            </div>
            <ul>
                <?php foreach ($recommandNews as $recommandItem):?>
                    <li><a href="<?php echo $site_url."content/".$recommandItem['article_id'].".html"?>"><i class="icon-chevron-right"></i><?php echo $recommandItem['title'];?></a>
                    </li>
                <?php endforeach;?>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="yunkldoe awuxhmbr">
            <div class="jgjkassy">
                <h2>相关阅读</h2>
            </div>
            <?php foreach ($relate_news as $relate_item):?>
                <div class="tkeumwkh">
                    <ul>
                        <li>
                            <h3><a href="<?php echo $site_url."content/".$relate_item['article_id'].".html"?>"><?php echo $relate_item['title']?></a></h3>
                        </li>
                        <li class="qbyszjpf"><i class="icon-time"></i>
                            <time><?php echo date("Y-m-d H:i:s",$relate_item['publish_time']);?></time>
                        </li>
                        <li class="qbyszjpf">导读 :
                            <?php echo $relate_item['intro']?>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="awuxhmbr skkasgvf wpt20">
            <div class="jgjkassy alkeytit">
                <h2>聚合标签</h2>
            </div>
            <div class="alkey">
                <?php foreach ($tags as $tag):?>
                    <a href="<?php echo $site_url."tags/".$tag;?>" target="_blank" title="<?php echo $tag;?>"><?php echo $tag?></a>
                <?php endforeach;?>

                </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="lwhndcly hfudhjon">
        <div class="yunkldoe ">
            <div class="jgjkassy">
                <h2>热门文章</h2>
            </div>
            <?php foreach ($hot_news as $hot_item):?>
                <div class="tkeumwkh">
                    <ul>
                        <li>
                            <h3><a href="<?php echo $site_url."content/".$hot_item['article_id'].".html";?>"><?php echo $hot_item['title']?></a></h3>
                        </li>
                        <li class="qbyszjpf"><i class="icon-time"></i>
                            <time><?php echo date('Y-m-d H:i:s',$hot_item['publish_time']);?></time>
                        </li>
                        <li class="qbyszjpf">
                            <?php echo $hot_item['intro'];?>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<div class="clear"></div>
<footer class="ravrlakj">
    <ul>
        <li>这里可以自定义一些文字，修改位置：后台-模板-公共模板变量-底部模板！支持HTML，可以写关键字或者网站介绍啥的！</li>
        <li><a href="#">导航地图</a>| <a target="_blank" href="#"
            "="">点击联系站长</a>| 京ICP1234567-2号| 统计代码
        </li>
        <li><a href="/"><?php echo $site_name;?></a> 版权所有</li>
    </ul>
</footer>
<mip-fixed type="gototop" class="mip-element" mipdata-fixedidx="Fixed0"
           style="z-index: 10000; bottom: 90px; right: 10%;">
    <mip-gototop threshold="100" class="mip-element mip-layout-container"></mip-gototop>
</mip-fixed>
<mip-fixed class="mip-shell-more-button-mask mip-element" mipdata-fixedidx="Fixed2"
           style="z-index: 9998; display: none;"></mip-fixed>
<mip-fixed class="mip-shell-more-button-wrapper mip-element" mipdata-fixedidx="Fixed3"
           style="height: 0px; z-index: 9997; display: none;"></mip-fixed>
<mip-fixed class="mip-shell-header-mask mip-element" mipdata-fixedidx="Fixed4"
           style="z-index: 9996; display: none;"></mip-fixed>
<mip-fixed id="mip-page-loading-wrapper" class="mip-page-loading-wrapper mip-element" mipdata-fixedidx="Fixed5"
           style="z-index: 9995; display: none;">
    <div class="mip-shell-header"><span mip-header-btn="" class="back-button"><svg t="1530857979993" class="icon"
                                                                                   style="" viewBox="0 0 1024 1024"
                                                                                   version="1.1"
                                                                                   xmlns="http://www.w3.org/2000/svg"
                                                                                   p-id="3173"
                                                                                   xmlns:xlink="http://www.w3.org/1999/xlink"><path
                        fill="currentColor"
                        d="M348.949333 511.829333L774.250667 105.728C783.978667 96 789.333333 83.712 789.333333 71.104c0-12.629333-5.354667-24.917333-15.082666-34.645333-9.728-9.728-22.037333-15.082667-34.645334-15.082667-12.586667 0-24.917333 5.333333-34.624 15.082667L249.557333 471.616A62.570667 62.570667 0 0 0 234.666667 512c0 10.410667 1.130667 25.408 14.890666 40.042667l455.424 435.605333c9.706667 9.728 22.016 15.082667 34.624 15.082667s24.917333-5.354667 34.645334-15.082667c9.728-9.728 15.082667-22.037333 15.082666-34.645333 0-12.608-5.354667-24.917333-15.082666-34.645334L348.949333 511.829333z"
                        p-id="3174"></path></svg></span>
        <div class="mip-shell-header-logo-title"><img class="mip-shell-header-logo"
                                                      src="<?php echo $site_url."content/".$id.".html"?>"><span
                    class="mip-shell-header-title"></span></div>
    </div>
</mip-fixed>
</body>
</html>