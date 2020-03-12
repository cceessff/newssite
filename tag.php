<?php
/**
 * Created by PhpStorm.
 * Date: 2019/5/27
 * Time: 13:26
 */
$tag_get = urldecode($_GET['tag']);


$CONFIG = include 'config.php';
include 'DB.php';

$site_name = $CONFIG['site_name'];
$site_url = $CONFIG['site_url'];
$nav = $CONFIG['nav'];//导航
$db = new DB($CONFIG['db']);

$news_list = $db->getNewsByTag($tag_get);

$site_title = $tag_get . "_" . $site_name;
$keyword = "$tag_get,$site_name";
$description = "{$tag_get}有关的内容页面-{$site_name}";

$categorys = array_keys($nav);
$hot_news = $db->getHotNews($categorys, 20);//获取最新新闻

$tags = array();//标签
foreach ($news_list as $k => $v) {
        foreach (explode(";",$v['keywords']) as $item) {
            if (isset($tags[$item])) {
                $tags[$item] += 1;
            } else {
                $tags[$item] = 1;
            }
        }
}
arsort($tags);
$tags = array_slice($tags, 0, 50);
$tags = array_keys($tags);//最终标签
$page_str = '';
$js=isset($CONFIG['js'])?$CONFIG['js']:"";
$category_name = $tag_get;
header("Referrer-Policy: no-referrer");
include "views/tag.php";
