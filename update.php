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


        $sites=$db->query("select name from domain");
        $sites=$sites->fetchAll();
        foreach ($sites as $site){
            $name=$site['name'];

            if (strpos($name,"\r")!==false){
                $domain=str_replace("\r","",$name);
                $sql="update domain set name='$domain' where name ='$name'";
                $result=$db->exec($sql);
                if ($result===false){
                    var_dump('错误',$db->errorInfo());
                    exit;
                }

            }

        }


}catch (Exception $e){
    echo $e->getMessage();
    exit;
}

