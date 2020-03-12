<?php
/**
 * Created by PhpStorm.
 * User: Dylan.L
 * Date: 2019/5/25
 * Time: 8:49
 */
$CONFIG=include 'config.php';
include 'DB.php';
//include 'Mongo.php';
$db=new DB($CONFIG['db']);

$nav=$CONFIG['nav'];//导航
$category=array_keys($nav);
$news=$db->getNews($category,55,0);//获取最新新闻
$tags=array();//标签
foreach ($news as $k=>$v){
    $tagarr=explode(";",$v['keywords']);
    foreach ($tagarr as $item){
            if (isset($tags[$item])){
                $tags[$item]+=1;
            }else{
                $tags[$item]=1;
            }
        }
}

arsort($tags);
$tags=array_slice($tags,0,50);
$tags=array_keys($tags);//最终标签
$lunbo_news=array_splice($news,50,5);
$hot_news=$db->getHotNews($category,30);
$site_name=$CONFIG['site_name'];
$site_url=$CONFIG['site_url'];
$js=isset($CONFIG['js'])?$CONFIG['js']:"";
header("Referrer-Policy: no-referrer");
include "views/index.php";











