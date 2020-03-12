<?php
/**
 * Created by PhpStorm.
 * User: Dylan.L
 * Date: 2019/5/29
 * Time: 18:43
 */

$f = fopen("servername.txt", "r");
$content=file_get_contents("newssite.tpl");
while (!feof($f)) {
    $content_bak=$content;
    $line = fgets($f);
    $line=str_replace("\n","",$line);
    $content_bak=str_replace("<server_name>",$line,$content_bak);

    echo $line;
    preg_match("/\s+?(www\..+?)\s+?/",$line,$match);
    $content_bak=str_replace("<host_name>","$match[1]",$content_bak);
    file_put_contents("vhost/{$match[1]}.conf",$content_bak);

}