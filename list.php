<?php
/**
 * Created by PhpStorm.
 * User: Dylan.L
 * Date: 2019/5/26
 * Time: 14:51
 */

$CONFIG=include 'config.php';
include 'DB.php';

$site_name=$CONFIG['site_name'];
$site_url=$CONFIG['site_url'];
$nav=$CONFIG['nav'];//导航
$db=new DB($CONFIG['db']);
$category=$_GET['category'];


$page=(int)$_GET['page'];
$per_page=20;
$host=$_SERVER['HTTP_HOST'];

$category_name=$nav[$category];
$news_list=$db->getNewsByCategory($category,$page,$per_page);
$total_count=$db->getCategoryCount($category);
$total_page=ceil($total_count/20);
$page_str=page($page,$total_page,$category,"http://$host");
$site_title=$category_name."_".$site_name;
$keyword="$category_name,$site_name";
$description="{$category_name}栏目是{$site_name}下的一个重要栏目，{$category_name}栏目为您提供海量的优质文章阅读，最新的{$category_name}资讯内容尽在{$site_name}。";

$categorys=array_keys($nav);
$hot_news=$db->getHotNews($categorys,20);//获取最新新闻

$tags=array();//标签
foreach ($news_list as $k=>$v){
    $tagarr=$v['keywords'];
        foreach (explode(";",$tagarr) as $item){
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
$js=isset($CONFIG['js'])?$CONFIG['js']:"";
header("Referrer-Policy: no-referrer");
include "views/list.php";


function page($page = 1, $total_page, $category, $host)
{
    $result = '';
    $distance = $total_page - $page;
    $next_page = $page + 1;
    $pre_page = $page - 1;
    $pagenum = $distance > 5 ? 5 : $distance;
    if ($page == 1) {
        $result.="<li class=\"active\"><a href=\"#\">{$page}</a></li>";
        for ($i = 1; $i < $pagenum; $i++) {
            $cpage = $page + $i;
            $result.="<li><a href=\"{$host}/category/{$category}-{$cpage}.html\">{$cpage}</a></li>";

        }
        if ($distance > 0) {
            $result.="<li><a href=\"{$host}/category/{$category}-{$next_page}.html\">下一页</a></li>";
            $result .= "<li><a href=\"{$host}/category/{$category}-{$total_page}\">尾页</a></li>";
        }
        return $result;
    } elseif ($page == $total_page) {
        $result .= "<li><a href=\"{$host}/category/{$category}-1.html\">首页</a></li>";
        $result .= "<li class=\"prev-page\"><a href=\"{$host}/category/{$category}-{$pre_page}.html\">上一页</a></li>";
        $start = $total_page - 3 > 0 ? $total_page - 3 : $total_page - 1;
        for ($i = $start; $i <= $total_page; $i++) {
            if ($i == $page) {
                $result .= "<li class=\"current\"><span>{$page}</span></li>";
            } else {
                if ($i<=$total_page){
                    $result .= "<li><a href=\"{$host}/category/{$category}-{$i}.html\">{$i}</a></li>";
                }
            }
        }
        return $result;

    } else {
        $result .= "<li><a href=\"{$host}/category/{$category}-1.html\">首页</a></li>";
        $result .= "<li class=\"prev-page\"><a href=\"{$host}/category/{$category}-{$pre_page}.html\">上一页</a></li>";
        $start = $page - 2 > 0 ? $page - 2 : $page - 1;


        for ($i = $start; $i < $start +5; $i++) {
            if ($i == $page) {
                $result .= "<li class=\"current\"><span>{$page}</span></li>";
            } else {
                if ($i<=$total_page){

                    $result .= "<li><a href=\"{$host}/category/{$category}-{$i}.html\">{$i}</a></li>";
                }
            }


        }

        $result .= "<li class=\"next-page\"><a href=\"{$host}/category/{$category}-{$next_page}.html\">下一页</a></li>";
        $result .= "<li><a href=\"{$host}/category/{$category}-{$total_page}.html\">尾页</a></li>";
        return $result;
    }
}