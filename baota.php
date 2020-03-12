<?php
/**
 * Created by PhpStorm.
 * User: Dylan.L
 * Date: 2019/9/5
 * Time: 9:39
 */
try{
    set_time_limit(0);
    $db=new PDO('sqlite:/www/server/panel/data/default.db');
    //$db=new PDO('sqlite:default.db');
    $str=file_get_contents("domains.txt");
    if (!$str){
       echo "域名文件不存在";
       exit;

    }
    $domains=explode("\n",$str);
    foreach ($domains as $domain){
       $count=$db->query("select count(*) as count from sites where name='{$domain}'");
       $count=$count->fetch();
       if ($count&&$count['count']>0){
           continue;
       }
        $time=date('Y-m-d H:i:s',time());
        $site_sql="insert into sites(name,path,status,ps,type_id,addtime) values ('$domain','/home/www/$domain',1,'$domain',0,'$time')";
        $result=$db->exec($site_sql);
        if ($result===false){
            var_dump('错误',$db->errorInfo());
            exit;
        }

        $pid=$db->lastInsertId();
        $domain_sql="insert into domain(pid,name,port,addtime)values ($pid,'$domain',80,'$time'),($pid,'www.$domain',80,'$time'),($pid,'m.$domain',80,'$time')";
        $result=$db->exec($domain_sql);
        if ($result===false){
            var_dump('错误',$db->errorInfo());
            exit;
        }

    }
}catch (Exception $e){
    echo $e->getMessage();
    exit;
}

