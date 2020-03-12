<?php
/**
 * Created by PhpStorm.
 * User: Dylan.L
 * Date: 2019/5/27
 * Time: 17:15
 */

include "Mongo.php";
$dao=new MongoDao();
$sql="select * from tecent_news";
$conn = new PDO("mysql:host=127.0.0.1;dbname=news", "root", "Irk818$#12"); //初始化一个PDO对象
$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,false);
$stat=$conn->prepare($sql);
$stat->execute();
while($row=$stat->fetch(PDO::FETCH_ASSOC)){
    unset($row['id']);
    $row['keywords']=explode(';',$row['keywords']);
    $row['tags']=explode(';',$row['tags']);
    $dao->Insert($row);
    echo $row['app_id']."\n";
}