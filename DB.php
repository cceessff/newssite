<?php

class DB
{
    public $conn;

    public function __construct($config)
    {
        $dbms = 'mysql'; //数据库类型
        $host = $config['host']; //数据库主机名
        $dbName = $config['database']; //使用的数据库
        $user = $config['username']; //数据库连接用户名
        $pass = $config['password']; //对应的密码
        $dsn = "$dbms:host=$host;dbname=$dbName";
        try {
            $this->conn = new PDO($dsn, $user, $pass); //初始化一个PDO对象
        } catch (Exception $e) {
            print_r($e);
        }
    }

    /**获取最新的新闻
     * @param array $category 新闻种类，数组
     * @param $limit
     * @param $offset
     * @return array 返回查询结果
     */
    public function getNews(array $category, $limit, $offset)
    {
        $len = count($category);
        if ($len == 0) {
            return null;
        }
        if (!is_numeric($limit) || !is_numeric($offset)) {
            return null;
        }

        $category_in = '';
        foreach ($category as $k => $v) {
            if ($k == $len - 1) {
                $category_in .= "'$v'";
            } else {
                $category_in .= "'$v',";
            }
        }
       $stat = $this->conn->prepare("select id,category,category_chn,img,keywords,title,intro,view_count,publish_time from tencent_news where category in({$category_in}) order by id desc limit ?,?");
        $stat->bindParam(1, $offset, PDO::PARAM_INT);
        $stat->bindParam(2, $limit, PDO::PARAM_INT);
        $stat->execute();
        $result = $stat->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function getNewsById(int $id)
    {
        if (!is_numeric($id)) {
            return null;
        }
        $sql = "select category,category_chn,publish_time,keywords,title,intro,view_count from tencent_news where id=?";
        $stat=$this->conn->prepare($sql);
        $stat->bindParam(1,$id,PDO::PARAM_INT);
        $stat->execute();
        $result=$stat->fetch(PDO::FETCH_ASSOC);
        return $result;


    }
    public function getNewsContent(int $id){
        if (!is_numeric($id)) {
            return null;
        }
        $sql="select content from tencent_content where news_id=?";
        $stat=$this->conn->prepare($sql);
        $stat->bindParam(1,$id,PDO::PARAM_INT);
        $stat->execute();
        $result=$stat->fetch(PDO::FETCH_ASSOC);
        return $result['content'];
    }

    public function getNewsByKeyword($keyword,$id)
    {
        $sql="select id,category,category_chn,publish_time,image,keywords,title,intro from tencent_news where  match (keywords) against (\"{$keyword}\") limit 0,20";
        $stat=$this->conn->prepare($sql);
        $stat->execute();
        $result=$stat->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            foreach ($result as $k=>$a){
                if ($a['id']==$id){
                    unset($result[$k]);
                    break;
                }
            }
        }

        return $result;

    }

    public function getRecommandNews($category)
    {
        //$category=$this->conn->quote($category,PDO::PARAM_STR);
        $sql="SELECT id,title,tags from tecent_news where category=? ORDER BY id DESC limit 0,15";
        $stat=$this->conn->prepare($sql);
        $stat->bindParam(1,$category,PDO::PARAM_STR);
        $stat->execute();
        $result=$stat->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function getRelateNews(array  $keywords)
    {
        $keywords=implode(" ",$keywords);
        $sql="select id,keywords,category,publish_time,img,title,intro from tencent_news where match (keywords) against (\"{$keywords}\") limit 0,20";
        $stat=$this->conn->prepare($sql);
        $stat->execute();
        $result=$stat->fetchAll();

        return $result;

    }

    public function getNewsByCategory($category,$page,$limit)
    {
        $page=($page-1)*$limit;
        $sql = "select id,img,category,category_chn,publish_time,keywords,title,intro,view_count from tencent_news where category=? limit ?,?";
        $stat=$this->conn->prepare($sql);
        $stat->bindParam(1,$category,PDO::PARAM_STR);
        $stat->bindParam(2,$page,PDO::PARAM_INT);
        $stat->bindParam(3,$limit,PDO::PARAM_INT);
        $stat->execute();
        $result=$stat->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
    public function getCategoryCount($category){
        $sql="select count(*) as count from tencent_news where category=?";
        $stat=$this->conn->prepare($sql);
        $stat->bindParam(1,$category,PDO::PARAM_STR);
        $stat->execute();
        $result=$stat->fetch(PDO::FETCH_ASSOC);
        return (int)$result['count'];
    }

    public function getNewsByTag($tag)
    {
        $sql="select id,category,img,category_chn,publish_time,keywords,title,intro,view_count from tencent_news where match (keywords) against (\"{$tag}\") limit 0,20";
        $stat=$this->conn->prepare($sql);
        $stat->execute();
        $result=$stat->fetchAll();
        return $result;

    }


        public function getHotNews($category)
    {
        if ($category&&is_array($category)){
            $n=count($category);
            $repl=str_repeat("?",$n);
            $repl=implode(",",str_split($repl));
            $sql="SELECT id,category,category_chn,img,keywords,title,intro,view_count,publish_time from tencent_news where category in({$repl}) ORDER BY view_count DESC limit 0,20";
            $stat=$this->conn->prepare($sql);
            foreach ($category as $k=>$v){
                $stat->bindParam($k+1,$v,PDO::PARAM_STR);
            }

            $stat->execute();
            $result=$stat->fetchAll(PDO::FETCH_ASSOC);
        }elseif ($category&&is_string($category)){
            $sql="SELECT  id,category,category_chn,img,keywords,title,intro,view_count,publish_time from tencent_news where category=? ORDER BY view_count DESC limit 0,20";
            $stat=$this->conn->prepare($sql);
            $stat->bindParam(1,$category,PDO::PARAM_STR);
            $stat->execute();
            $result=$stat->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $datetime=new DateTime();
            $datetime->sub(new DateInterval("P1D"));
            $time=$datetime->getTimestamp();
            $sql="SELECT  id,category,category_chn,img,keywords,title,intro,view_count,publish_time from tencent_news where ptime>{$time}  ORDER BY comment_count DESC limit 0,20";
            $stat=$this->conn->prepare($sql);
            $stat->execute();
            $result=$stat->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;

    }



    public function getall()
    {
        $sql="select * from tecent_news";
        $this->conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,false);
        $stat=$this->conn->prepare($sql);
        $stat->execute();
        return $stat;

    }


}
